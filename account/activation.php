<?php
session_start();
include 'header.php';
?>
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
	
                                        <h1 class="h4 text-gray-900 mb-4">Activate Account!</h1>
                                    </div>
						
<h2>Mpesa Payment(Taji Investments) &nbsp &nbsp <a class="btn btn-success" href="process.php?logout">Refresh</a></h2>
<h4>Pay 300ksh To Till number 8100616</h4>
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

<hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="?signup">Create an Account!</a>
                                    </div>
									<footer class="sticky-footer bg-white">
                                <div class="container my-auto">
                                <div class="copyright text-center my-auto">
                               <span>Copyright &copy; Taji Investments 2022</span>
                                </div>
                                </div>
                                </footer>
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


 
<script src="user/assets/js/jquery.min.js" type="7b1cef93aab1c40878c2fff8-text/javascript"></script>

<script src="user/assets/plugins/bootstrap/js/popper.min.js" type="7b1cef93aab1c40878c2fff8-text/javascript"></script>
<script src="user/assets/plugins/bootstrap/js/bootstrap.min.js" type="7b1cef93aab1c40878c2fff8-text/javascript"></script>

<script src="user/assets/js/show-password.min.js" type="7b1cef93aab1c40878c2fff8-text/javascript"></script>

<script src="user/assets/js/generate-otp.js" type="7b1cef93aab1c40878c2fff8-text/javascript"></script>

<script src="user/assets/plugins/p-scroll/perfect-scrollbar.js" type="7b1cef93aab1c40878c2fff8-text/javascript"></script>

<script src="user/assets/js/themeColors.js" type="7b1cef93aab1c40878c2fff8-text/javascript"></script>

<script src="user/assets/js/custom.js" type="7b1cef93aab1c40878c2fff8-text/javascript"></script>
<script type="7b1cef93aab1c40878c2fff8-text/javascript"> 
		function myFunction() {
			var element, name, arr;
			element = document.getElementById("loadSpin");
			name = "spinner";
			arr = element.className.split(" ");
			if (arr.indexOf(name) == -1) {
				element.className += " " + name;
			}
			var element1, name1, arr1;
			element1 = document.getElementById("loadMessage");
			name1 = "alerter";
			arr1 = element1.className.split(" ");
			if (arr1.indexOf(name1) == -1) {
				element1.className += " " + name1;
				element1.innerHTML = "<h6> Please Wait and check your phone..<br><strong>DO NOT CLOSE THIS WINDOW</strong></h6>";
			}
			
			var element2 = document.getElementById("disablediv");
			element2.classList.add("disabled");
			
			
		}      
	</script>
<style
{
	pointer-events: none;
}
.spinner {
	position: absolute;
	left: 50%;
	top: 20%;
	height:60px;
	width:60px;
	margin-left: -50px;
	margin-top: -50px;
	-webkit-animation: rotation .6s infinite linear;
	-moz-animation: rotation .6s infinite linear;
	-o-animation: rotation .6s infinite linear;
	animation: rotation .6s infinite linear;
	border-left:6px solid rgba(0,174,239,.15);
	border-right:6px solid rgba(0,174,239,.15);
	border-bottom:6px solid rgba(0,174,239,.15);
	border-top:6px solid rgba(0,174,239,.8);
	border-radius:100%;
}
@-webkit-keyframes rotation {
	from {-webkit-transform: rotate(0deg);}
	to {-webkit-transform: rotate(359deg);}
}
@-moz-keyframes rotation {
	from {-moz-transform: rotate(0deg);}
	to {-moz-transform: rotate(359deg);}
}
@-o-keyframes rotation {
	from {-o-transform: rotate(0deg);}
	to {-o-transform: rotate(359deg);}
}
@keyframes rotation {
	from {transform: rotate(0deg);}
	to {transform: rotate(359deg);}
}
.alerter {
	position: absolute;
	left: 50%;
	top: 20%;
	margin-left: -100px;
	margin-top: 10px;
	color: green;
}

</style>
<script src="https://kit.fontawesome.com/3b5f670a1d.js" crossorigin="anonymous" type="7b1cef93aab1c40878c2fff8-text/javascript"></script>
<script src="/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="7b1cef93aab1c40878c2fff8-|49" defer=""></script>
<?php 
  include 'footer.php';
    ?>
</body>
 
</html>
