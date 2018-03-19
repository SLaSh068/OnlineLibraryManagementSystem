<?php 
include('dbconn.php');
session_destroy();
setcookie('PHPSESSID','',time()-7000);
setcookie('uname',$email,time()-7000);
setcookie('upass',$pass,time()-7000);
header('Location:login.php'); 
?>