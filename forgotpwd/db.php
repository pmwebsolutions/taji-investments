<?php
$con = mysqli_connect("localhost","root","","twiga2");
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		die();
		}

date_default_timezone_set('Africa/Nairobi');	
$error="";	
?>