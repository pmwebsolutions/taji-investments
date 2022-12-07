<?php session_start();
$_SESSION['login']=true;
 ?>
<html>
<head>

<script type='text/javascript'>
    function setSession(variable, value) {
        xmlhttp = new XMLHttpRequest();
        xmlhttp.open("GET", "setSession.php?variable=" + variable + "&value=" + value, true);
        xmlhttp.send();
    }
</script>
</head>
<body>
<?php
if(isset($_SESSION['login']) /*&& $_SESSION['login'] == 'true'*/){
	echo "Session Active. <a href=\"javascript:setSession('login', 'false')\"><input type='submit' value='De-Activate'></a>";
}else{
	echo "Session Inactive. <a href=\"javascript:setSession('login', 'true')\"><input type='submit' value='Activate'></a>";
	echo "<a href=\"index.php\"><input type='submit' value='Re-Load Page'></a>";
}
?>
</body>
</html>


