<?php

/*
 Plugin Name: Next OCS Registration

Description: Integra o registro de usuсrios do OCS e do WP.
Version: 1.12
Author: Caio Wilson
*/


add_filter('login_redirect', 'next_ocs_login', 10, 3);

function next_ocs_login(){

	if(isset($_COOKIE['from_ocs'])){
	
		return '/conferencias';
	
	}
	/* if(isset($_GET['from_ocs'])){
		echo 'inside first if    ';
		return home_url('/conferencias');


	}
	else if(!isset($_GET['from_ocs'])){
		echo 'inside first else    ';
		return home_url();
	} */
	/* else if($_COOKIE['from_ocs']){

		return home_url('/conferencias');

	}
	else {
		echo 'CAIU NO ULTIMO ELSE';
		return home_url();
	}
 */

}


//adiciona a funcao no hook do bp_before_register_page
add_action('bp_before_register_page', 'ocs_before_register_page');

/**
 * funчуo que seta o cookie no momento de registro se o user vier do OCS
 */
function ocs_before_register_page(){
	if($_GET['from_ocs']){
		setcookie('from_ocs', 'true', 0, '/');
	}
 	
}

?>