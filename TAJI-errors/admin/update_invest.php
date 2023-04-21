<?php
include('dbcon.php');
if (isset($_POST['deny_invest'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	 mysqli_query($con,"UPDATE investments SET Status = 'Pending Review' where investcode='$id[$i]'");
	 }
header("location: invest_pay.php");
}
?>
<?php	
include('dbcon.php');	
if (isset($_POST['updatewallet_invest'])){
$id=$_POST['selector'];
$N = count($id);
		for($i=0; $i < $N; $i++){


		 $query = mysqli_query($con,"select * from investments where investcode = '$id[$i]'");
		 $values=mysqli_fetch_array($query);
			if (is_array($values)) {
				$user=$values['username'];
				$profit=$values['Expectedamount'];
				
				$quer=mysqli_query($con,"select * from wallet where username = '$user'");
				while ($row = mysqli_fetch_array($quer)) {
						$acc1=$row['investment'];
						$acc2= $acc1 + $profit;
				   			//update database

				            $sql = "UPDATE `wallet` SET `investment` = $acc2 WHERE `username` = '$user' ";

				            $query = mysqli_query($con, $sql) or die(mysqli_error($con));
				            
				        if($query){
				            	$sql1 = "UPDATE investments SET Status = 'Matured' where investcode='$id[$i]'";
				            	$pay = mysqli_query($con, $sql1) or die(mysqli_error($con));
					        if( $pay ){
				                //add detail to wallet history
				                $insertion = "INSERT INTO `wallet_history` (username, amount, description, balance)
				                    VALUES ('$user', $profit, 'KSH $profit(investment) paid by ADMIN', $acc2)";
				                
				                $queryIns = mysqli_query($con, $insertion) or die(mysqli_error($con));
				                echo "<script> alert('KSH $profit has been paid to $user\'s wallet '); document.location='invest_pay.php' </script>";

				            }else{
				                echo "<script> alert('$user\'s wallet cannot be funded at the moment!!!'); document.location='invest_pay.php' </script>";
				            }
						}
										
					
					
				
				}
				
			}
	
		}
}
?>
