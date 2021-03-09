<?php

if($_SERVER["REQUEST_METHOD"]=="GET")
{
	$api_key="t1";
	if(isset($_GET["api_key"])){
		if($_GET["api_key"]==$api_key){
			require "connect.php";
            
	    	user_exist();
    	}else{
			echo "102";
		}
	}else{
			echo "101";
	}
}
function user_exist(){
	global $connect;  

	$email=$_GET["email"]; 

	$query=" SELECT * FROM user WHERE email='$email';"; 
	$result=mysqli_query($connect,$query);
	$number_of_rows=mysqli_num_rows($result);
	$temp_array=array();
	if($number_of_rows>0){
	echo "1";
		}else{echo "0";} 
	mysqli_close($connect);		 
}
?>
 