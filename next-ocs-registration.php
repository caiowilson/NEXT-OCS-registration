<?php

/*
 Plugin Name: Next OCS Registration

Description: Integra o registro de usuários do OCS e do WP.
Version: 1.12
Author: Caio Wilson
*/

add_filter('login_redirect', 'next_ocs_login');

function next_ocs_login(){
	if($_GET['action'] = 'register' && ($_GET['from_ocs'] )){
		setcookie('from_ocs','true', time()+3600 );
	}
	if($_GET['from_ocs']){

		return home_url('/conferencias/');
			
	}
	else if($_COOKIE['from_ocs'] == true){
	
		return home_url('/conferencias/');

	}
	

}

/* add_filter('wp_signup_location', 'next_ocs_register');

function next_ocs_register(){
	//if($_COOKIE['from_ocs'] ($_GET['from_ocs'] ))
	return site_url('wp-signup.php?from_ocs=true');
}

add_action('before_signup_form', 'ocs_before_signup');

function ocs_before_signup(){
	echo 'CHEGUEI';
} */

?>