<?php
include('dbcon.php');
if (isset($_POST['withdraw_deny'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	 mysqli_query($con,"UPDATE withdrawals SET Status = 'Denied' where withdraw_code='$id[$i]'");
	 }
echo "<script>
		  alert('Withdrawal Denial Successful!.');
		  document.location='withdraw_confirm.php'
		  
		</script>";
}

include('dbcon.php');	
if (isset($_POST['updatewallet_withdraw'])){
$id=$_POST['selector'];
$N = count($id);
		for($i=0; $i < $N; $i++){


		 $query = mysqli_query($con,"select * from withdrawals where withdraw_code = '$id[$i]'") or die(mysqli_error());
		 $values=mysqli_fetch_array($query);
			if (is_array($values)) {
				$user=$values['username'];
				$profit=$values['Amount'];
				$frmacc=$values['FrmAcc'];
				
				$quer=mysqli_query($con,"select * from wallet where username = '$user'");
				
				while ($row = mysqli_fetch_array($quer)) {
					switch($frmacc){
						case ($frmacc == 'Affiliate'):
						 $acc1=$row['affiliate'];
						$acc2= $acc1 - $profit;
				   			//update database

				            	$sql = "UPDATE `wallet` SET `affiliate` = $acc2 WHERE `username` = '$user' ";

				            $query = mysqli_query($con, $sql) or die(mysqli_error($con));

				            if($query){
				            	$sql1 = "UPDATE withdrawals SET Status = 'Paid' where withdraw_code='$id[$i]'";
				            	$pay = mysqli_query($con, $sql1) or die(mysqli_error($con));
				            if ( $pay ) {
				                //add detail to wallet history
				                $insertion = "INSERT INTO `wallet_history` (username, amount, description, balance)
				                    VALUES ('$user', $profit, 'KSH $profit(affiliate) credited by ADMIN', $acc2)";
				                
				                $queryIns = mysqli_query($con, $insertion) or die(mysqli_error($con));
				                echo "<script> alert('KSH $profit has been withdrawn from $user\'s wallet '); document.location='withdraw_confirm.php' </script>";

				            } else {
				                echo "<script> alert('$user\'s wallet cannot be funded at the moment!!!'); document.location='withdraw_confirm.php' </script>";
				            }}
						break;
						case ($frmacc == 'Investment'):
							$acc1=$row['investment'];
							$acc2= $acc1 - $profit;
				   			//update database

				            $sql = "UPDATE `wallet` SET `investment` = $acc2 WHERE `username` = '$user' ";

				            $query = mysqli_query($con, $sql) or die(mysqli_error($con));
				            
				            if($query){
				            	$sql1 = "UPDATE withdrawals SET Status = 'Paid' where withdraw_code='$id[$i]'";
				            	$pay = mysqli_query($con, $sql1) or die(mysqli_error($con));
				            if ( $pay ) {
				                //add detail to wallet history
				                $insertion = "INSERT INTO `wallet_history` (username, amount, description, balance)
				                    VALUES ('$user', $profit, 'KSH $profit(investment) credited by ADMIN', $acc2)";
				                
				                $queryIns = mysqli_query($con, $insertion) or die(mysqli_error($con));
				                echo "<script> alert('KSH $profit has been withdrawn from $user\'s wallet '); 
				                document.location='withdraw_confirm.php' </script>";

				            } else {
				                echo "<script> alert('$user\'s wallet cannot be funded at the moment!!!'); document.location='withdraw_confirm.php' </script>";
				            }}
						break;
						default:
						echo "<script>
							  alert('Error From Application!....Please try again.');
							document.location='withdraw_confirm.php'							  
							</script>";
					}
				}
			}
		}
}
?>
