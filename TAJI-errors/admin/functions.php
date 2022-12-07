<?php
//this is for database connection
require_once('database.php');

    function Withdrawtot(){
	$db=$GLOBALS['db'];
	//$username=$rata['username'];
	$query="SELECT * FROM withdrawals WHERE Status='Processing'"; /**/
	$runQuery=mysqli_query($db,$query);
	$user = mysqli_fetch_all($runQuery,MYSQLI_ASSOC) ?? array();
	return $user;
	
    }
	
	function mail1(){
	$db=$GLOBALS['db'];
	$query="select * from content where title  = 'Deposit Bonus'"or die(mysqli_error());
	$mission_query = mysqli_query($db,$query);
	$mission_row = mysqli_fetch_array($mission_query);
	$user =$mission_row['content'];
	return $user;
	
    }
	function mail1Date(){
	$db=$GLOBALS['db'];
	$query="select * from content where title  = 'Deposit Bonus'"or die(mysqli_error());
	$mission_query = mysqli_query($db,$query);
	$mission_row = mysqli_fetch_array($mission_query);
	$user =$mission_row['date'];
	return $user;
	
    }
	
	function fetchAllUnread(){
	define('DBINFO', 'mysql:host=localhost;dbname=twiga2');
    define('DBUSER','root');
    define('DBPASS','');
	$con = new PDO(DBINFO, DBUSER, DBPASS);
	$query="SELECT * from `content` where `status` = 'unread'";
	$stmt = $con->query($query);
	return $stmt->fetchAll();
	}
	
	function sysUsersVer(){
	$db=$GLOBALS['db'];
	//$username=$rata['username'];
	$query="SELECT * FROM users WHERE Verified='1'"; /**/
	$runQuery=mysqli_query($db,$query);
	$user = mysqli_fetch_all($runQuery,MYSQLI_ASSOC) ?? array();
	return $user;
	
    }
	function sysUsersUnver(){
	$db=$GLOBALS['db'];
	//$username=$rata['username'];
	$query="SELECT * FROM users WHERE Verified='0'"; /**/
	$runQuery=mysqli_query($db,$query);
	$user = mysqli_fetch_all($runQuery,MYSQLI_ASSOC) ?? array();
	return $user;
	
    }
	function checkAdmin(){
$db=$GLOBALS['db'];
$username=$_POST['username'];
$password=$_POST['password'];
$query="SELECT * FROM admin WHERE username='$username'AND password='$password'";
$runQuery=mysqli_query($db,$query);
$user=mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
if(count($user)>0)  {
    return $user;
	}else{

    return false;
}
}
function pendingInvestment(){
        $db=$GLOBALS['db'];
		//$username=$kata['username'];
        $query="SELECT * FROM investments WHERE Status='Processed'";
        $runQuery=mysqli_query($db,$query);
        $user = mysqli_fetch_all($runQuery,MYSQLI_ASSOC) ?? array();
	return $user;
        
    }
    
   function getRefList(){
        $db=$GLOBALS['db'];
	//$ref_code=$data['ref_code'];
        $query="SELECT ref_code FROM users WHERE Verified='1'";
        $runQuery=mysqli_query($db,$query);
        $user = mysqli_fetch_all($runQuery,MYSQLI_ASSOC) ?? array();
        return $user;
        
    }