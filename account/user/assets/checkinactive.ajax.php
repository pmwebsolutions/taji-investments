<?php
session_start();
if (isset($_SESSION['userdata'])){
    if(time() > $_SESSION['expire']){
        session_unset();
        session_destroy();
        //echo 'logout_redirect';
		header('location:.../?login');
    }
}