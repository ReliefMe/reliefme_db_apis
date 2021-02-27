 <?php

if($_SERVER["REQUEST_METHOD"]=="GET")
{
	$api_key="t1";
	if(isset($_GET["api_key"])){
		if($_GET["api_key"]==$api_key){
			require "connect.php";
			// echo (int)substr(uniqid(),5,11);

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

	$username=$_GET["username"];
	$password=$_GET["password"];

	$query=" SELECT * FROM user WHERE username='$username' AND password='$password';"; 
	$result=mysqli_query($connect,$query);
	$number_of_rows=mysqli_num_rows($result);
	$temp_array=array();
	if($number_of_rows>0){
		while($row=mysqli_fetch_assoc($result)){
			$temp_array[]=$row;
			}
		}
		header("Contect-Type:application/json");
		echo json_encode(array("user_login"=>$temp_array));
	mysqli_close($connect);		 
}
?>
 