<div class="col-12 m-auto">
<?php

require('functions.php');
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
	
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
	
	
<form method="post" action="process.php?adminlogin" class="user"  >
  <div class="form-group">
    
    <input type="text" class="input100 border-start-0 ms-0 form-control form-control-user" name="username" id="exampleInputEmail1" aria-describedby="emailHelp"
    placeholder="Username">
  </div>
  <div class="form-group">
    
    <input type="password" class="input100 border-start-0 ms-0 form-control form-control-user" name="password" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
	<div class="custom-control custom-checkbox small">
		<input type="checkbox" class="custom-control-input" id="customCheck">
		<label class="custom-control-label" for="customCheck">Remember
			Me</label>
	</div>
</div>
  
 
  <button  class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
					<hr>
                                        			
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