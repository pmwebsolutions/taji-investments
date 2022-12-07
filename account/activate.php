<?php
     session_start ();
     $username=$_POST['username'];
	$phone=$_POST['phone'];
	$transactionId=$_POST['transactionId'];
	         $conn = new mysqli('localhost','root','','twiga2');
		 if($_POST['phone']=='' || $_POST['transactionId']==''){
						$_SESSION['msg'][]='All fields are required';
							header('location:activation.php');
		 }else{
			if ($conn){
			$stmt =$conn->prepare("insert into activation(username,phone,transactionId)
		     values(?,?,?)");
			$stmt->bind_param ("sis",$username,$phone,$transactionId);
		  $stmt->execute();
		  
		  $_SESSION['msg'][]='Please wait for Confirmation. max(3min) Then hit the Refresh Button.';
		   header("location:activation.php");
			}else{		  
		  $_SESSION['msg'][]='Something went wrong, Please Try again!';
		   header("location:activation.php");
			}
		  
		  $stmt->close();
		  $conn->close();
		  
		  
	  }



?>