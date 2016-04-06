<?php
/**
 * Plugin Name: gitCommit
 * Plugin URI: http://cj_basic.com/widget
 * Description: Open new issue on github
 * Version: 0.1
 * Author: Lorenzo Romagnoli
 * Author URI: casajasmina.arduino.cc
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 */



 function gitCommit_menu() {
 	add_options_page( 'GitCommit', 'gitCommit', 'manage_options' , 'GitCommit', 'gitCommit_admin' );
 }

 function gitCommit_admin() {
   include('gitCommit_admin.php');
 }

 function openIssue(){
   $request = new HttpRequest();
   $request->setUrl('https://api.github.com/repos/casajasmina/issueprinter-Prov/issues');
   $request->setMethod(HTTP_METH_POST);

   $request->setHeaders(array(
     'postman-token' => '84b7a6c1-5746-ba27-634a-60bfe2678d7f',
     'cache-control' => 'no-cache',
     'authorization' => 'Basic Z2l0Q29tbWl0OmFmY2M4NWQyYjgyZDUyMDY2YjkxNDRlNGI1Yjk1MmE2Y2RmNGUxYTY='
   ));

   $request->setBody('{
     "title": "Found a bug",
     "body": "having a problem with this.",
     "assignee": "octocat",
     "milestone": 1,
     "labels": [
       "bug"
     ]
   }');

   try {
     $response = $request->send();

     echo $response->getBody();
   } catch (HttpException $ex) {
     echo $ex;
   }
}



 add_action( 'admin_menu', 'gitCommit_menu' );






?>
