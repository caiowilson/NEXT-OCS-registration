<?php

/*
 Plugin Name: Next OCS Registration

Description: Integra o registro de usuбrios do OCS e do WP.
Version: 1
Author: Caio Wilson
*/




function wp_head_ocs_redirection(){
	global $post;
	//print_r ($post->post_title);
	if($post->post_title == 'conferencias'){
		setcookie('from_ocs', 'true', time()-3600, '/');
		wp_redirect('http://www.next.icict.fiocruz.br/conferencias/');
	}
}
//add_action('wp_head', 'wp_head_ocs_redirection');


/**
 * retorna para o wp a url do ocs apуs login simples ou login apos registro vindo do ocs.
 */
function next_ocs_login($redirect_to, $request){
	
	if(isset($_GET['from_ocs']) || isset($_COOKIE['from_ocs'])){
		
		return site_url('/conferencias/');
		
	}
	
	else if(isset($redirect_to)){
		
		return $redirect_to;
		
	}
	else{
		
		return home_url();
		
	}
	

}
add_filter('login_redirect', 'next_ocs_login' , 10, 3);



/**
 * funзгo que seta o cookie no momento de registro se o user vier do OCS
 */
function ocs_before_register_page(){
	if($_GET['from_ocs']){
		setcookie('from_ocs', 'true', 0, '/');
	}
 	
}
//adiciona a funcao no hook do bp_before_register_page (registro do bp)
add_action('bp_before_register_page', 'ocs_before_register_page');
?>