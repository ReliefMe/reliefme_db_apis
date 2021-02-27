<?php 
require "connect.php";
$email=$_GET["email"];
$password=$_GET["password"];
$header="From:info@reliefme.org";
$v_code="";

$query=" SELECT verification_code FROM user WHERE email='$email' AND password='$password';"; 
	$result=mysqli_query($connect,$query);
	$number_of_rows=mysqli_num_rows($result);
	$temp_array=array();
	if($number_of_rows>0){
		while($row=mysqli_fetch_assoc($result)){
			 $v_code=$row["verification_code"];
			}
		}
mail($email,"Verification code", "your verification code : ".$v_code,$header);
mysqli_close($connect);	
 


?>