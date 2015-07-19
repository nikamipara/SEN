<?php
require_once('db.php');
session_start();
if(!isset($_SESSION['access']) or ($_SESSION['access']!= 1 and $_SESSION['access']!=4) )
{   
	$_SESSION['access']=0;
	session_destroy();
	header('location:/sen/Modules/login.php');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<title>Welcome to DA-IICT Hostel Website</title>
<meta charset="iso-8859-1">
<link rel="stylesheet" href="styles/layout.css" type="text/css">
<script src="jquery.js"></script>
<script>
		  $(document).ready(function(){
				$('#login-trigger').click(function(){
					$(this).next('#login-content').slideToggle();
					$(this).toggleClass('active');					
					
					if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
						else $(this).find('span').html('&#x25BC;')
					})
		  });
	</script>
<!--[if lt IE 9]><script src="scripts/html5shiv.js"></script><![endif]-->
</head>
<body>
<div id="whole">
<div class="wrapper row1">
  <header id="header" class="clear">
    <hgroup>
      <img src="images/demo/logo.png"></img>
    </hgroup>
    <form action="#" method="post">
      <fieldset>
        <nav>
	<ul>
		<li id="login">
			<a id="login-trigger" href="#">
				Logged in as <?php
				echo $_SESSION["login_id"];  ?>
			</a>                     
		</li>
		<li>
			<a href="http://www.daiict.ac.in">DA-IICT</a>
		</li>
		<li>
			<a href="http://intranet.daiict.ac.in">Intranet</a>
		</li>
		<li>
			<a href="/sen/Modules/Signout.php">Sign Out</a>
		</li>
	</ul>
</nav>
      </fieldset>
    </form>
  </header>
</div>
<!-- content -->
<div class="wrapper row2">
  <div id="status">
	<marquee behavior="scroll" direction="left" scrollamount="20"><?php

		$db_handle=Connect_To_Server();
		$db_found=Connect_To_DB();
		view_dhobi();
		echo " And ";
		view_doctor();
		Close_To_Server($db_handle);
		function view_dhobi()
		{
				$SQL_Query="select name from dhobi_status where present='i' limit 1";
				$result=mysql_query($SQL_Query);
				$out=mysql_fetch_assoc($result);
				$name=$out['name'];
				if($name!="")
				{
					echo "Dhobi $name Is Present";
				}
				else
				{
					echo "No Dhobi Is Present";
				}
		}
		function view_doctor()
		{
				$SQL_Query="select count(*) as counter from doctor where present='i' limit 1";
				$result=mysql_query($SQL_Query);
				$out=mysql_fetch_assoc($result);
				$count=$out['counter'];
				if($count>=1)
				{
					echo "Doctor Is Present";
				}
				else
				{
					echo "No Doctor Is Present";
				}
		}
?></marquee>
  </div>
  <div id="menu_bar">
	<nav>
      <ul>
        <li><a href="/sen/Modules/Links_temp/resident_links_1.php">Home</a></li>
        <li><a href="/sen/Modules/lost and found/LF_resident_main.php">Lost & Found</a></li>
        <li><a href="/sen/Modules/snail mail/Snail_mail_resident_view.php">Snail Mail</a></li>
		<li><a href="/sen/Modules/Forum/Forum_main.php">Forum</a></li>
		<li><a href="/sen/Modules/Rules_regulations.pdf" target="_blank">Rules And Regulations</a></li>
		<li><a href="/sen/Modules/ETIC/ETIC_resident_register.php">ETIC Scheme</a></li>
		<li><a href="/sen/Modules/complaints/Complaints_resident_main.php">Complaints</a></li>
        <li><a href="/sen/Modules/Calender/Calender.php" target="_blank">Calender</a></li>
		<li><a href="/sen/Modules/resident/Change_password_resident.php">Change Password</a></li>
      </ul>
    </nav>
  </div>
  <div id="container" class="clear">
    <!-- content body -->
	<h2 align="center">Enter Lost And Found</h2><br><br>
	<section align="center">
	<?php
if(!isset($_SESSION['access']) or ($_SESSION['access']!= 1 and $_SESSION['access']!=4) )
{   
	$_SESSION['access']=0;
	session_destroy();
	header('location:/sen/Modules/Login/login.php');
}
require_once ('db.php');
$db=Connect_To_Server();
$db_found=Connect_To_DB();

if(isset($_POST['SUBMITLF']))
{
	$userid= $_SESSION['login_id'] ;
	//$userid = '201001199';
	//$type = $_POST['type'];
	//print_r ($_POST);
	$t;
	$title = $_POST['title'];
	$objd = $_POST['object_details'];
	$place = $_POST['place']; 
	if($_POST['type'] == 'lost'){ $t = 0;}
	else if ($_POST['type'] == 'found'){$t=1;}
	//echo $date . $time . $userid . $sentby1 . gettype($_POST['sentby']); 
	
	$query1= "INSERT INTO `lost_found`(`type`,`date`, `time`, `id`, `title`,`place`,`object_details`) 
				VALUES ('$t',NOW() , NOW(), '$userid' , '$title','$place','$objd') ";
	$result = mysql_query($query1);
					if($result==false)
					{  
							echo 'some thing went wrong !!!!!!!!'. mysql_error();
					}
					else
					{	
						echo "Update added successfully for " . $userid;
					}

}
?>
	</section>
	<form action="lf_resident_add.php" method="post">
	<fieldset><legend>Enter Lost And Found </legend>
	<table>
	<tr><td><b>Enter Lost/Found</b></td>
	<td><select name="type">
	<option value="lost">Lost</option>
	<option value="found">Found</option>
	</select></td></tr>
	<tr><td><b>Title* </b></td><td>
	<input name="title" type="text" size=10></td></tr>
	<tr><td><b>Place*</b></td><td>
	<input name="place" type="text" size=10></td></tr>
	<tr><td><b>Object Details </b></td><td>
	<input name="object_details" type="text" size=30></td></tr>
	<tr><td><input type="submit"  name='SUBMITLF' value="Go!"></td>
	<td><input type="reset" value="Start again"></td></tr></fieldset>
	</table>
	</form>

    <!-- main content -->
    <div id="homepage">
      
      <!-- / Two Third -->
    </div>
    <!-- / content body -->
  </div>
</div>
</div>
<!-- Footer -->
<div class="wrapper row3">
  <footer id="footer" class="clear">
    <p class="fl_left">Copyright &copy; DA-IICT, Near Indroda Circle, Gandhinagar - 382 007, Gujarat, India. All rights reserved.</a></p>
    <p class="fl_right">Created by SEN Group 21, B.Tech 2010</p>
  </footer>
</div>
</body>
</html>