<?php
//this is for database connection
require_once('database.php');


//this is for checking the user
function checkUser($data){
$db=$GLOBALS['db'];
$username=mysqli_real_escape_string($db,$data['username']);
$password=mysqli_real_escape_string($db,$data['password']);
$safe_pass=md5($password);
$query="SELECT * FROM users WHERE username='$username'AND password='$safe_pass'";
$runQuery=mysqli_query($db,$query);
$user=mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
if(count($user)>0)  {
    return $user;
	}else{

    return false;
}
}
//this is for checking if the user is verified
function checkVerified(){
$db=$GLOBALS['db'];
$username=$_POST['username'];
$query="SELECT * FROM users WHERE username='$username' AND Verified='1'";
$runQuery=mysqli_query($db,$query);
$user=mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
if(count($user)>0 )  {
	$_SESSION['userdata']=$user;
	$_SESSION['userIsLoggedIn']=true;
	$_SESSION['auth'] = 'verified';
	header('location:home.php');
		}else{
			header('location:activation.php');
		}


}

//this is for checking user main balance
function mainBal($mata){
    $db=$GLOBALS['db'];
	$username = mysqli_real_escape_string($db,$mata['username']);
	$query = "select * from wallet WHERE username = '$username'";
	$runQuery=mysqli_query($db,$query);
	$bal=mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
	if($bal){
      return $bal; 
    }
	}
    
    


//this is for checking email
function checkEmail($data){
    $db=$GLOBALS['db'];
    $username=mysqli_real_escape_string($db,$data['username']);
    $query="SELECT * FROM users WHERE username='$username'";
    $runQuery=mysqli_query($db,$query);
    $user=mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
    if(count($user)>0)  {
        return true;
    }else{
    
        return false;
    }
}
	//update wallet after investing
function invest(){
	$db=$GLOBALS['db'];
	$user=$_POST['username'];
	$Amount=$_POST['amount'];
	
	$query="SELECT * FROM `wallet` WHERE `username` = '$user'";
	$runQuery=mysqli_query($db,$query);
	while ($row = mysqli_fetch_array($runQuery)) {
		$acc1=$row['user_deposit'];
		$acc2= $acc1 - $Amount;
			//update database

			$sql = "UPDATE `wallet` SET `user_deposit` = (`user_deposit`-$Amount) WHERE `username` = '$user' ";

			$query = mysqli_query($db, $sql);
		if ( $query ) {
			return true;
			
		}else{
			return false;
		}
	}	
		
}
//increase Limit after investing
function increaseLimit(){
	$db=$GLOBALS['db'];
	$user = $_POST['username'];
	$sql = "UPDATE `wallet` SET `invest-limit` = (`invest-limit`+1500) WHERE `username` = '$user' ";
	$query = mysqli_query($db, $sql) or die(mysqli_error($db));
	if ($query){
			return true;
			}else{
			return false;
		}
}

//this is for checking the user
function checkRefCode($data){
    $db=$GLOBALS['db'];
    $ref_code=mysqli_real_escape_string($db,$data['ref_code']);
    $query="SELECT * FROM users WHERE user_code='$ref_code'";
    $runQuery=mysqli_query($db,$query);
    $user=mysqli_fetch_all($runQuery) ?? array();
    if(count($user)>0)  {
        return true;
    }else{
        return false;
    }
    }

//this id for generate user code
function genUserCode(){
	$str="AB1CDE2FG3HI4JK5LM6NO7PQ8RS9TU0VQXYZ".time();
	$str= str_split($str,1);
	$l = count($str);
	$user_code='';
	for($i=0;$i<6;$i++){
	$tn = rand(0,$l);
	$user_code.=$str[$tn];
	}

	return $user_code;

}
//this is for generate investment code
function genInvestCode(){
	$var = "AB1CDE2FG3HIJK4LM5NOPQ6RST7UV8WXY9Z0abcdefghijkmnopqrstuvwxyz";
	srand((double)microtime()*1000000);
	$i = 0;
	$rand_Code = '' ;
	while ($i <= 5) {
		$num = rand() % 33;
		$owner = "TAJI";
		$label = "inv";
		$tmp = substr($var, $num, 1);
		$rand_Code = ($rand_Code . $tmp);
		$i++;
	}
	return $owner.$rand_Code.$label;
}
//this is for generate investment code
function genWithCode(){
	$var = "AB1CDE2FG3HIJK4LM5NOPQ6RST7UV8WXY9Z0abcdefghijkmnopqrstuvwxyz";
	srand((double)microtime()*1000000);
	$i = 0;
	$rand_Code = '' ;
	while ($i <= 5) {
		$num = rand() % 33;
		$owner = "TAJI";
		$label = "wd";
		$tmp = substr($var, $num, 1);
		$rand_Code = ($rand_Code . $tmp);
		$i++;
	}
	return $owner.$rand_Code.$label;
}
//this is for generate deposit code
function genDepCode(){
	$var = "AB1CDE2FG3HIJK4LM5NOPQ6RST7UV8WXY9Z0abcdefghijkmnopqrstuvwxyz";
	srand((double)microtime()*1000000);
	$i = 0;
	$rand_Code = '' ;
	while ($i <= 5) {
		$num = rand() % 33;
		$owner = "TAJI";
		$label = "dp";
		$tmp = substr($var, $num, 1);
		$rand_Code = ($rand_Code . $tmp);
		$i++;
	}
	return $owner.$rand_Code.$label;
}	
    //this is for register a new user
