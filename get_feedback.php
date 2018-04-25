<?php
include "db.php";

if(isset($_POST['feedback'])&&isset($_POST['rating'])){
	$res_id=$_POST['res_id'];
	$user_id=$_POST['uid'];
	$feedback=$_POST['feedback'];
	$rating=$_POST['rating'];
	$query="INSERT INTO restaurants VALUES ('','$user_id','$res_id','$feedback','$rating',now())";
	$result=mysqli_query($con,$query);
	if($result){
		echo "1";
	}
	else{
		echo "0";
	}
}
else if(isset($_GET['id'])){
	$res_id=$_GET['id'];
	$query="SELECT r.id,r.user_id,r.feedback,r.rating,r.date,u.username FROM restaurants r,users u WHERE r.restaurant_id='$res_id' AND r.user_id=u.user_id ORDER BY r.id DESC";
	$result=mysqli_query($con,$query);
	$select=mysqli_num_rows($result);
	$data=array();
	if($select>0){
		while($row=mysqli_fetch_assoc($result)){
			$data[]=$row;
		}
	   echo json_encode($data);
	}
	else{
		echo "0";	
	}
}

?>