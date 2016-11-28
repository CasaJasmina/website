<?php
require_once ABSPATH . 'deploy_settings.php';

session_start();

class Arduino_SSO {
	var $SSOAuth;
	var $SSOToken;
	var $SSOClient;
	var $SSOSecret;
	var $SSOScopes;
	var $SSORedirect;
	var $SSOProfile;
	var $SSOCookie;
	var $SSOLogout;
	// status can be 'loggedin', 'loggedout', 'logging'
	var $status = "dunno";
	var $actual_serial;
	var $service;
	var $token;
	function Arduino_SSO ($service) {
		global $DeploySettingsSSOAuth;
		global $DeploySettingsSSOToken;
		global $DeploySettingsSSOClient;
		global $DeploySettingsSSOScopes;
		global $DeploySettingsSSOSecret;
		global $DeploySettingsSSORedirect;
		global $DeploySettingsSSOProfile;
		global $DeploySettingsSSOCookie;
		global $DeploySettingsSSOLogout;
		$this->SSOAuth = $DeploySettingsSSOAuth;
		$this->SSOToken = $DeploySettingsSSOToken;
		$this->SSOClient = $DeploySettingsSSOClient;
		$this->SSOScopes = $DeploySettingsSSOScopes;
		$this->SSOSecret = $DeploySettingsSSOSecret;
		$this->SSORedirect = $DeploySettingsSSORedirect;
		$this->SSOProfile = $DeploySettingsSSOProfile;
		$this->SSOCookie = $DeploySettingsSSOCookie;
		$this->SSOLogout = $DeploySettingsSSOLogout;
		$this->service = $service;
		// Are we logged on the sso?

		if (!isset($_COOKIE[$this->SSOCookie]) || ($_COOKIE[$this->SSOCookie]!=='true')) {
			$this->status = "loggedout";
			unset($_SESSION['ardu_sso_token']);
			return;
		}
		// Do we have a token in session?
		if (!isset($_SESSION['ardu_sso_token'])) {
			$this->status = "logging";
			return;
		}
		// Can we retrieve a profile with it?
		$profile = $this->get_user_profile(array('core'));
		if ($profile) {
			$this->status = "loggedin";
			$this->token = $_SESSION['ardu_sso_token'];
		} else {
			$this->status = "logging";
		}
		return;
	}
	// is_logged_in returns true if the user is sso-logged
	public function is_logged_in() {
		return $this->status == "loggedin";
	}
	// get_user_profile returns the required profile data
	public function get_user_profile($fields) {
		$scopes = join(",", $fields);
		$headr = array();
		$headr[] = 'Authorization: Bearer '.$_SESSION['ardu_sso_token'];
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headr);
		curl_setopt($ch, CURLOPT_URL, $this->SSOProfile . '?scopes=' . $scopes);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		$resp = curl_exec($ch);
		$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		if ($http_status != 200) {
			return FALSE;
		}
		return json_decode($resp);
	}
	// login redirects to the sso and parses the response
	public function login() {
		// First we check if we're coming from an authentication
		if (!isset($_GET['code'])) {
			// Let's save the url before redirecting
			$_SESSION['SSO_REDIRECT_FROM'] = 'http' . (($_SERVER['HTTPS'] == 'on') ? 's' : '') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
			$this->request_code();
			return;
		}

		// We validate the state
		$code = $_GET['code'];
		$state = $_GET['state'];

		if ($state != $_SESSION['state']) {
			return FALSE;
		}

		// We retrieve the access_token
		$token = $this->request_token($code);
		// Not sure what does this bit do. Maybe cleaning up?
		$redirect_from = $_SESSION['SSO_REDIRECT_FROM'];
		$old_session = $_SESSION;
		session_write_close ();
		session_id (sha1 (mt_rand ()));
		session_start ();
		$_SESSION = $old_session;
		// We retrieve the user profile
		$profile = $this->get_user_profile(array('core'));
		$_SESSION['ardu_sso_user'] = $profile->username;
		$_SESSION['ardu_sso_token'] = $token->access_token;

		$this->token = $token->access_token;
		$this->status = "loggedin";
		// We redirect to the previous page
		header('Location: '. $redirect_from);
		return TRUE;
	}
	// public function that performs the logout
	function logout($redirect_to) {
		$redirect = $this->SSOLogout. "?redirect_uri=".urlencode($redirect_to);
		return $redirect;
	}
	// create_login_url returns the login url
	public function create_login_url($generate_state) {
		$scopes = join($this->SSOScopes, " ");
		if ($generate_state || !isset($_SESSION['state'])) {
			$state = mt_rand ();
			$_SESSION['state'] = $state;
		}

		$dest = $this->SSOAuth . '?client_id=' .$this->SSOClient . '&redirect_uri=' . urlencode($this->SSORedirect) . '&state=' . $_SESSION['state'] . '&scope=' . urlencode($scopes) . '&response_type=code';
		return $dest;
	}
	// public function that returns the username
	function get_username() {
		if ($this->status == "loggedin")
			return $_SESSION['ardu_sso_user'];
		return FALSE;
	}
	function request_code() {
		header('Location:' . $this->create_login_url(true)); exit();
	}
	function request_token($code) {
		$data = array(
			'code' => $code,
			'client_id' => $this->SSOClient,
			'redirect_uri' => $this->SSORedirect,
			'grant_type' => 'authorization_code',
		);
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_USERPWD, $this->SSOClient . ':' . $this->SSOSecret);
		curl_setopt($ch, CURLOPT_URL, $this->SSOToken);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		$resp = curl_exec($ch);
		curl_close($ch);
		return json_decode($resp);
	}
}
?>