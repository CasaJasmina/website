<?php

$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

?>

<?php


function openIssue($title, $label, $message){
  $curl = curl_init();

  $repo = get_option('gitCommit_repo');
  $clientID = get_option('gitCommit_clientID');
  $clientSecret = get_option('gitCommit_clientSecret');


curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.github.com/repos/".$repo."/issues",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_USERPWD => "$clientID:$clientSecret",

  CURLOPT_POSTFIELDS => "{\n \"title\": \"".$title."\",
                          \n \"body\":  \"".$message."\",
                          \n \"labels\": [
                              \n    \"".$label."\"
                              \n ]
                          \n}",

  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "client_id: ".$client_ID,
    "client_secret: ".$client_secret,
    "user-agent: casaJasminaWebsite"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $repo;
  echo $response;
}

}
?>

<?php
    $label= $_POST['label'];
    $message= $_POST['message'];
    $title= $_POST['label'];
    openIssue($title, $label, $message);
?>
