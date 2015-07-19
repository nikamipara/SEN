<?PHP
$_SESSION['access']=0;
session_destroy();
header('location:/sen/Modules/login/login.php');
?>