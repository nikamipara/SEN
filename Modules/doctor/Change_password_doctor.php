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
        <li><a href="/sen/Modules/Links_temp/doctor_links_1.php">Home</a></li>
        <li><a href="/sen/Modules/doctor/Student_entries_doctor.php">Student Entries</a></li>
        <li><a href="/sen/Modules/Forum/Forum_main.php" target="_blank">Forum</a></li>
		<li><a href="/sen/Modules/Rules_regulations.pdf" target="_blank">Rules And Regulations</a></li>
		<li><a href="/sen/Modules/doctor/Add_suggestion_doctor.php">Suggestions</a></li>
		<li><a href="/sen/Modules/Calender/Calender.php" target="_blank">Calender</a></li>
		<li><a href="/sen/Modules/doctor/Change_password_doctor.php">Change Password</a></li>
		</ul>
    </nav>
  </div>
  <div id="container" class="clear">
    <!-- content body -->
		<section align="center">
		<h2 align="center">Change Password</h2><br>
		<?PHP
		if(isset($_SESSION['access'])&&($_SESSION['access']=='6'))
		{
			if(isset($_POST['SUBMIT2']))
			{
						header('location:/sen/Modules/Links_temp/doctor_links_1.php');
			}
				
			if(isset($_POST['SUBMIT1']))
			{
				$id=$_POST['login_id'];
				if($id!=$_SESSION['login_id'])
				{
						print "You are only allowed to change your own password";
				}
				else
				{
						$oldpassword=$_POST['opassword'];
						$newpassword=$_POST['npassword'];
						$renewpassword=$_POST['renpassword'];
						if($newpassword!=$renewpassword)
						{
								print "The retyped and new password do not match";
						}
						else
						{
							$db_handle=Connect_To_Server();
							$db_found=Connect_To_DB();
							change_password($id,$oldpassword,$newpassword);
							Close_To_Server($db_handle);
						}
				}
			}
		}
		else 
		{
			$_SESSION['access']=0;
			session_destroy();
			header('location:/sen/Modules/login/login.php');
			echo "invalid Login";
		}
		
?>
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
		function change_password($login_id,$oldpassword,$newpassword)
		{
				$id=$_SESSION['login_id'];
				$SQL_Query="select * from login where login_id='$login_id' and password='$oldpassword'";
				$result=mysql_query($SQL_Query);
				if($result==false)
				{
					echo mysql_error();
				}
				else 
				{
						
						if(mysql_fetch_assoc($result)==null)
						{
								print "incorrect username and password";
						}
						else 
						{
								$SQL_Query="update login set password='$newpassword' where login_id='$login_id' and password='$oldpassword'"; 
								$result=mysql_query($SQL_Query);								
								if($result==false)
								{
										print mysql_error();
								}
								else
								{
										print "successful";
								}
						}
						
				}
		
		}
?>
		<br><br>
		<FORM NAME="form1" METHOD="POST" ACTION="Change_password_doctor.php" >
		<table>
		<tr><td>Login ID :</td><td><Input Type="text" name="login_id"></td></tr>
		
		<tr><td>Old Password :</td><td><Input Type="password" name="opassword"></td></tr>
		
		<tr><td>New Password :</td><td><Input Type="password" name="npassword"></td></tr>
		
		<tr><td>Repeat Password :</td><td><Input Type="password" name="renpassword"></td></tr>
		
		<tr><td><INPUT TYPE="SUBMIT" NAME="SUBMIT1" VALUE="Change Password"></td><td>
		
		<INPUT TYPE="SUBMIT" NAME="SUBMIT2" VALUE="Go Back"></td></tr>
		</table>
		</FORM>	
		
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