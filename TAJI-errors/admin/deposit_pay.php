<?php
include('dbcon.php');
if (isset($_POST['deposit_deny'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	 mysqli_query($con,"UPDATE deposits SET Status = 'Denied' where deposit_code='$id[$i]'");
	 }
	 echo "<script>
		  alert('Deposit Denial Successful!.');
		  document.location='deposit_confirm.php'
		  
		</script>";
}
include('dbcon.php');	
if (isset($_POST['updatewallet_deposit'])){
$id=$_POST['selector'];
$N = count($id);
		for($i=0; $i < $N; $i++){


		 $query = mysqli_query($con,"select * from deposits where deposit_code = '$id[$i]'") or die(mysqli_error());
		 $values=mysqli_fetch_array($query);
			if (is_array($values)) {
				$user=$values['username'];
				$profit=$values['Amount'];
				
				$quer=mysqli_query($con,"select * from wallet where username = '$user'");
				
				while ($row = mysqli_fetch_array($quer)) {
						$acc1=$row['user_deposit'];
						$acc2= $acc1 + $profit;
				   			//update database

				            $sql = "UPDATE `wallet` SET `user_deposit` = $acc2 WHERE `username` = '$user' ";

				            $query = mysqli_query($con, $sql) or die(mysqli_error($con));
				            
				            if($query){
				            	$sql1 = "UPDATE deposits SET Status = 'Paid' where deposit_code='$id[$i]'";
				            	$pay = mysqli_query($con, $sql1) or die(mysqli_error($con));
					            if ( $pay ) {
					                //add detail to wallet history
					                $insertion = "INSERT INTO `wallet_history` (username, amount, description, balance)
					                    VALUES ('$user', $profit, 'KSH $profit deposited by ADMIN', $acc2)";
					                
					                $queryIns = mysqli_query($con, $insertion) or die(mysqli_error($con));
					                echo "<script> alert('KSH $profit has been deposited to $user\'s wallet '); document.location='deposit_confirm.php' </script>";

					            } else {
					                echo "<script> alert('$user\'s wallet cannot be funded at the moment!!!'); document.location='deposit_confirm.php' </script>";
					            }
							}
										
					
					}
				}
				
			}
	
		
}
?>