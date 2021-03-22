<?php

if($_SERVER["REQUEST_METHOD"]=="GET")
{
	$api_key="t1";
	if(isset($_GET["api_key"])){
		if($_GET["api_key"]==$api_key){
			require "connect.php"; 
	    	upload_comments();
    	}else{
			echo "102";
		}
	}else{
			echo "101";
	}
}
function upload_comments(){
	global $connect;  

	$question_id=$_POST["q_id"]; 
    $comment_text=$_POST["comment_text"];
    $userid=$_POST["u_id"];
    $attached_pic=$_POST["image_url"];
    $upvote=0;
    $downvote=0;
    $c_date=date("YYYY-MM-DD HH:mm:ss");
    

    

	$query=" INSERT INTO comment ( userId,question_id,comment_text,c_upvote,c_downvote,attached_pic,c_date ) 
    VALUES($userid,'$question_id','$comment_text',$upvote,$downvote,'$attached_pic','$c_date');"; 
	//$result=mysqli_query($connect,$query);
    if(mysqli_query($connect,$query)){
        echo "1";
    }else{
        echo mysqli_error($connect);
    }

	// $number_of_rows=mysqli_num_rows($result);
	// $temp_array=array();
	// if($number_of_rows>0){
	// 	while($row=mysqli_fetch_assoc($result)){
	// 		$temp_array[]=$row;
	// 		}
	// 	} 
	mysqli_close($connect);		 
}
?>
 