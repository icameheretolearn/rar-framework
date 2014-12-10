<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function logged_in() {
	$CI =& get_instance();
	return $CI->ion_auth->logged_in();
}

function is_admin() {
	$CI =& get_instance();
	return $CI->ion_auth->is_admin();
}

function user_pinfo() {
	$CI =& get_instance();
	return json_decode($CI->curl->simple_get('http://api.ipinfodb.com/v3/ip-city/?key=6817ea90f09cfdfcc97a6b536f881db71e491e9f69f944f5a75daab2b775c075&ip=' . $_SERVER['REMOTE_ADDR'] . '&format=json')); 
}
