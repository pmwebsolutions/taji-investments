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



/*/this is for activating user
if(isset($_GET['activate'])){
    $user = activate($kata);
    if($user){
        echo "Success";
		//header('location:active_check.php');
    }else{
        echo "Error";
    //header('location:../?activate');
	}
}*/

 

    if(isset($_GET['adminlogin'])){
    if($_POST['username']=='' || $_POST['password']==''){
						$_SESSION['msg'][]='All fields are required';
				   header('location:./?login');
					}else{
						$user = checkAdmin($_POST);
						if(is_array($user) ){
						
				$_SESSION['userdata']=$user;
				$_SESSION['userIsLoggedIn']=true;
				$_SESSION['username']=$_POST['username'];
				header('location:dashboard.php');
						}else{
							$_SESSION['msg'][]='Incorrect username/Password !';
							header('location:./?login');
							}
					} 	  
						 
					
		
		
		
    
	
	}

    


if(isset($_GET['logout'])){
    session_destroy();
    header('location:./?login');


}