function register($data){
    $db=$GLOBALS['db'];
    $user=array();
    $user['errors']=array();
	$firstname=mysqli_real_escape_string($db,$data['firstname']);
	$lastname=mysqli_real_escape_string($db,$data['lastname']);
	$username=mysqli_real_escape_string($db,$data['username']);
	$number=mysqli_real_escape_string($db,$data['number']);
    $email=mysqli_real_escape_string($db,$data['email']);
    $password=mysqli_real_escape_string($db,$data['password']);
    $password1=mysqli_real_escape_string($db,$data['password1']);
    $ref_code=mysqli_real_escape_string($db,$data['ref_code']);
    
    if($firstname==''  || $lastname=='' || $username==''  || $number==''    || $email==''  || $password==''    || $password1=='' || $ref_code==''){
        $user['errors'][]="all fields are required !";
    }
    if(checkEmail($data)){
        $user['errors'][]="User already exists";
    }
    if(!checkRefCode($data)){
        $user['errors'][]="Invalid ref code";
    
    }
    
    if(count($user['errors'])<1){
    $user_code = genUserCode(); 
	$safe_pass=md5($password);
	$safe_pass1=md5($password1);
    $query="INSERT INTO users(firstname,lastname,username,number,email,password,password1,ref_code,user_code) ";
    $query.="VALUES('$firstname','$lastname','$username','$number','$email','$safe_pass','$safe_pass1','$ref_code','$user_code')";
    $runQuery = mysqli_query($db,$query);
    if($runQuery){
        $user['success']="user is created successfully !";
    }else{
        $user['errors'][]="Something went wrong !";
    }
    }
   return $user;
   
    
    
    
	
    }
    
function pendingInvestment($kata){
	$db=$GLOBALS['db'];
	$username=$kata['username'];
	$query="SELECT * FROM investments WHERE username='$username' AND Status='Invested'";
	$runQuery=mysqli_query($db,$query);
	$user = mysqli_fetch_all($runQuery,MYSQLI_ASSOC) ?? array();
	return $user;
	
    }

	function Withdrawtot($rata){
	$db=$GLOBALS['db'];
	$username=$rata['username'];
	$query="SELECT * FROM withdrawals WHERE username='$username' AND Status='Paid'"; /**/
	$runQuery=mysqli_query($db,$query);
	$user = mysqli_fetch_all($runQuery,MYSQLI_ASSOC) ?? array();
	return $user;
	
    }
	
	
   function getRefList($data){
	$db=$GLOBALS['db'];
	$ref_code=$data['ref_code'];
	$query="SELECT * FROM users WHERE ref_code='$ref_code' AND Verified='1'";
	$runQuery=mysqli_query($db,$query);
	$user = mysqli_fetch_all($runQuery,MYSQLI_ASSOC) ?? array();
	return $user;
	
    }
	
//this is for checking if the user is verified
function sendMail(){
$db=$GLOBALS['db'];
$fin=array();
$fin['errors']=array();
$name = $_POST['my_name'];
$email = $_POST['email'];
$message = $_POST['message'];
$query="INSERT INTO messages(name,email,meso)VALUES('$name','$email','$message')";
$runQuery=mysqli_query($db,$query);
if($runQuery){
	$fin['success']="Message has been sent successfully !";
	//return true;
	//header('location:contact.php');
}else{
	$fin['errors'][]="Something went wrong !";
	//return false;
	//header('location:contact.php');
}

return $fin;
}