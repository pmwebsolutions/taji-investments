<div class="col-12 m-auto mt-5">
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
<div class="alert alert-danger" role="alert">
<?=$message?>
</div>
        <?php
    }
}
    ?>
	
	
							

<div class="text-center">
	<h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
</div>
<form action="account/process.php?signup" method="post"  class="user">
<input type="hidden" name="todo" value="POST">
<input type="hidden" value='1' name="package">
<div class="form-group row">	

  <div class="col-sm-6 mb-3 ">
					<input class="input100 border-start-0 ms-0 form-control form-control-user" id="firstname" type="text" name="firstname" placeholder="Firstname" value="" data-required="true" required>
					</div>
	<div class="col-sm-6 mb-3 ">
					<input class="input100 border-start-0 ms-0  form-control form-control-user" id="lastname" type="text" name="lastname" placeholder="Lastname" value="" data-required="true" required>
					</div>
  <div class="col-sm-6 mb-3 ">
					<input class="input100 border-start-0 ms-0 form-control form-control-user" id="username" type="text" name="username" placeholder="Username" value="" data-required="true" required>
					</div>
		<div class="col-sm-6 mb-3">
					<input id="phone" class="border-start-0 ms-0 form-control form-control-user" type="number" data-type="number" placeholder="Enter phone number"  data-required="true" name="number" minlength="7" required>
					</div>
		
		<div class="col-sm-6 mb-3 ">
					<input class="input100 border-start-0 ms-0 form-control form-control-user" type="email" placeholder="Email address" value="" data-required="true" name="email" required>
					</div>	
      <div class="col-sm-6 mb-3 ">
					<input class="input100 border-start-0 ms-0 form-control form-control-user" type="password" id="password" data-equalto="#pwd" value="" placeholder="Password" data-required="true" name="password" required>
					</div>
					
					
		<div class="col-sm-6 mb-3 ">
					<input class="input100 border-start-0 ms-0 form-control form-control-user" type="password" id="password1" data-equalto="#pwd" value="" placeholder="Confirm password" data-required="true" name="password1" required>
					</div>			
  <div class="col-sm-6 mb-3">
    <input type="text" class="input100 border-start-0 ms-0 form-control form-control-user" value="<?=isset($_GET['refcode'])?$_GET['refcode']:''?>" name="ref_code" placeholder="Referal Code" id="exampleInputPassword1">
  </div>
  <input class="input--style-4" type="hidden" data-required="" style="text-transform:capitalize" name="referral" value="" readonly>
					<label class="custom-control custom-checkbox mt-4">
					<input type="checkbox" class="custom-control-input" required>
					<span class="custom-control-label">Agree to the <a href="terms.html">Terms and Conditions.</a></span>
					</label>
					</div>
  
 
  <div class="container-login100-form-btn">
						<button class="btn btn-primary btn-user btn-block">
						Register Account
						</button>
						</div>
	 <hr>
                                <!--a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a-->
                           
                                 <hr>					
</form>

                            <div class="text-center">
                                <a class="small" href="?login">Already have an account? Login!</a>
                            </div>
							  <footer class="sticky-footer bg-white">
                                <div class="container my-auto">
                                <div class="copyright text-center my-auto">
                               <span>Copyright &copy; Taji Investments 2022</span>
                                </div>
                                </div>
                                </footer>

</div>