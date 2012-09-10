<?php

/*
 Plugin Name: Next OCS Registration

Description: Integra o registro de usuбrios do OCS e do WP.
Version: 1
Author: Caio Wilson
*/


add_filter('login_redirect', 'next_ocs_login' , 10, 3);


/**
 * retorna para o wp a url do ocs apуs login simples ou login apos registro vindo do ocs.
 */
function next_ocs_login($redirect_to){

	
	if(isset($_GET['from_ocs']) || isset($_COOKIE['from_ocs'])){
		return site_url('/conferencias/');
	}
	
	else if(isset($redirect_to)){
		echo $redirect_to;
		return $redirect_to;
	}
	else{
		return site_url();
	}
	

}


//adiciona a funcao no hook do bp_before_register_page (registro do bp)
add_action('bp_before_register_page', 'ocs_before_register_page');

/**
 * funзгo que seta o cookie no momento de registro se o user vier do OCS
 */
function ocs_before_register_page(){
	if($_GET['from_ocs']){
		setcookie('from_ocs', 'true', 0, '/');
	}
 	
}

?>