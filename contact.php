<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Contact us | Taji Investments</title>
	<link rel="shortcut icon" type="image/x-icon" href="images/Taji.PNG" />
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME CSS -->
<link href="css/font-awesome.min.css" rel="stylesheet" />
     <!-- FLEXSLIDER CSS -->
<link href="css/flexslider.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="css/style.css" rel="stylesheet" />    
  <!-- Google	Fonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css' />
</head>
<body ><div class="navbar navbar-inverse navbar-fixed-top " id="menu">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" style="color:white" href="index.php"><img class="logo-custom" src="images/Taji.png" alt="..."  />TAJI INVESTMENTS</a>
            </div>
            <div class="navbar-collapse collapse move-me">
                <ul class="nav navbar-nav navbar-right">
                    <li ><a href="index.php">HOME</a></li>
                     <li><a href="about_us.php">ABOUT US</a></li>
                    <li><a href="how_it_works.php">HOW IT WORKS</a></li>
                     <li><a href="testimonies.php">TESTIMONIES</a></li>
                     <li><a href="contact.php">CONTACT USs</a></li>
					 
                </ul>
            </div>
           
        </div>
    </div>
	</br>
</br>
	
	
	<div id="contact-sec"   >
           <div class="overlay">
 <div class="container set-pad">
      <div class="row text-center">
                 <div class="col-lg-8 col-lg-offset-2 col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
                     <h1 data-scroll-reveal="enter from the bottom after 0.1s" class="header-line" >CONTACT US  </h1>
                     <p data-scroll-reveal="enter from the bottom after 0.3s">
					 <h4>You need help? Contact us below.</h4>
                         </p>
                 </div>

             </div>
             <!--/.HEADER LINE END-->
           <div class="row set-row-pad"  data-scroll-reveal="enter from the bottom after 0.5s" >
           <?php
	
require('account/functions.php');
session_start();
if(isset($_SESSION['msg'])){
    $msg = $_SESSION['msg'];
    unset($_SESSION['msg']);
}


if(isset($msg)){
    foreach($msg as $message){
        ?>
<div class="alert alert-danger col-sm-8" role="alert">
<?=$message?>
</div>
        <?php
    }
}
    ?>
				
                 <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2">				 
                    <form method="POST" action="account/process.php?contact_us">
                        <div class="form-group">
                            <input type="text" class="form-control" name="my_name" required="required" placeholder="Your Name" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" required="required" name="email" placeholder="Your Email" />
                        </div>
                        <div class="form-group">
                            <textarea name="message" required="required" class="form-control" style="min-height:150px;" placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" id="send" name="send"  class="btn btn-info btn-block btn-lg">SUBMIT REQUEST</button>
                        </div>

                    </form>
                </div>

               </div>
                </div>
          </div> 
       </div>
	   

	   

	   
     <div class="container">
             <div class="row set-row-pad"  >
    <div class="col-lg-4 col-md-4 col-sm-4   col-lg-offset-1 col-md-offset-1 col-sm-offset-1 " data-scroll-reveal="enter from the bottom after 0.4s">

                    <h2 ><strong>Our Location </strong></h2>
        <hr />
                    <div >
                        
                        <h4>Kenya.</h4>
                        <h4><strong>Call:</strong> +254795168638  </h4>
                        <h4><strong>Email: </strong> </h4>
                    </div>


                </div>
                 <div class="col-lg-4 col-md-4 col-sm-4   col-lg-offset-1 col-md-offset-1 col-sm-offset-1" data-scroll-reveal="enter from the bottom after 0.4s">

                    <h2 ><strong>Social Conectivity </strong></h2>
        <hr />
                    <div >
                        <a href="#">  <img src="images/img/Social/facebook.png" alt="" /> </a>
                     <a href="#"> <img src="images/img/Social/google-plus.png" alt="" /></a>
                     <a href="#"> <img src="images/img/Social/twitter.png" alt="" /></a>
                    </div>
                    </div>


                </div>
				</div>
                 </div>
				 <div id="footer">
           <p>All Rights Reserved |  TAJI INVESTMENTS&copy </p>
    </div>
     <!-- FOOTER SECTION END-->
   
    <!--  Jquery Core Script -->
    <script src="js/jquery-1.10.2.js"></script>
    <!--  Core Bootstrap Script -->
    <script src="js/bootstrap.js"></script>
    <!--  Flexslider Scripts --> 
         <script src="js/jquery.flexslider.js"></script>
     <!--  Scrolling Reveal Script -->
    <script src="js/scrollReveal.js"></script>
    <!--  Scroll Scripts --> 
    <script src="js/jquery.easing.min.js"></script>
    <!--  Custom Scripts --> 
         <script src="js/custom.js"></script>
<script>
function checkuser(){
	var name=document.getElementById("my_name").value;
	var email=document.getElementById("email").value;
	var meso=document.getElementById("message").value;
	//if(name){
		$.ajax({
			type: 'post',
			url: 'send.php',
			//data: {	username:name,},
			success: function(response){
				$('#mail').html(response);
				if(response =="Done"){
					return true;
				}else{
					return false;
				}
			}
		});
	//}else{
	//	$('#username_status').html("");
		//return false;
	//}
}
</script>
</body>
</html>
