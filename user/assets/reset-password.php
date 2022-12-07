<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
     <link rel="shortcut icon" type="image/x-icon" href="http://localhost/taji.or.ke/images/Taji.PNG" />
    <title>Taji - Reset Password</title>

    <!-- Custom fonts for this template-->
    <link href="http://localhost/taji.or.ke/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="http://localhost/taji.or.ke/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<?php 
if(isset($_SESSION['msg'])){
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
}

?>
<body class="bg-gradient-info">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-12"><?php if(isset($msg)){
    foreach($msg as $message){
        ?>
<div class="alert alert-success" role="alert">
<?=$message?>
</div>
        <?php 
	}
	} 
     ?>
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Reset Password</h1>
                                        <p class="mb-4">Please enter a new Password<!--or use this free & secure password generator PWDGEN() --> of your choice to gain access to your account.</p>
										
                                    </div>
									
<?php
include('db.php');
if (isset($_GET["key"]) && isset($_GET["email"])
&& isset($_GET["action"]) && ($_GET["action"]=="reset")
&& !isset($_POST["action"])){
$key = $_GET["key"];
$email = $_GET["email"];
$curDate = date("Y-m-d H:i:s");
$query = mysqli_query($con,"
SELECT * FROM `password_reset_temp` WHERE `key`='".$key."' and `email`='".$email."';");
$row = mysqli_num_rows($query);
if ($row==""){
$error .= '<strong>Invalid Link</strong><br />
The link is invalid/expired. Either you did not copy the correct link from the email, 
or you have already used the key in which case it is deactivated.<br />
<a href="http://localhost/taji.or.ke/forgot-password.html">Click here</a> to reset password.';
	}else{
	$row = mysqli_fetch_assoc($query);
	$expDate = $row['expDate'];
	if ($expDate >= $curDate){
	?>
    <br />
	<form method="post" action="" name="update">
									<input type="hidden" name="action" value="update" />
									<br />
									<label><strong>Enter New Password:</strong></label><br />
									<input class="form-control form-control-user" type="password" name="pass1" id="pass1" maxlength="15" required />
									<br />
									<label><strong>Re-Enter New Password:</strong></label><br />
									<input class="form-control form-control-user" type="password" name="pass2" id="pass2" maxlength="15" required/>
									<input type="hidden" name="email" value="<?php echo $email;?>"/>
									<sub>The Password should be a combination of Uppercase, lowercase and numeric symbols.</sub>
									<sub>(This is to ensure safety of your account)</sub>
									<br /><br />
									<input class="btn btn-primary btn-user btn-block" type="submit" id="reset" value="Reset Password" />
									</form>
<?php
}else{
$error .= '<strong>Link Expired</strong><br />
The link is expired. You are trying to use the expired link which as valid only 24 hours (1 days after request).';
				}
		}
if($error!=''){
	$_SESSION['msg'][] = $error;
	}			
} // isset email key validate end


if(isset($_POST["email"]) && isset($_POST["action"]) && ($_POST["action"]=="update")){
$error='';
$pass1 = mysqli_real_escape_string($con,$_POST["pass1"]);
$pass2 = mysqli_real_escape_string($con,$_POST["pass2"]);
$email = $_POST["email"];
$curDate = date("Y-m-d H:i:s");
if ($pass1!=$pass2){
		$error .= 'Password do not match, both password should be same.';
		}
	if($error!=''){
		$_SESSION['msg'][] = $error;
		}else{

$pass1 = md5($pass1);
mysqli_query($con,
"UPDATE `users` SET `password`='".$pass1."' WHERE `email`='".$email."';");	

mysqli_query($con,"DELETE FROM `password_reset_temp` WHERE `email`='".$email."';");		
	
$_SESSION['msg'][] = 'Congratulations! Your password has been updated successfully.
<a href="http://localhost/taji.or.ke/?login">Click here</a> to Login.';
header('http://localhost/taji.or.ke/?login');
		}		
}
?>
<div class="text-center">
                                        <a class="small" href="http://localhost/taji.or.ke/?signup">Create an Account!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="http://localhost/taji.or.ke/?login">Already have an account? Login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

<!-- Bootstrap core JavaScript-->
    <script src="http://localhost/taji.or.ke/vendor/jquery/jquery.min.js"></script>
    <script src="http://localhost/taji.or.ke/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="http://localhost/taji.or.ke/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="http://localhost/taji.or.ke/js/sb-admin-2.min.js"></script>

</body>

</html>