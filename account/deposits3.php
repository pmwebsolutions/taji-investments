<?php
     session_start ();
	 include('functions.php');
     $Amount = $_POST['amount'];
	 $Phone = $_POST['mobile'];
     $transactionid=$_POST['transactionid'];
	 $username=$_POST['username'];
     $created= date ('Y-m-d');
	 $depositcode=genDepCode();
         $conn = new mysqli('localhost','root','','twiga2');
	  if ($conn->connect_error){
		  die('connection failed  :'.$conn->connect_error);
	  }else{
		  $stmt =$conn->prepare("insert into deposits (username,amount,mobile,transactionid,created,deposit_code)
		     values(?,?,?,?,?,?)");
		 $stmt->bind_param ("siisss",$username,$Amount,$Phone,$transactionid,$created,$depositcode);
		  $stmt->execute();
		  $_SESSION['username']=$_POST['username'];
		  $_SESSION['amount']=$_POST['amount'];
		  $_SESSION['transactionid']=$_POST['transactionid'];
		  $_SESSION['msg'][]='Your Deposit is being processed!';
		   header("location:deposits1.php");
		  
		  
		  $stmt->close();
		  $conn->close();
		  
		  
	  }





?>