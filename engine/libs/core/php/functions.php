<?php
	//======================================================
	//  Created by Semyon Toporov
	//	Copyright © Semyon Toporov 2020 All rights reserved. 
	//======================================================

	function reload(){
		echo '<meta http-equiv="refresh" content="0">';
	}
	
	function locationTo($page, $time){
		echo '<meta http-equiv="refresh" content="'.$time.';url=./'.$page.'">';
	}
	
	function session(){
		
		if (getSetting("site_available") == "0"){
			locationTo("unavailable", 0);
			exit;
		}
		
		session_start(); 
		if (isset($_GET['do']) and $_GET['do'] == 'logout'){
			unset($_SESSION['u_id']);
			session_destroy();
			if (!$_SESSION['u_id']) locationTo("index?page=home", 0);
		}
	}
	
	function admin_session(){
		if(getUserGroup($_SESSION['u_id']) != 1){
			locationTo("index?page=home", 0);
		}
	}

	function pageLoad(){
		if (isset($_GET['page'])){
			if (isset($_GET['sub'])){
				$page_module = "./engine/modules/" .$_GET['page']. "/pages/" .$_GET['sub']. ".php";
			}else{
				$page_module = "./engine/modules/" .$_GET['page']. "/pages/index.php";
			}

			if(!file_exists($page_module)){
				$page_module = "./404.php";
			}
		
			include($page_module);
		}
	}

	function pageConfig(){
		$value = getSetting("errlog");
		if($value == 0){
			ini_set('display_errors', 0);
			ini_set('display_startup_errors', 0);
			error_reporting(0);
		}
	}
	
	function regIn($email, $f_name, $s_name, $group, $stud_id, $password, $password_v, $user_group, $user_status){
		include("./engine/db/db_config.php");
		
		if($password == $password_v){
			$email_check = mysqli_query($link, "SELECT * FROM Users WHERE Email='".$email."'" );
			$studid_check = mysqli_query($link, "SELECT * FROM Users WHERE Studentld='".$stud_id."'" );
			if ($email_check -> num_rows == 0 and $studid_check -> num_rows == 0){
				$password = md5($password);
				mysqli_query ($link, "INSERT INTO `Users` SET Email='".$email."', Firstname='".$f_name."', Surname='".$s_name."', Groupname='".$group."', Studentld='".$stud_id."', Password='".$password."', Groupld='".$user_group."', Status='".$user_status."'");
				locationTo("index?page=home", 0);
				exit;
			}else return "error1"; //echo 'Пользователь с таким логином уже существует!';	
		}else return "error2"; //echo 'Пароли не совпадают!';
	}
	
	function logIn($email, $password){
		include("./engine/db/db_config.php");
		
		$list = mysqli_query($link, "SELECT * FROM Users WHERE Email='".$email."'" );
        if ($list -> num_rows != 0){        
            $array = $list -> fetch_object();

            $userid_var = $array -> UserId;
            $email_var = $array -> Email;
            $password_var = $array -> Password;
            $status_var = $array -> Status;
        
            if (($email_var == $email ) and $password_var == $password and $status_var 	!= "banned"){
                $_SESSION['u_id'] = $userid_var;
                gateThink($userid_var);
                exit;
            }elseif (($email_var == $email ) and $password_var == $password and $status_var == "banned") {
            	return "error1"; //echo '<p>Пользователь был заблокирован!</p>';
            }else  return "error2"; //echo '<p>Неверные логин или пароль!</p>';
        }else return "error3"; //echo '<p>Пользователь не найден!</p>';
	}
	
	function getUserGroup($u_id){
		include("./engine/db/db_config.php");
		
		$list = mysqli_query($link, "SELECT * FROM Users WHERE UserId='".$u_id."'" );			
		$array = $list -> fetch_object();
		$user_group = $array -> Groupld;
		
		return $user_group;
	}

	function getUserName($u_id){
		include("./engine/db/db_config.php");

		$list = mysqli_query($link, "SELECT * FROM Users WHERE UserId='".$u_id."'" );			
		$array = $list -> fetch_object();
		$user_name = $array -> Firstname;

		return $user_name;
	}

	function setSetting($name, $value){
		include("./engine/db/db_config.php");
		
		mysqli_query($link, "INSERT INTO `Settings` (`Name`, `Value`) VALUES ('".$name."', '".$value."')");
		reload();
		exit;
	}

	function getSetting($name){
		include("./engine/db/db_config.php");
		
		$list = mysqli_query($link, "SELECT * FROM Settings WHERE Name='".$name."'" );
		$array = $list -> fetch_object();
		$value = $array -> Value;

		return $value;
	}

	function getCurrAddress(){
		$url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

		return $url;
	}

	//Custom core functions

	function teacher_session(){
		if(getUserGroup($_SESSION['u_id']) != 3){
			locationTo("index?page=home", 0);
		}
	}

	function gateThink($u_id){
		$u_group = getUserGroup($u_id);
		if($u_group == 1){
			locationTo("index?page=home", 0);
		}elseif($u_group == 2){
			locationTo("index?page=profile&id=".$u_id, 0);
		}elseif($u_group == 3){
			locationTo("index?page=teacher&sub=work_verification", 0);
		}else{
			locationTo("index?page=home", 0);
		}
	}

?>