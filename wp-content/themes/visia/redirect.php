<?php

require( dirname(__FILE__) . './../../../wp-load.php');
global $wp_hasher;
if ( empty( $wp_hasher ) ) {
    require_once( ABSPATH . 'wp-includes/class-phpass.php' );
    $wp_hasher = new PasswordHash(8, true);
}
if ( get_magic_quotes_gpc() )
    $_POST['bin'] = stripslashes($_POST['bin']);


setcookie( 'wp-postpass_' . COOKIEHASH, $wp_hasher->HashPassword( stripslashes( $_POST['bin'] ) ), 0, COOKIEPATH );


function creaUrlLink($s) {
	$s =  $_POST['nameRunner'];
	$s= str_replace(' ','-',$s);
	$s = strtolower($s);	
	$s = preg_replace("/á|à|â|ã|ª/","a",$s);
	$s = preg_replace("/Á|À|Â|Ã/","A",$s);
	$s = preg_replace("/é|è|ê/","e",$s);
	$s = preg_replace("/É|È|Ê/","E",$s);
	$s = preg_replace("/í|ì|î/","i",$s);
	$s = preg_replace("/Í|Ì|Î/","I",$s);
	$s = preg_replace("/ó|ò|ô|õ|º/","o",$s);
	$s = preg_replace("/Ó|Ò|Ô|Õ/","O",$s);
	$s = preg_replace("/ú|ù|û/","u",$s);
	$s = preg_replace("/Ú|Ù|Û/","U",$s);
	$s = str_replace("ñ","n",$s);
	$s = str_replace("Ñ","N",$s);
	
	return $s;
}


wp_safe_redirect( get_bloginfo('url') . "/" . creaUrlLink($s) );

?>

