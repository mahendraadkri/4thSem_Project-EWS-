<?php
require('connection.inc.php');
require('functions.inc.php');

$email=get_safe_value($con,$_POST['email']);
$password=get_safe_value($con,$_POST['password']);

$res=mysqli_query($con,"select * from users where email='$email'");
$check_user=mysqli_num_rows($res);
if($check_user>0){
	$row=mysqli_fetch_assoc($res);
	$h_password = $row["password"];
	if(password_verify($password, $h_password)){
		$_SESSION['USER_LOGIN']='yes';
		$_SESSION['USER_ID']=$row['id'];
		$_SESSION['USER_NAME']=$row['name'];
		echo "valid";
	}
	else{
		echo "your pw = ".$password." DB hash = ".$h_password;
	}
	
}else{
	$res=mysqli_query($con,"select * from admin where email='$email' and password='$password'");
	$check_user=mysqli_num_rows($res);
	if($check_user > 0){
		$row=mysqli_fetch_assoc($res);
		$_SESSION['ADMIN_LOGIN']='yes';
		$_SESSION['ADMIN_ID']=$row['id'];
		echo "valid";
	}
}
?>