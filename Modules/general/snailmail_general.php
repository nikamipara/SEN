<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<title>Welcome to DA-IICT Hostel Website</title>
<meta charset="iso-8859-1">
<link rel="stylesheet" href="/sen/Modules/Login/styles/layout.css" type="text/css">
<script src="../Login/jquery.js"></script>
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
      <img src="../Login/images/demo/logo.png"></img>
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
							
							require("../Login/phpmailer/class.phpmailer.php");
							require("../Login/phpmailer/class.smtp.php");
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
		//require_once('db.php');
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
		<p>
		<br><br><br>
		<section>
		<h2>Policy for Snail Mail</h2><br>
		

                <table class="contentpaneopen">
                
                
                
                <tr>
                <td valign="top">
                <div align="right">June 1, 2007<br /></div>Dear Residents,<br /><br />In the recent past, there have been complaints from some residents of missing couriers.&nbsp; To avoid this type of&nbsp; unwanted&nbsp; incidents, we are making the following change in the procedure of delivering couriers.&nbsp; This procedure will be in place from June 4, 2007 until further notice.<br /><ul><li>All couriers of the residents will be delivered directly to the hostel supervisor by the courier agents from 9:00hrs to 13:00hrs and from 14:00hrs to 18:00hrs on all working days.</li><li>As and when the courier comes, the hostel supervisor will make an entry in an form which contain details for currier and received date of it..</li><li>The hostel supervisor will upload the information to website around 17:00hrs everyday at the hostel website and the residents should collect their mails from the next day onwards.&nbsp; The time to collect your mails and policy for trashing of old mails will be as per the previous policy.</li><li>When a student comes to collect the courier, he will be asked to enter the necessary details in a register which will be kept in the hostel supervisor's office.</li><li>Couriers of HOR-Women residents will be forwarded by the supervisor around 17:00hrs on all working days to the lady guard of HOR-Women.</li><li>During 18:00hrs to 9:00hrs (evening to next day morning on working days), weekends and holidays, the couriers will not be collected and the courier agents' staff will be asked to come on a working day.<br /></li></ul>Your suggestions to improve this procedure are most welcome.<br /><br />Warden
                
                </td>
                </tr>
                
                </table>
		</section>
		</p>
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
		function Connect_TO_Server()
		{
			$usernamedb="root";
			$passworddb="";
			$server=$_SERVER['SERVER_ADDR'];
			$db_handle=mysql_connect($server,$usernamedb,$passworddb);
			return $db_handle; 
		}
		function Connect_TO_DB()
		{
			$database="sen";
			$db_found = mysql_select_db($database);
			if(!$db_found)
			{
				print "error in connection to database";
			}
			echo nl2br("\n");
		}
		function Close_To_Server($db_handle)
		{
			mysql_close($db_handle);
		}
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
							header('location:/sen/Modules/Links_temp/doctor_links.php');
						}
						else if($out['priority']==5)
						{
							header('location:/sen/Modules/Links_temp/guard_links.php');
						}
						else if($out['priority']==4)
						{
							header('location:/sen/Modules/Links_temp/admin_links_1.php');
						}
						else if($out['priority']==3)
						{
							header('location:/sen/Modules/Links_temp/hmc_convener_links.php');
						}
						else if($out['priority']==2)
						{
							header('location:/sen/Modules/Links_temp/hmc_links.php');
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