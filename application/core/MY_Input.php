<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class MY_Input extends CI_Input { 

    function __construct() { 
        parent::__construct(); 
    } 

    function post($index = null, $xss_clean = TRUE) { 
        return parent::post($index, $xss_clean); 
    } 

    function raw_post($index) {
        return parent::post($index, FALSE);
    }

    function set_post($key, $val) {
        $_POST[$key] = $val;
        return $val;
    }

    function unset_post($key) {
        $val = $_POST[$key];
        unset($_POST[$key]);
        return $val;
    }

    function ip_address() {
    	return user_ip();
    }
}