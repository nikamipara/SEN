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
				Logged in as <?php session_start();
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
	
  </div>
  <div id="menu_bar">
	<nav>
      <ul>
        <li><a href="/sen/Modules/Links_temp/admin_links_1.php">Home</a></li>
        <li><a href="/sen/Modules/lost and found/LF_admin_main.php">Lost & Found</a></li>
        <li><a href="/sen/Modules/snail mail/Snail_mail_admin_main.php">Snail Mail</a></li>
		<li><a href="#">Forum</a></li>
		<li><a href="#">Rules And Regulations</a></li>
		<li><a href="#">Complaints<span>&#x25BC;</span></a>
			<ul>
					<li><a href="/sen/Modules/complaints/Complaint_admin_general_view.php">General</a></li>
					<li><a href="/sen/Modules/complaints/Complaint_admin_water_view.php">Water</a></li>
					<li><a href="/sen/Modules/complaints/Complaint_admin_electrical_view.php">Electrical</a></li>
					<li><a href="/sen/Modules/complaints/Complaint_admin_furniture_view.php">Furntiture</a></li>
			</ul>
		</li>
		</li>
        <li><a href="/sen/Modules/Calender/Calender.php" target="_blank">Calender</a></li>
		<li><a href="#">Settings<span>&#x25BC;</span></a>
		<ul>
					<li><a href="/sen/Modules/admin/Admin_settings_admin.php">Admin</a></li>
					<li><a href="/sen/Modules/admin/Doctor_settings_admin.php">Doctor</a></li>
					<li><a href="/sen/Modules/admin/HMC_settings_admin.php">HMC</a></li>
					<li><a href="/sen/Modules/admin/Laptop_settings_admin.php">Laptop</a></li>
					<li><a href="/sen/Modules/admin/Resident_settings_admin.php">Resident</a></li>
					<li><a href="/sen/Modules/admin/Dhobi_settings_admin.php">Dhobi</a></li>
					<li><a href="/sen/Modules/admin/Gate_settings_admin.php">Gate</a></li>
			</ul>
		</li>
      </ul>
    </nav>
  </div>
  <div id="container" class="clear">
    <!-- content body -->
	<h2 align="center">Snail Mail</h2>
	<section align="center">
	
<?php

//include ('sen/databasefun.php');
if(!isset($_SESSION['access']) or $_SESSION['access']!= 4)
{   
	$_SESSION['access']=0;
	session_destroy();
	header('location:/sen/Modules/Login/login.php');
}

require("phpmailer/class.phpmailer.php");
require("phpmailer/class.smtp.php");
require_once("db.php");

$db=Connect_To_Server();
$db_found=Connect_To_DB();	
$date1 = new DateTime();
$date = $date1->format('Y-m-d');
$time = $date1->format('H:i:s');

$userid= $_POST['id'];
$sentby1 = $_POST['sentby'];
//echo $date . $time . $userid . $sentby1 . gettype($_POST['sentby']); 

$query1= "INSERT INTO `snail_mail`(`date`, `time`, `id`, `sentby`) VALUES (NOW() , NOW(), $userid , '' '.$sentby1.' '') ";
//$query1="INSERT INTO `snail_mail`(`date`, `time`, `id`, `sentby`) VALUES (2013-03-27 , '06:50:50' , '201001199' ,'spped postr') ";

$result = mysql_query($query1);
				if($result==false)
				{
						echo 'some thing went wrong !!!!!!!!'. mysql_error();
				}
				else
				{	
					echo '<br><br><br>';
					echo 'Snail mail update added successfully for '. $userid;
					echo '<br><br><br>';
					createmail( $userid , $sentby1);
				}

//5. close connection

?>	
<?php

function createmail( $userid , $sentby)
{	
require_once("db.php");

$result3 = mysql_query("SELECT  t2.email FROM  (select * from login where login_id = '$userid') as t1  LEFT JOIN residents as t2 on (t1.login_id = t2.login_id ) ");
$row1 = mysql_fetch_array($result3);
$mail = new PHPMailer(); 
$mail->IsSMTP();
$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->Username = "daiicthor@gmail.com"; // SMTP username
$mail->Password = "horofdaiict"; // SMTP password
$mail->SMTPKeepAlive = true;                  // SMTP connection will not close after each email sent

			
			$webmaster_email = "da_hostel@daiict.ac.in"; //Reply to this email ID
																					$webmaster_name="admin";

			$mail->From = $webmaster_email;

			$mail->FromName = $webmaster_name;

			$mail->AddReplyTo($webmaster_email,$webmaster_name);

														
			$mail->IsHTML(true); // send as HTML
			

			$mail->WordWrap = 50; // set word wrap									//only suportsmax 500 users

																					//$mail->AddAttachment("/var/tmp/file.tar.gz"); // attachment

																					//$mail->AddAttachment("/tmp/image.jpg", "new.jpg"); // attachment

			
			$mail->Subject ='You have a new snail mail. ';
			$mail->Body = " you have a new snail mail  from   ". $sentby ;			
			


	
				$mail->AddAddress($row1['email'],$userid);
				
				
	
	if(!$mail->Send())
			{
			echo "Mailer Error: " . $mail->ErrorInfo;
			}
			else
			{
			echo "Message has been sent";
			}
	
}

	 

?>
	<br><br><br>
	<a href="Snail_mail_admin_add.php">Go Back</a><br>
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