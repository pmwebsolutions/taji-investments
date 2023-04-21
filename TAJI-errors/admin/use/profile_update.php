<?php
$con = mysqli_connect('localhost','root','','twiga2');
      if(isset($_POST['save'])){
        $username = $_POST['username'];
        $userpass = $_POST['password'];
        $curr_password = $_POST['curr_password'];
        if(password_verify($curr_password, $pass)){
      $query = "UPDATE admin SET username = '$username',
                      gender = '$userpass'
                      WHERE username = '$user'";
                    $result = mysqli_query($con, $query) or die(mysqli_error($con));
                    ?>
                     <script type="text/javascript">
            alert("Update Successfull.");
            window.location = "dashboard.php";
        </script>
        <?php
        }  } 