<?php
     session_start ();
	include('functions.php');
     $Amount = $_POST['amount'];
	 $Phone = $_POST['mobile'];
     $username=$_POST['username'];
	 $Disbursment = date( 'Y-m-d', time());
	 $frmacc = $_POST['frmacc'];
	$withdrawcode=genWithCode();		
         $conn = new mysqli('localhost','root','','twiga2');
	  if ($conn->connect_error){
		  die('connection failed  :'.$conn->connect_error);
	  }else{
		 switch($frmacc){
			case ($frmacc == 'Affiliate' ):
				  $query = "select * from wallet where username = '$username'"; 
					$resultSet = mysqli_query($conn, $query);				
					if(mysqli_num_rows($resultSet) > 0){
						$row = mysqli_fetch_assoc($resultSet);
							if($row['affiliate'] < $Amount){
								$_SESSION['msg'][]='Your withdrawal has exceeded Affiliate balance!...Please Try a Lower Amount.';
								header("location:withdrawal1.php");
							}
							else{
								$stmt =$conn->prepare("insert into withdrawals (username,mobile,amount,Disbursment,FrmAcc,withdraw_code)
									 values(?,?,?,?,?,?)");
								 $stmt->bind_param ("siisss",$username,$Phone,$Amount,$Disbursment,$frmacc,$withdrawcode);
								  $stmt->execute();
								  $_SESSION['username']=$_POST['username'];
								  $_SESSION['Phone']=$_POST['mobile'];
								  $_SESSION['amount']=$_POST['amount'];
								  $_SESSION['msg'][]='Your withdrawal is being Processed!...Please wait for MPESA Notification.';
								header("location:withdrawal1.php");
								$stmt->close();
								$conn->close();
								} 
					}
			break;
			case ($frmacc == 'Investment'):
					$query = "select * from wallet where username = '$username'"; 
					$resultSet = mysqli_query($conn, $query);				
					if(mysqli_num_rows($resultSet) > 0){
						$row = mysqli_fetch_assoc($resultSet);
						if($row['investment'] < $Amount){
							$_SESSION['msg'][]='Your withdrawal has exceeded Investment balance!...Please Try a Lower Amount.';
							header("location:withdrawal1.php");
						}
						else{
							$stmt =$conn->prepare("insert into withdrawals (username,mobile,amount,Disbursment,FrmAcc,withdraw_code)
								 values(?,?,?,?,?,?)");
							 $stmt->bind_param ("siisss",$username,$Phone,$Amount,$Disbursment,$frmacc,$withdrawcode);
							  $stmt->execute();
							  $_SESSION['username']=$_POST['username'];
							  $_SESSION['Phone']=$_POST['mobile'];
							  $_SESSION['amount']=$_POST['amount'];
							  $_SESSION['msg'][]='Your withdrawal is being Processed!...Please wait for MPESA Notification.';
							
							  $stmt->close();
							  $conn->close();
			  
							
							header("location:withdrawal1.php");
						} 
					}
			break;
			default:
			$_SESSION['msg'][]='Error From Application!....Please try again.';
						
						header("location:withdrawal1.php");
		}
				
		  
		 
}


?>
