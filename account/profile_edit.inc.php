<?php
session_start();
    require ('database.php');
        $fname= $_POST['firstname'];
        $lname= $_POST['lastname'];            
        $uname= $_POST['username'];
        $pnumber= $_POST['phone'];
        $email= $_POST['email'];
        $curr_pass0=$_POST['curr_password'];
		$curr_pass=md5($curr_pass0);
        $user=$_SESSION['username'];
        $pass=$_SESSION['oldpass'];
        $supported_image = array('gif','jpg','jpeg','png');
   $src_file_name = $_FILES["photo"]["name"];
   $ext = strtolower(pathinfo($src_file_name, PATHINFO_EXTENSION));
if(in_array($ext, $supported_image)){
	if($curr_pass == $pass){
            $usernam =  $_POST['username'];
            $userpass = $_POST['password'];
			$safe_pass=md5($userpass);
			$extension = explode("/", $_FILES["photo"]["type"]);
			move_uploaded_file($_FILES["photo"]["tmp_name"], "user/uploads/"  . $usernam.".".$extension[1]);
            $location = "uploads/" . $usernam.".".$extension[1];
            $sql = "UPDATE users SET `username` = '$usernam', `password` = '$safe_pass', `email`='$email', `number`='$pnumber', `firstname`= '$fname', `lastname`= '$lname', `profilepic`='$location' WHERE username='$user'";
        if(mysqli_query($db, $sql)){
            $_SESSION['username']=$usernam;
            echo "<script> alert('Your details have been updated successfully...');document.location='profile_edit.php'
			</script>";
        }else{
        echo "<script> alert('Error in updating your details...Please Try Again.');document.location='profile_edit.php'</script>";
        }
        mysqli_close($db);
    }else{
        echo "<script> alert('Sorry, Please Enter the correct Old Password.');document.location='profile_edit.php'</script>";
        }
}else{echo "<script> alert('Sorry, Please Select an Image in the supported formats (gif, jpg, jpeg or png).');document.location='profile_edit.php'</script>";}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link rel="shortcut icon" type="image/x-icon" href="img/Taji.PNG" />
   <!-- Custom styles for this template-->
   <link href="css/sb-admin-2.min.css" rel="stylesheet">
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