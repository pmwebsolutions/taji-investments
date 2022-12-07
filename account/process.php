<?php
require_once('functions.php');
session_start();
if(isset($_SESSION['msg'])){
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
}
if(isset($_SESSION['userdata'])){
    $user = $_SESSION['userdata'][0];
    
}

//this is for functions



//this is for register new user
if(isset($_GET['signup'])){
    $user = register($_POST);
    if(isset($user['success'])){
        $_SESSION['msg'][]=$user['success'];
		header('location:../?login');
    }else{
        $_SESSION['msg']=$user['errors'];
    header('location:../?signup');
	}
}

 
//this is for login
if(isset($_GET['login'])){
						if($_POST['username']=='' || $_POST['password']==''){
							$_SESSION['msg'][]='All fields are required';
							header('location:../?login');
						}else{
							$user = checkUser($_POST);
						if(is_array($user) ){
							checkVerified();
						}else{
							$_SESSION['msg'][]='Incorrect username/Password !';
							header('location:../?login');
						}	
							$_SESSION['auth'] = 'verified';
							//$_SESSION['expire'] = time();
							$_SESSION['userdata']=$user;
							$_SESSION['username']=$_POST['username'];
						} 	  
						 
					
		
		
		
    
	
	}

      


if(isset($_GET['logout'])){
    session_destroy();
    header('location:../?login');


}

