<?php
// form for admin 
session_start();
if(!isset($_SESSION['access']) or $_SESSION['access']!= 4)
{   
	$_SESSION['access']=0;
	session_destroy();
	header('location:/sen/Modules/login.php');
}

?>
<html>
<head><title>snail mail add</title></head>
<form action="smenter.php" method="post">
<fieldset><legend>Submit Snail mail</legend>
<b>Enter student id</b>
<input name="id" type="text" size=10><br>
<b>sent by </b>
<input name="sentby" type="text" size=30><br><br>
</fieldset>
<input type="submit" value="Go!">
<input type="reset" value="Start again"></fieldset>
</form>
</html>