<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
	/**************************************************************************************************************************/	
	function init_vars(){
		session_start();		
	}
	function get_variable($var){
		switch($var){
			case "home": return "http://localhost/aemcode/";
			case "ajax": return "?page_id=38";
			default:{return "";}
		}
	}
	function is_login(){
		$user = false;
		if(isset($_SESSION["userid"])){$user = $_SESSION["userid"];}
		return $user;
	}
	function create_log($object_id){
		$key = isset($_SESSION["key"])?$_SESSION["key"]:create_sessionkey();
		$user = false;
		$rate = 0;
		include_once("backend/backend.php");
		$backend = new backend();	
		//test_data();
		return $backend->create_log($object_id, $key, $user, $rate);
	}
	
	function create_sessionkey(){
		$_SESSION["key"]= time() . random_text();
	}
	function kill_sessionkey(){		
		$_SESSION["key"] = false;
	}
	function get_sessionkey(){
		if(!isset($_SESSION["key"])){
			create_sessionkey();
		}
		return $_SESSION["key"];	
	}
	function random_text($size = 10){
		$text = "";
		$characters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ/*-+_";
		for($i=0;$i<$size;$i++){
			$text.=$characters[mt_rand(0, strlen($characters))];			
		}
		return $text;
	}
	function array_contain($where, $what, $pos=false){		
		for($i=0;$i<sizeof($where);$i++){
			if($pos===false){
				if($where[$i]==$what) return $i+1;			
			}else{
				if($where[$i][$pos]==$what) return $i+1;
			}			
		}
		return false;
	}
	
/******************************************************************************************************/
		
?>