<?php
include("connect.php");
if(isset($_POST['done'])){
 	$email = $_POST['email'];
 	$pass = md5($_POST['password']);
 	
 	//getting values from database
	$result = mysqli_query($con,"SELECT * FROM user WHERE email = '$email' AND password = '$pass'");
	$result_d = mysqli_query($con,"SELECT * FROM Admin WHERE email = '$email' AND password = '$pass'");
	$row  = mysqli_fetch_array($result);
	$row_d  = mysqli_fetch_array($result_d);
if($row == true) {
$_SESSION["user_id"] = $row['email'];
$_SESSION["user_password_id"] = md5($row['password']);
echo 0;
} else if($row_d == true) {
	$_SESSION["admin_id"] = $row_d['email'];
	$_SESSION["admin_pass_id"] = $row_d['password'];
	echo 1;
}else{
	//returns error
	echo 2;
}
mysqli_close($con);
}
?> 
