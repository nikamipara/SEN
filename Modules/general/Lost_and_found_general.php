<?php
// this is for home page of the site lost and found
require_once ('db.php');
$db=Connect_To_Server();
$db_found=Connect_To_DB();
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
				Log in <span>&#x25BC;</span>
			</a>
			<div id="login-content">
				<form>
					<fieldset id="inputs">
						<input id="username" name="username" placeholder="Your ID" required>   
						<input id="password" type="password" name="password" placeholder="Password">
					</fieldset>
					<fieldset id="actions">
						<input type="submit" name="SUBMIT1" id="submit" value="Log in">
						<input type="submit" id="password1" name="SUBMIT2" value="Forgot Password">
						<?PHP
							
							require("phpmailer/class.phpmailer.php");
							require("phpmailer/class.smtp.php");
							if(isset($_POST['SUBMIT1']))
							{
			
								$username=$_POST['username'];
								$password=$_POST['password'];
								$db_handle=Connect_To_Server();
								$db_found=Connect_To_DB();
								login($username,$password);
								Close_To_Server($db_handle);
							}
							if(isset($_POST['SUBMIT2']))
							{
			
								$username=$_POST['username'];
								$db_handle=Connect_To_Server();
								$db_found=Connect_To_DB();
								forgot_password($username);
								Close_To_Server($db_handle);
							}
						?>
					</fieldset>
				</form>
			</div>                     
		</li>
		<li>
			<a href="http://www.daiict.ac.in">DA-IICT</a>
		</li>
		<li>
			<a href="http://intranet.daiict.ac.in">Intranet</a>
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
        <li><a href="/sen/Modules/Login/login.php">Home</a></li>
        <li><a href="/sen/Modules/General/Lost_and_found_general.php">Lost & Found</a></li>
        <li><a href="/sen/Modules/General/snailmail_general.php">Snail Mail</a></li>
        <li><a href="/sen/Modules/General/etic_general.php">ETIC Scheme</a></li>
		<li><a href="/sen/Modules/Forum/Forum_main.php">Forum</a></li>
		<li><a href="/sen/Modules/General/Rules_and_regulations_for_general.php">Rules And Regulations</a></li>
		<li><a href="#">Information<span>&#x25BC;</span></a>
			<ul>
					<li><a href="/sen/Modules/General/passport.php">Passport</a></li>
					<li><a href="/sen/Modules/General/Railway_concession.php">Railway Concession</a></li>
					<li><a href="/sen/Modules/General/First_aid_box.php">First Aid Box</a></li>
					<li><a href="/sen/Modules/General/view_artifect_status.php">Artifact Status</a></li>
					<li><a href="/sen/Modules/General/computer_policy.php">Computer Policy</a></li>
					<li><a href="">Facilities</a>
					<ul>
					<li><a href="/sen/Modules/General/General.php">General</a></li>
					<li><a href="/sen/Modules/General/madical.php">Medical</a></li>
					</ul>
					</li>
			</ul>
		</li>
        <li><a href="/sen/modules/Calender/Calender.php" target="_blank">Calender</a></li>
      </ul>
    </nav>
  </div>
  <div id="container" class="clear">
    <!-- content body -->
		<section>
		<?php
		//3/ perform database query


		$result = mysql_query("SELECT * FROM lost_found order by date  DESC,time desc limit 0,30 ",$db);
		if(!$result){
				die("database selection failed:".mysql_error());
			}
		//4. use returned data
		//while($row = mysql_fetch_array($result)){
		//	echo $row["id"]. " ". $row["date"]."". $row["time"]. " ". $row["title"]. "<br/>";

		echo '<table border="1">';
		/*echo "<tr>";
			echo "<td>id</td>";
			echo "<td>Date</td>";
			echo "<td>Time</td>";
			echo "<td>Sentby</td>";
		*/	
		while($row = mysql_fetch_array($result)){
			echo "<tr>";
			if($row["type"]){
				echo "<td> Found</td>";
			}
			else
				echo "<td>Lost</td>";
			echo "<td>" . $row["date"] . "</td>";
			echo "<td>" . $row["time"] . "</td>";
			echo "<td>" . $row["id"] . "</td>";
			echo "<td>" . $row["object_details"] . "</td>";
		}
		echo "</table>"

		?>
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
<?PHP
		function login($username,$password)
		{
			$SQL_Query="select * from login";
			$result_query=mysql_query($SQL_Query);
			
			
			$flag1=1;
			while($out=mysql_fetch_assoc($result_query))
			{
				if($username==$out['login_id'])
				{
					$flag1=0;
					if($password==$out['password'])
					{
						
						echo nl2br("\n");
						echo "hi ";
						echo nl2br("\n");
						session_start();
						$_SESSION['access']=$out['priority'];
						$_SESSION['login_id']=$out['login_id'];
						
						if($out['priority']==6)
						{
							header('location:/sen/Modules/Links_temp/doctor_links_1.php');
						}
						else if($out['priority']==5)
						{
							header('location:/sen/Modules/guard/Gate_guard.php');
						}
						else if($out['priority']==4)
						{
							header('location:/sen/Modules/Links_temp/admin_links_1.php');
						}
						else if($out['priority']==3)
						{
							header('location:/sen/Modules/Links_temp/hmc_convener_links_1.php');
						}
						else if($out['priority']==2)
						{
							header('location:/sen/Modules/Links_temp/hmc_links_1.php');
						}
						else if($out['priority']==1)
						{
							header('location:/sen/Modules/Links_temp/resident_links_1.php');
						}
					}
					else 
					{
						echo "Incorrect Password";
					}
				}
			}
			
			if($flag1==1)
			{
				echo "incorrect username";
			}
			
		}
		function forgot_password($username)
		{	
			$mail = new PHPMailer(); 
			$mail->IsSMTP(); // send via SMTP
			$mail->SMTPAuth = true; // turn on SMTP authentication
			$mail->Username = "daiicthor@gmail.com"; // SMTP username
			$mail->Password = "horofdaiict"; // SMTP password
			$mail->SMTPKeepAlive = true;                  // SMTP connection will not close after each email sent
			$webmaster_email = "da_hostel@daiict.ac.in"; 				//Reply to this email ID
			$webmaster_name="admin";

			$mail->From = $webmaster_email;

			$mail->FromName = $webmaster_name;

			$mail->AddReplyTo($webmaster_email,$webmaster_name);

														
			$mail->IsHTML(true); // send as HTML
			

			$mail->WordWrap = 50; // set word wrap									//only suportsmax 500 users

																					//$mail->AddAttachment("/var/tmp/file.tar.gz"); // attachment

																					//$mail->AddAttachment("/tmp/image.jpg", "new.jpg"); // attachment
			$SQL_Query="select email,password,name from login natural join residents where login_id='$username'";
			$result_query=mysql_query($SQL_Query);
			$out=mysql_fetch_assoc($result_query);
			if($out['email']=="")
			{
				echo "Your Username was not found <br> Non Residents need to contact the Hostel Administrators to reset their passwords";
			}
			else
			{
			
				$password=$out['password'];
				$mail->Subject ='Password of Hostel Management Website at DAIICT' ;
				$mail->Body = "Your Username and Password for HMC Website of DAIICT is <br> Login ID :$username <br>Password: $password "; 										//HTML Body
				$mail->AddAddress($out['email'],$out['name']);
				if(!$mail->Send())
				{
					echo "Mailer Error: " . $mail->ErrorInfo;
				}
				else
				{
					echo "An email has been sent to your registered email id";
				}
			}
}
?>