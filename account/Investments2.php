<?php

     session_start ();
	 include('functions.php');
     $Amount = $_POST['amount'];
	 $Created= date('Y-m-d H:i:s');
	 $username=$_POST['username'];
     $Maturity= date( 'Y-m-d', strtotime('4 days'));
     $Expectedamount=($Amount)*0.3+($Amount) ;
	 $investcode=genInvestCode();
         $conn = new mysqli('localhost','root','','twiga2');
	  if ($conn->connect_error){
		  die('connection failed  :'.$conn->connect_error);
	  }else{
		  $query = "select * from wallet where username = '$username'"; 
				$resultSet = mysqli_query($conn, $query); 
				 
				if(mysqli_num_rows($resultSet) > 0){
					$row = mysqli_fetch_assoc($resultSet);
					switch($Amount){
						case ($Amount > $row['user_deposit']):
							$_SESSION['msg'][]='Your Investment Amount has exceeded Your balance!....Please try a lower amount.';
							header("location:investments1.php");
						break;
						case ($Amount > $row['invest-limit']):
							$_SESSION['msg'][]='Your Investment Amount has exceeded Your Investment Limit!....Please try a lower amount.';
							header("location:investments1.php");
						break;
						case ($Amount < $row['invest-limit']):
								$invest=invest();
						if($invest){
							$stmt =$conn->prepare("insert into investments (username,amount,Expectedamount,Maturity,Created,investcode)
							 values(?,?,?,?,?,?)");
						 $stmt->bind_param("siisss",$username,$Amount,$Expectedamount,$Maturity,$Created,$investcode);
						  $stmt->execute();
						  $_SESSION['username']=$_POST['username'];
						  $_SESSION['amount']=$_POST['amount'];
						  $_SESSION['Expectedamount']=$Expectedamount;
						  $_SESSION['msg'][]='Investment Successful!';
						  $stmt->close();
						 }
					  	   header("location:investments1.php");
						break;
						case ($Amount == $row['invest-limit']):
							 $user = $row['username'];
							 $invest=invest();
							$incLimit=increaseLimit();
						   if($incLimit){  
						   $msg= ("&#128170;&#127998;");
						   $_SESSION['msg'][]='Your Investment Limit has Increased!....Keep Grinding G. '.$msg;
						   }if($invest){ 
						  $stmt =$conn->prepare("insert into investments (username,amount,Expectedamount,Maturity,Created,investcode)
							 values(?,?,?,?,?,?)");
						 $stmt->bind_param("siisss",$username,$Amount,$Expectedamount,$Maturity,$Created,$investcode);
						  $stmt->execute();
						  $_SESSION['username']=$_POST['username'];
						  $_SESSION['amount']=$_POST['amount'];
						  $_SESSION['Expectedamount']=$Expectedamount;
						  $_SESSION['msg'][]='Investment Successful!';
						  $stmt->close();
						  
						   }
							header("location:investments1.php");
						break;
					default:
						
						$_SESSION['msg'][]='Error From Application!....Please try again.';
						
						header("location:investments1.php");
						
					}
					
					$conn->close();
					
				}
		}
			

?>