<?php 
include "../dbcon.php";
session_start();
$id=$_SESSION['id']; 
date_default_timezone_set('Asia/dhaka');
$last_logout = date('Y-m-d H:i:s');
$time=time()+5;
$res=mysqli_query($con,"update admin set last_login='$time', last_logout='$last_logout' where id=$id and status=1");
?>