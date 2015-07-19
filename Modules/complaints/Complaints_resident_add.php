<?php

// complaint for residents 
require_once('db.php');
session_start();
if(!isset($_SESSION['access']) or $_SESSION['access']!= 1)
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
		<section>
		<!-- write here -->
		<?php
// complaints can be added by hmc hmc convineer residents
if(!isset($_SESSION['access']) or ($_SESSION['access']!= 1 and $_SESSION['access']!= 3 and $_SESSION['access']!= 2))
{   
	$_SESSION['access']=0;
	session_destroy();
	header('location:/sen/Modules/Login/login.php');
}

if(isset($_POST['SUBMITC']))
{
  
		
		require_once("db.php");
		$db=Connect_To_Server();
		$db_found=Connect_To_DB();
		
			
		// user id get it from session veriable this needs to be done before deploying :)........
		/// temp  i am assigning it in static way...
		//$userid= '201001199';
		$userid = $_SESSION['login_id'];
		
		$type = $_POST['type'];
		$des = $_POST['description'];
		
		//echo ".................................." .$type; 
		
		$query1= "INSERT INTO `complaints`(`posting_date`, `posting_time`,`id`, `Type`, `description`) 
				  VALUES (NOW(),NOW(),$userid,'$type','$des') ";
		
		$result = mysql_query($query1);
						if($result==false)
						{
								echo 'some thing went wrong !!!!!!!!'. mysql_error();
						}
						else
						{	
							echo $_POST['type'] . " complaint added successfully for " . $userid;
						}

				//5. close connection

				mysql_close($db);

}
?>
		<br><br>
		Post a Complaint:<br><br>
		<form action="Complaints_resident_add.php" method="post">
		<fieldset><legend>Post a Complaint </legend>

		<select name="type">
		<option value="General">General</option>
		<option value="Water">Water</option>
		<option value="Electrical">Electrical</option>
		<option value="Furniture">Furniture</option>
		</select>
		<br><br>
		<b>Description </b><br><br>
		<input name="description" type="text" size=100><br>
		<br><br>
		</fieldset>
		<input type="submit" name = "SUBMITC" value="Post">
		<input type="reset" value= "Reset"></fieldset>
		</form>
		<br><br>
		<a href="Complaints_resident_main.php">Go back</a><br><br>
		</section>
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