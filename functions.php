<?php

define("PE_THEME_NAME",'Visia');

// bootstrap the framework
define("PE_THEME_PATH",dirname( __FILE__));
require("framework/php/boot.php");


function dopasswordstuff(){
   if(isset($_POST['submitpwd'])){
		global $wpdb;
		$post_password = trim($_POST['passwordfield']);
		$post_id = $wpdb->get_var( $wpdb->prepare("SELECT ID FROM $wpdb->posts WHERE post_password = %s", $post_password) );
	
		require( dirname(__FILE__) . './../../../wp-load.php');
		global $wp_hasher;
		if ( empty( $wp_hasher ) ) {
			require_once( ABSPATH . 'wp-includes/class-phpass.php' );
			$wp_hasher = new PasswordHash(8, true);
		}
		if ( get_magic_quotes_gpc() )
			$_POST['passwordfield'] = stripslashes($_POST['passwordfield']);

		setcookie( 'wp-postpass_' . COOKIEHASH, $wp_hasher->HashPassword( stripslashes( $_POST['passwordfield'] ) ), 0, COOKIEPATH );
		
		if (!empty($post_id)) {
			if ( $post_id != 1){
					
					wp_safe_redirect(get_permalink($post_id));
					exit;
			}
		}
	}
}
add_action('template_redirect','dopasswordstuff');



?>
