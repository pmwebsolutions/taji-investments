<?php
session_start();
include 'header.php';
if(!isset($_SESSION['userIsLoggedIn'])){
    header('location: ../index.php');
}?>
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
      <link rel="shortcut icon" type="image/x-icon" href="user/assets/images/brand/Taji.PNG" />
    
    <title>Taji - Activation</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<?php
require('functions.php');

if(isset($_SESSION['msg'])){
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
}

?>
<body class="bg-gradient-info">

<div class="container">
         <div class="row justify-content-center">
		 <div class="col-xl-8 col-lg-12 col-md-9">
             <div class="card o-hidden border-0 shadow-lg my-5">
                  <div class="card-body p-0">
                     <!-- Nested Row within Card Body -->
                     <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-12">
                        <div class="p-5">
						<div class="text-center">
	
                                        <h1 class="h4 text-gray-900 mb-4">Activate Your Account!</h1>
                                    </div>
                                  <center>  <p>PAY KES 300 TO TILL NUMBER <strong>8100616</strong> (TAJINVESTMENTS)</p>	</center>	

&nbsp&nbsp&nbsp&nbsp&nbsp<caption>After payment confirmation click the refresh button to login to your dashboard</caption>
<?php if(isset($msg)){
    foreach($msg as $message){
        ?>
<div class="alert alert-success" role="alert">
<?=$message?>
</div>
        <?php 
	}
	} 
     ?>
<form action="activate.php" method="post" class="user" id="payment" >
<div class="form-group">

<input class="form-control form-control-user" style="text-transform:capitalize;"  name="phone" value="" placeholder="Enter M-pesa Number"  data-required="true" >
</div>
<div class="form-group">
<input class="form-control form-control-user" style="text-transform:capitalize;" type="text" name="transactionId" value="" placeholder="Enter M-pesa code i.e OA2EXWAKO.."  data-required="true" >
</div>



<input class="c-input u-mb-small" type="hidden" name="username" value="<?php echo $_SESSION['username'] ?>" data-required="true" readonly>
<div class="form-group">
<input class="form-control form-control-user" type="text" name="amount" value="Ksh 300" data-required="true" readonly>
<span id="loadSpin"></span>
<span id="loadMessage"></span>
</div><button  class="btn btn-primary btn-user btn-block">
                                            Activate
                                        </button> <hr>
														
</form>
<a style="float:right" class="btn btn-success" href="process.php?logout">Refresh</a>
<hr>
                                    
                                    
									
</div>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

</div>

<footer class="sticky-footer bg-white">
                                <div class="container my-auto">
                                <div class="copyright text-center my-auto">
                               <span>Copyright &copy; Taji Investments 2022</span>
                                </div>
                                </div>
                                </footer>
 
<script src="user/assets/js/jquery.min.js" type="7b1cef93aab1c40878c2fff8-text/javascript"></script>

<script src="user/assets/plugins/bootstrap/js/popper.min.js" type="7b1cef93aab1c40878c2fff8-text/javascript"></script>
<script src="user/assets/plugins/bootstrap/js/bootstrap.min.js" type="7b1cef93aab1c40878c2fff8-text/javascript"></script>

<script src="user/assets/js/show-password.min.js" type="7b1cef93aab1c40878c2fff8-text/javascript"></script>

<script src="user/assets/js/generate-otp.js" type="7b1cef93aab1c40878c2fff8-text/javascript"></script>

<script src="user/assets/plugins/p-scroll/perfect-scrollbar.js" type="7b1cef93aab1c40878c2fff8-text/javascript"></script>

<script src="user/assets/js/themeColors.js" type="7b1cef93aab1c40878c2fff8-text/javascript"></script>

<script src="user/assets/js/custom.js" type="7b1cef93aab1c40878c2fff8-text/javascript"></script>
<?php 
  include 'footer.php';
    ?>
</body>
 
</html>
