<?php

if($_SERVER["REQUEST_METHOD"]=="GET")
{
	$api_key="t1";
	if(isset($_GET["api_key"])){
		if($_GET["api_key"]==$api_key){
			require "connect.php"; 
	    	show_comments();
    	}else{
			echo "102";
		}
	}else{
			echo "101";
	}
}
function show_comments(){
	global $connect;  

	$question_id=$_POST["q_id"]; 

	$query=" SELECT * FROM comment WHERE question_id='$question_id'  ORDER BY c_date ASC;"; 
	$result=mysqli_query($connect,$query);
	$number_of_rows=mysqli_num_rows($result);
	$temp_array=array();
	if($number_of_rows>0){
		while($row=mysqli_fetch_assoc($result)){
			$temp_array[]=$row;
			}
		}
		header("Contect-Type:application/json");
		echo json_encode(array("comments"=>$temp_array));
	mysqli_close($connect);		 
}
?>
 