<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
     <link rel="shortcut icon" type="image/x-icon" href="Taji.PNG" />
    <title>Taji - Forgot Password</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

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
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Forgot Your Password?</h1>
                                        <p class="mb-4">We get it, stuff happens. Just enter your email address below
                                            and we'll send you a link to reset your password!</p>
                                    </div>
<?php
include('db.php');
if(isset($_POST["email"]) && (!empty($_POST["email"]))){
    $email = $_POST["email"];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if (!$email) {
        $error="<p>Invalid email address please type a valid email address!</p>";
    }else{
        $sel_query = "SELECT * FROM `users` WHERE email='".$email."'";
        $results = mysqli_query($con,$sel_query);
        $row = mysqli_num_rows($results);
        if ($row==""){
            $error.= "<p>No user is registered with this email address!</p>";
            }
        }
        if($error!=""){
            $class='class="alert alert-danger"';
            $role='role="alert"';
            $class2='class="btn btn-info"';
        echo "<div ".$class." ".$role.">".$error."</div>
        <br /><a ".$class2." href='javascript:history.go(-1)'>Go Back</a>";
            }else{
        $expFormat = mktime(date("H"), date("i")+30, date("s"), date("m")  , date("d"), date("Y"));
        $expDate = date("Y-m-d H:i:s",$expFormat);
        $key = md5((2418*2).$email);
        $addKey = substr(md5(uniqid(rand(),1)),3,10);
        $key = $key . $addKey;
    // Insert Temp Table
    mysqli_query($con,
    "INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`)
    VALUES ('".$email."', '".$key."', '".$expDate."');");

    $output='<p>Dear user,</p>';
    $output.='<p>Please click this button to reset your password.</p>';
    $output.='<p>-------------------------------------------------------------</p>';
    $output.='<p><a href="https://tajinvestments.org/forgotpwd/reset-password.php?key='.$key.'&email='.$email.'&action=reset" target="_blank">Reset Password</a></p>';		
    $output.='<p>-------------------------------------------------------------</p>';
    $output.='<p>You can also copy the link below to your browser</p>';
    $output.='<p>-------------------------------------------------------------</p>';
    $output.='<p><a href="https://tajinvestments.org/forgotpwd/reset-password.php?key='.$key.'&email='.$email.'&action=reset" target="_blank">https://tajinvestments.org/forgotpwd/reset-password.php?key='.$key.'&email='.$email.'&action=reset</a></p>';
    $output.='<p>-------------------------------------------------------------</p>';
    $output.='<p>Please be sure to copy the entire link into your browser.
    The link will expire after 30 minutes for security reasons.</p>';
    $output.='<p>If you did not request this password reset email, no action 
    is needed, your password will not be reset. However, you may want to log into 
    your account and change your security password as someone may have guessed it.</p>';   	
    $output.='<p>Thanks,</p>';
    $output.='<p>TAJI INVESTMENTS Support Team</p>';
    $body = $output; 
    $subject = "Password Recovery - TAJI INVESTMENTS";

    $email_to = $email;
    $fromserver = "support@tajinvestments.org"; 
    require("PHPMailer/PHPMailerAutoload.php");
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Host = "127.0.0.1"; // Enter your host mail.yourwebsite.com <--GMAIL.SMTP.COM-->
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';         //Enable implicit TLS encryption
    $mail->Port = 25;         //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    $mail->Username = ""; // GMAIL Client IDnoreply@gmail.com
    $mail->Password = ""; //GMAIL Client Secretpassword
    $mail->IsHTML(true);
    $mail->From = "support@tajinvestments.org";
    $mail->FromName = "TAJI INVESTMENTS";
    $mail->Sender = $fromserver; // indicates ReturnPath header
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AddAddress($email_to);
    if(!$mail->Send()){
        $class='class="alert alert-danger"';
        $role='role="alert"';
    echo "<div ".$class." ".$role.">Mailer Error...Please try again</div>";
    }else{
        $class='class="alert alert-success"';
        $role='role="alert"';
    echo "<div ".$class." ".$role.">
    <p>A link has been sent to your email together with instructions on how to reset your password.</p>
    <p>The link is valid for only 30 minutes.</p>
    </div>";
    }

            }	

}else{
?>
<form method="post" action="" name="reset" class="user">
<div class="form-group">
<input name="email" class="form-control form-control-user" aria-describedby="emailHelp"
placeholder="Enter Email Address...">
</div>
<button type="submit" value="Reset Password" class="btn btn-primary btn-user btn-block">
Reset Password
</button>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php } ?>

<hr>
                                    <div class="text-center">
                                        <a class="small" href="https://tajinvestments.org/?signup">Create an Account!</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="https://tajinvestments.org/?login">Already have an account? Login!</a>
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>