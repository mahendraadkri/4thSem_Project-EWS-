<?php
require('connection.inc.php');
require('functions.inc.php');
unset($_SESSION['ADMIN_ID']);
unset($_SESSION['ADMIN_LOGIN']);
unset($_SESSION['ADMIN_NAME']);
header('location:../index.php');
die();
?>