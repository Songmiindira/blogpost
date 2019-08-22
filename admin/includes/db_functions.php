<?php


if(!function_exists('db_connect')){
	

	/**
	 * connects to database
	 * 
	 * @return mixed
	 */
	
	function db_connect(){
	  
	  $con = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

	  if(mysqli_connect_error()){
	  	die('Error While Connecting to database.' .mysqli_connect_error());
	  }

	  return $con;
	}
}

if(!function_exists('db_query')){

	/**
	 * Runs a database query
	 *
	 *
	 * 
	 * @param   mixed $con
	 * @param   string $sql
	 * @return  bool| Mixed
	 */
	function db_query($con, $sql){
		return mysqli_query($con, $sql);
	}
}



if(!function_exists('db_num_rows')){
	/**
	 * Counts number of data row from mysql query result
	 *
	 * 
	 * @param  mixed $result 
	 * @return int
	 */
	function db_num_rows($result){
		return mysqli_num_rows($result);
	}
}

if(!function_exists('db_fetch_assoc')){
	/**
	 * featches data from sql result.
	 *
	 * 
	 * @param   mixed $result
	 * @return  array
	 */
	function db_fetch_assoc($result){
		return mysqli_fetch_assoc($result);
	}
}

if(!function_exists('db_insert_id')){
	/**
	 * returns of the last inserted id
	 *
	 * 
	 * @return int
	 */
	function db_insert_id(){
		return mysqli_insert_id();
	}
}