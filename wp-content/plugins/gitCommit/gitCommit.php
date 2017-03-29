<?php
/**
 * Plugin Name: gitCommit
 * Plugin URI: http://cj_basic.com/widget
 * Description: Open new issue on github
 * Version: 0.1
 * Author: Lorenzo Romagnoli
 * Author URI: casajasmina.cc
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


 function ShowTest(){
   include('gitCommit_test.php');
 }

 function ShowForm($atts){
   include('gitCommit_form.php');
 }

 add_action( 'admin_menu', 'gitCommit_menu' );
 add_shortcode( 'gitCommit', 'ShowForm' );



?>
