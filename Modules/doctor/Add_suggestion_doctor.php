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
		<h2 align="center">Add Suggestions</h2><br><br>
		<?PHP
		if(isset($_SESSION['access'])&&($_SESSION['access']=='6'))
		{
			if(isset($_POST['SUBMIT2']))
			{
						header('location:/sen/Modules/Links_temp/doctor_links_1.php');
			}

			if(isset($_POST['SUBMIT1']))
			{

				$suggestion=$_POST['suggestion'];
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				student_entries($suggestion,$_SESSION['login_id']);
				Close_To_Server($db_handle);
			}
		}
		else
		{

			$_SESSION['access']=0;
			session_destroy();
			header('location:/sen/Modules/Login/login.php');
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
		function student_entries($suggestion,$login_id)
		{
				$SQL_Query="select doctor_id from doctor natural join login where login_id='$login_id' ";
				$result=mysql_query($SQL_Query);
				$out=mysql_fetch_assoc($result);
				$doctor_id=$out['doctor_id'];
				$date_time=date('Y-m-d h:i:s ', time());
				$SQL_Query="INSERT INTO doctor_suggestions VALUES ('$doctor_id', '$suggestion','$date_time')";
				$result=mysql_query($SQL_Query);
				if($result==false)
				{
						echo mysql_error();
				}
				else
				{
					echo "Successful";
				}

		}
?>

		<FORM NAME="form2" METHOD="POST" ACTION="Add_suggestion_doctor.php" >
		<table>
		<tr><td>Suggestion: </td><td><INPUT TYPE="TEXT"  NAME="suggestion"></td></tr>
		
		<tr><td><INPUT TYPE="SUBMIT" NAME="SUBMIT1" VALUE="Add Suggestion"></td><td>
		
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