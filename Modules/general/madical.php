<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<title>Welcome to DA-IICT Hostel Website</title>
<meta charset="iso-8859-1">
<link rel="stylesheet" href="/sen/Modules/Login/styles/layout.css" type="text/css">
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
		<br>
		<section>
		<h2>Madical Facilities </h2>
        <br>
        
        <br>
        <table class="contentpaneopen">



<tr>
<td valign="top">
<p>1. The Institute has a Medical Centre. Two visiting doctors visit
the centre every day and the students can consult them without any
charge. The contact addresses/ numbers of the doctors are as under:</p><p><br />
<span></span></p>
<table style="border: 1px solid rgb(68, 68, 68); border-collapse: collapse;" border="1" cellpadding="3" cellspacing="0">
<tbody><tr>
<td style="width: 166px;" valign="top"><b>Name</b></td>
<td style="width: 197px;" valign="top"><b>Visiting Hours at Medical Centre</b></td>
<td style="width: 197px;" valign="top"><b>Residence Address &<br />
Tel No.</b></td>
</tr>
<tr>
<td style="width: 166px;" valign="top">Dr. Suresh Shah</td>
<td style="width: 197px;" valign="top">16.15 to 17.45<br />
(Extn # 593)</td>
<td style="width: 197px;" valign="top">Plot No. 800, Sector 21<br />
Gandhinagar<br />
Tel.: 2322 1115</td>
</tr>
<tr>
<td style="width: 166px;" valign="top">Dr. (Mrs). Anjana Ved</td>
<td style="width: 197px;" valign="top">12.30 to 13.30<br />
(Extn # 593)</td>
<td style="width: 197px;" valign="top">Abhinav Nursing Home<br />
Behind Dena Bank, Sector 16<br />
Gandhinagar<br />
Tel.: 2322 2865</td>
</tr>
</tbody></table>
<p><span><span><span><br /></span></span></span></p><p><span><span><span>2. The Institute has a Panel of Medical Specialists, whose details are given below.</span></span></span></p><p><br /><span><span><span>
<span></span></span></span></span></p>
<table style="border: 1px solid rgb(68, 68, 68); border-collapse: collapse;" border="1" cellpadding="5" cellspacing="0">
<tbody><tr>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top"><b>S. No.</b></td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top"><b>Name of the Doctor</b></td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top"><b>Specialisation</b></td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top"><b>Clinic Phone No.</b></td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top"><b>Res Phone No.</b></td>
</tr>
<tr>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">1</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">P. S. Patel</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">General Physician</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">23226214</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">23226214</td>
</tr>
<tr>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">2</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">Rajendra Anand</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">Psychiatrist</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">23238853</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">23224220</td>
</tr>
<tr>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">3</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">Asim Shah</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">Radiologist & Sonologist</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">23229224</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">23229224</td>
</tr>
<tr>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">4</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">Mahendra L Gajjar</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">Pathology Lab</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">23222474</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">23222952</td>
</tr>
<tr>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">5</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">Mukul Pandit</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">Orthopaedic Surgeon</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">23224565</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">23221757</td>
</tr>
<tr>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">6</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">Haresh Thekdi</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">Physician</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">23220838</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">23223418</td>
</tr>
<tr>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">7</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">Y Chhantbar</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">ENT Surgeon</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">23222444</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">23221731</td>
</tr>
<tr>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">8</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">Darshan Pandya</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">Physician</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">23224610</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">23232307</td>
</tr>
<tr>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">9</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">A Parimal</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">Eye Surgeon</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">23229563</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">23229947</td>
</tr>
<tr>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">10</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">Mira N Butani</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">Gynaecologist</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">23222197</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">23222196</td>
</tr>
<tr>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">11</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">Sanjiv B Shah</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">Dentist</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">23221647</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">23225377</td>
</tr>
<tr>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">12</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">Girdharilal Kaw</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">General Surgeon</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">23238865</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">23229871</td>
</tr>
<tr>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">13</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">J. G. Tatu</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">General Surgeon</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">23221239</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">23221634</td>
</tr>
<tr>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">14</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">Trupti Dhrangadhria</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">Dermatologist</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">23226968</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">23224042</td>
</tr>
<tr><td scope="scope" style="style" dir="dir" colspan="1" align="left" lang="lang" valign="top">15</td><td scope="scope" style="style" dir="dir" colspan="1" align="left" lang="lang" valign="top"> Jayesh Shah<br /></td><td scope="scope" style="style" dir="dir" colspan="1" align="left" lang="lang" valign="top"> </td><td scope="scope" style="style" dir="dir" colspan="1" align="left" lang="lang" valign="top"> 23220828</td><td scope="scope" style="style" dir="dir" colspan="1" align="left" lang="lang" valign="top"> </td></tr></tbody></table>
<p><span><span><br /></span></span></p><p><span><span>3. DA-IICT has signed agreements with Apollo Hospital
and SAL Hospital also. They admit our students without advance deposit
and charge on concessional rates. Addresses and Emergency Telephone
numbers of these two hospitals are given below.)</span></span></p>
<ul><li>Apollo Hospitals Emergency Tel. No. <font color="#ff0000">55231066</font><br />
Plot No. 1A, 55701800<br />
Bhat GIDC Estate, Gandhinagar</li><li>S.A.L. Hospital & Medical Institute Emergency Tel. No. 26845600<br />
Opp. Doordarshan<br />
Drive-In Road<br />
Ahmedabad 380 054</li></ul>
<p>4. Students have been covered under the Group Mediclaim Insurance
Policy and Personal Accident Insurance Policy. The coverages are as
under:</p>
<blockquote><p>a) Mediclaim Insurance : Rs. 15,000 per student<br />
b) Personal Accident Ins. : Rs. 50,000 per student</p></blockquote>
<p>The cashless transaction facility under the mediclaim insurance
scheme has also been provided to the students. The identity cards for
this purpose have been issued to the students. Students’ medical insurance is relevant only for hospitalization, and not
for OPD bills. Accident reimbursement is
available only for disabling conditions.</p><p><br /></p>
<p><span>5. A Stress Management Centre is also operational at the
Institute. Students get counselled here free of charge. The details are
as under.</span></p><p><br /><span>
<span></span></span></p>

<table style="border: 1px solid rgb(68, 68, 68); border-collapse: collapse;" align="left" border="1" cellpadding="5" cellspacing="0"><tbody><tr>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top"><b>Counsellors</b></td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top"><b>Day & Time</b></td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top"><b>Venue</b></td>
</tr>
<tr>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">1. Dr Gaurang Thanki<br />
Ph 079-55728904<br /><br />
</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">Saturday<br />
15.00 hrs to 17.00 hrs</td>
<td scope="scope" dir="dir" style="style" align="left" lang="lang" valign="top">Room No 4110 & 4111<br />
Faculty Block 4</td></tr><tr><td colspan="1">2. Ms. Darshna Patel<br />
Ph. 079-27503244</td><td colspan="1"> </td><td colspan="1"> </td></tr></tbody></table><br /><br />

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