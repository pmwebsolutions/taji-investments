<?php
$output='<p>Dear user,</p>';
    $output.='<p>Please click this button to reset your password.</p>';
    $output.='<p>-------------------------------------------------------------</p>';
    $output.='<p><a href="https://tajinvestments.org/forgotpwd/reset-password.php?key=key&email=email&action=reset" target="_blank">Reset Password</a></p>';		
    $output.='<p>-------------------------------------------------------------</p>';
    $output.='<p>You can also copy the link below to your browser</p>';
    $output.='<p>-------------------------------------------------------------</p>';
    $output.='<p><a href="https://tajinvestments.org/forgotpwd/reset-password.php?key=$key&email=$email&action=reset" target="_blank">https://tajinvestments.org/forgotpwd/reset-password.php?key=$key.&email=$email&action=reset</a></p>';
    $output.='<p>-------------------------------------------------------------</p>';
    $output.='<p>Please be sure to copy the entire link into your browser.</p><p> The link will expire after 30 minutes for security reasons.</p>';
    $output.='<p>If you did not request this password reset email, no action 
    is needed, your password will not be reset. However, you may want to log into 
    your account and change your security password as someone may have guessed it.</p>';   	
    $output.='<p>Thanks,</p>';
    $output.='<p>TAJI INVESTMENTS Support Team</p>';
     
    echo $output;
    ?>