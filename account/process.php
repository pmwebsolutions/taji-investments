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

//this is for contacting us
if(isset($_GET['contact_us'])){
    $fin = sendMail($_POST);
    if(isset($fin['success'])){
        $_SESSION['msg'][]=$fin['success'];
		header('location:../contact.php');
    }else{
        $_SESSION['msg']=$fin['errors'];
    header('location:../contact.php');
	}
}


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
							
							$_SESSION['userdata']=$user;
							$_SESSION['username']=$_POST['username'];
						} 	  
						 
					
		
		
		
    
	
	}

      


if(isset($_GET['logout'])){
    session_destroy();
    header('location:../?login');


}

