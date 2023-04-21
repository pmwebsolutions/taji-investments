<?php
require_once('database.php');
$db=$GLOBALS['db'];
if(isset($_POST['username'])){
	$username=mysqli_real_escape_string($db,$_POST['username']);
	$query="SELECT username FROM users WHERE username='$username'";
	$runQuery=mysqli_query($db,$query);
	
	if(mysqli_num_rows($runQuery)>0){
		//$_SESSION['msg'][]='Username Already Exists';
		echo "Username Already Exists";
	}else{
		//$_SESSION['msg'][]='OK';
		echo "OK";
	}
exit();
}
?>