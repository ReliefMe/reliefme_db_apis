<?php

if($_SERVER["REQUEST_METHOD"]=="GET")
{
	$api_key="t1";
	if(isset($_GET["api_key"])){
		if($_GET["api_key"]==$api_key){
			require "connect.php"; 
	    	upload_ques();
    	}else{
			echo "102";
		}
	}else{
			echo "101";
	}
}
function upload_ques(){
	global $connect;  

	$question_text=$_POST["question_text"];
    $userid=$_POST["u_id"];
    $image=$_POST["image_url"];
    $upvote=0;
    $downvote=0;
    $upload_date=date("YYYY-MM-DD HH:mm:ss");
    
   

	$query="INSERT INTO question ( userId,question_text,image,upvote,downvote,upload_date ) VALUES($userid,'$question_text','$image',$upvote,$downvote,'$upload_date');"; 
	if(mysqli_query($connect,$query)){
        echo "1";
    }else{
        echo mysqli_error($connect);
    }

	mysqli_close($connect);		 
}
?>
 