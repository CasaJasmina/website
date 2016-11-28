<?php

/*
Plugin Name: externalAuth
Plugin URI: http://arduino.cc/
Description: Plugin to hook external semi-arbitrary users manager
Version: 0.1
Author: Arduino Webmaster
Author URI: http://arduino.cc/
License: GPLv3 or later
*/

require_once ABSPATH . 'deploy_settings.php';
require_once 'Arduino_SSO.php';

function is_user_logged_in() {
	global $ardu_sso;
    return $ardu_sso->status == "loggedin";
}

function wp_get_current_user() {
	global $current_user;	
	return $current_user;
}

function wp_validate_auth_cookie() {
	global $current_user;
	return $current_user->ID;
}

add_filter('logout_url', 'ea_logout_url', 10, 2 );
function ea_logout_url(){
	global $ardu_sso;
	return $ardu_sso->logout(home_url());
}

add_action('init', 'ea_authenticate');
function ea_authenticate() {
	global $ardu_sso;
	global $current_user;
	$ardu_sso = new Arduino_SSO("blog");

	if ($ardu_sso->status == "logging") {
		if (!$ardu_sso->login())
			return FALSE;
	}

	$profile = $ardu_sso->get_user_profile(array('core', 'public', 'contact'));

	$current_user = get_user_by( 'login', $profile->username);
	$user_id = $current_user->ID;

	if (!$user_id) {
		$random_password = wp_generate_password( $length=12, $include_standard_special_chars=false );
		$user_id = wp_create_user( $profile->username, $random_password, $profile->email );
	} else {
		wp_update_user(array('ID' => $user_id, 'user_email' => $profile->email));
	}
}