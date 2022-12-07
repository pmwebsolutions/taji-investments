<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="PM Web Solutions, https://omitihenry.rf.gd, Erick Ndwiga">
      <link rel="shortcut icon" type="image/x-icon" href="user/assets/images/brand/Taji.PNG" />
    
    <title>Taji Investments</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body >
<div>
<div ><br>
<a href="about_us.php" class="btn btn-sm btn-primary">About Us</a>


<a href="contact.php" class="btn btn-sm btn-primary">Contact Us</a>
<a href="how_it_works.php" class="btn btn-sm btn-primary">How It Works</a>
</br><br></div>


</div>
<div class="bg-gradient-info">
       <div class="container">
         <div class="row justify-content-center">
		 <div class="col-xl-5 col-lg-12 col-md-9">
             <div class="card o-hidden border-0 shadow-lg my-5">
                  <div class="card-body p-0">
                     <!-- Nested Row within Card Body -->
                     <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-12">
                        <div class="p-5">
						
								<?php
							if(isset($_GET['signup']) || isset($_GET['refcode'])&& ! isset($_SESSION['userdata'])){
								include('register.php');
							}else if(isset($_GET['login']) && !isset($_SESSION['userdata'])){
								include('login.php');
							}else if(isset($_SESSION['userdata'])){
								include('account/home.php');
								
							}else{
								include('login.php');

							}
								?>

										
									
								

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
</div>
</body>

</html>