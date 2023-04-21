<?php
session_start();
    require ('dbcon.php');
    $curr_pass1=$_POST['curr_password'];
	$curr_pass=md5($curr_pass1);
    $user=$_SESSION['username'];
    $pass=$_SESSION['oldpass'];
    if($curr_pass == $pass){
        $usernam =  $_POST['username'];
        $userpass = $_POST['password'];
		$safe_pass=md5($userpass);
        $sql = "UPDATE admin SET `username` = '$usernam', `password` = '$safe_pass' WHERE username='$user'";
        if(mysqli_query($con, $sql)){
                $_SESSION['username']=$usernam;
                echo "<script> alert('Your details have been updated successfully...'); document.location='dashboard.php' </script>";
        } else{
            echo "<script> alert('Error in updating your details...Please Try Again.'); document.location='dashboard.php' </script>";
        }
        mysqli_close($con);
    }else{
        echo "<script> alert('Sorry, Please Enter the correct Old Password.'); document.location='dashboard.php' </script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="shortcut icon" type="image/x-icon" href="user/assets/images/brand/Taji.PNG" />
   <title>Taji - Update Details</title>
</head>
<body>
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Taji Investments 2022</span>
            </div>
        </div>
    </footer>
</body>
</html>