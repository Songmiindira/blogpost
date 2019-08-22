<?php 

if(!function_exists('url')){
	/**
	 * Generates url based on site base url.
	 * 
	 * @param  string $uri 
	 * @return string
	 */
	function url($uri = ''){
		return SITE_URL.$uri;
	}
}

if(!function_exists('ip')){
	/**
	 * returns clients's IP address
	 * 
	 * @return string
	 */
	function ip(){
		return $_SERVER['REMOTE_ADDR'];
	}
}

if(!function_exists('now')){
	/**
	 * Returns current timestamp
	 * 
	 * @return string
	 */
	function now(){
		return date('Y-m-d H:i:s');
	}
}

if(!function_exists('user')){
	/**
	 * Returns current user's data from session
	 * 
	 * @return array
	 */
	function user(){
		return $_SESSION['user'];
	}
}

if(!function_exists('user_id')){
	/**
	 * Retutns user's id from session
	 * 
	 * @return int
	 */
	function user_id(){
		return $_SESSION['user']['id'];
	}
}

if(!function_exists('fcapital')){
	/**
	 * Returns string in first letter capital.
	 * @param  string $string 
	 * @return string
	 */
	function fcapital($string){
		return ucfirst(strtolower($string));
	}
}


























 ?>