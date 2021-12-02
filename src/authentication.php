<?php
include "db.php";
session_start();

if(isset($_POST['uname'])){
	$mobno=$_POST['mobno'];
	$uname=$_POST['uname'];
	$pass=password_hash($_POST['pass'], PASSWORD_DEFAULT);
	$query="SELECT * FROM users WHERE mobile_no='$mobno'";
	$result=mysqli_query($con,$query);
	$select=mysqli_num_rows($result);
	if($select>0){
		echo "Mobile Number Already registered!";
		exit;
	}
	$query1="INSERT INTO users VALUES (DEFAULT,'$mobno','$uname','$pass')";
	$result1=mysqli_query($con,$query1);
	if($result1){
		echo "1";
	}
	else{
		echo "Registration failed. Please try again!";
	}
}
else{
	$mobno=$_GET['mobno'];
	$pass=$_GET['pass'];
	$query="SELECT * FROM users WHERE mobile_no='$mobno'";
	$result=mysqli_query($con,$query);
	$select=mysqli_num_rows($result);
	if($select==1){
		$_SESSION['isLogin']=1;
		$row=mysqli_fetch_row($result);
		$_SESSION['user_id']=$row[0];
		$_SESSION['username']=$row[2];
		if(password_verify($pass,$row[3])){
			echo $_SESSION['user_id'];	
		}
		else{
			echo "0";
		}	
	}
}

?>