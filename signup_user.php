 <?php

if($_SERVER["REQUEST_METHOD"]=="GET")
{
	$api_key="t1";
	if(isset($_GET["api_key"])){
		if($_GET["api_key"]==$api_key){
			require "connect.php";
	    	login();
    	}else{
			echo "102";
		}
	}else{
			echo "101";
	}
}
function login(){
	global $connect;  

	$email=$_GET["email"];
	$password=$_GET["password"];
	$date_time_of_signup=date("y/m/d h:m:s");
	$name=$_GET["name"];
	$username= ($name.substr( md5(uniqid($name)),5,5) );	
	$user_token=$username."-".$date_time_of_signup;		
	$digits = 5; 
	$verification_code=mt_rand(pow(10, $digits-1), pow(10, $digits)-1);
	$contact_number=$_GET["contact_number"];
	$user_type=$_GET["user_type"];
	$gender=$_GET["gender"];

	

	$query="INSERT INTO user(email,	password,date_time_of_signup,usertoken,login_time,username,name,contact_number,photo_url,user_type,status,gender,verification_code) 
	VALUES('$email','$password','$date_time_of_signup','$user_token','-','$username',$name,$contact_number,'-',$user_type,0,$gender,$verification_code);"; 
	//$result=mysqli_query($connect,$query);
	if(mysqli_query($connect,$query)){
	//send email
	include("send_verification.php?email=$email&&password=$password");


	}
	mysqli_close($connect);		 
}
?>
 
