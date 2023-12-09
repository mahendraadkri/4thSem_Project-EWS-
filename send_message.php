<?php
require('connection.inc.php');
require('functions.inc.php');
require("validation.php");
$name=get_safe_value($con,$_POST['name']);
$email=get_safe_value($con,$_POST['email']);
$mobile=get_safe_value($con,$_POST['mobile']);
$comment=get_safe_value($con,$_POST['message']);
$added_on=date('Y-m-d h:i:s');

if(!validateName($name)){
    echo "Invalid Name";
    die;
}

if(!validateMobile($mobile)){
    echo "Invalide Mobile Number";
    die;
}
if(!validateEmail($email)){
    echo "Invalide Email";
    die;
}
mysqli_query($con,"insert into contact_us(name,email,mobile,comment,added_on) values('$name','$email','$mobile','$comment','$added_on')");
echo "Thank you";
?>