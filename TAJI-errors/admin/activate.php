<?php
include('dbcon.php');
if (isset($_POST['user_activate'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$verify = mysqli_query($con,"UPDATE users SET Verified = '1' WHERE username = '$id[$i]'");

	if ($verify){
	
		$wallet = mysqli_query($con,"insert into wallet (username) VALUES ('$id[$i]')");
		if ($wallet){
		echo "<script>
			  alert('Users Activation Successful!.');
			  document.location='active_check.php'
			</script>";
		}else{
		 echo "<script>
			  alert('Users Activation Failed!.');
			  document.location='active_check.php'
			</script>";
		}
	}else{
		 echo "<script>
			  alert('Connection Failed!.');
			  document.location='active_check.php'
			</script>";
	}
}
//header("location: active_check.php");
}
if (isset($_POST['acti_delete'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
$sql = "DELETE FROM `activation` WHERE `username` = '$id[$i]' ";
     $verify = mysqli_query($con, $sql) or die(mysqli_error($con));
	if ($verify){

		echo "<script>
			  alert('Operation Successful!.');
			  document.location='active_check.php'
			</script>";
		}else{
		 echo "<script>
			  alert('Operation Failed!.');
			  document.location='active_check.php'
			</script>";
		}
	
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
     <link rel="shortcut icon" type="image/x-icon" href="user/assets/images/brand/Taji.PNG" />
    <title>Taji - Activate Users</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>

<script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="/sizla/Multi_Edit/js/DT_bootstrap.js"></script>
</head>
<body><center>
<a class="sidebar-brand d-flex align-items-center justify-content-center" >
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-smile-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">TAJI INVESTMENTS <sup></sup></div>
            </a>
</center>
</body>
</html>