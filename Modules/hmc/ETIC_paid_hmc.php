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
        <li><a href="/sen/Modules/Links_temp/hmc_links_1.php">Home</a></li>
        <li><a href="/sen/Modules/hmc/ETIC_paid_hmc.php">ETIC Scheme</a></li>
        <li><a href="/sen/Modules/Forum/Forum_main.php">Forum</a></li>
		<li><a href="/sen/Modules/Rules_regulations.pdf" target="_blank">Rules And Regulations</a></li>
		<li><a href="#">Complaints<span>&#x25BC;</span></a>
			<ul>
					<li><a href="/sen/Modules/complaints/Complaint_general_hmc_view.php">General</a></li>
					<li><a href="/sen/Modules/complaints/Complaint_water_hmc_view.php">Water</a></li>
					<li><a href="/sen/Modules/complaints/Complaint_electrical_hmc_view.php">Electrical</a></li>
					<li><a href="/sen/Modules/complaints/Complaint_furniture_hmc_view.php">Furntiture</a></li>
			</ul>
		</li>
        <li><a href="/sen/Modules/Calender/Calender.php" target="_blank">Calender</a></li>
		<li><a href="/sen/Modules/hmc/Change_password_hmc.php">Change Password</a></li>
      </ul>
    </nav>
  </div>
  <div id="container" class="clear">
    <!-- content body -->
		<section align="center">
		<h2 align="center">ETIC Payment Table</h2><br>
		<?PHP
		if(isset($_SESSION['access'])&&($_SESSION['access']=='2'))
		{
			if(isset($_POST['SUBMIT2']))
			{
						header('location:ETIC_paid_hmc.php');
			}
				
			if(isset($_POST['SUBMIT1']))
			{
			    $db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				$id_sub=$_POST['id_sub'];
				$id_hmc=$_SESSION['login_id'];
				ETIC_update_paid($id_sub,$id_hmc);
				Close_To_Server($db_handle);
			}
		}
		else 
		{
			$_SESSION['access']=0;
			session_destroy();
			header('location:/sen/Modules/login/login.php');
			echo "invalid Login";
		}
		
		$db_handle=Connect_To_Server();
		$db_found=Connect_To_DB();
		$SQL_Query="select * from ETIC ";
		$result=mysql_query($SQL_Query);
		echo "<table border='1'>";
		echo"<tr><td>Resident ID</td><td>Newspaper Name</td><td>Paid</td><td> set </td></tr>";
		echo"<FORM NAME='form1' METHOD='POST' ACTION='ETIC_paid_hmc.php' >";
		while($out=mysql_fetch_assoc($result))
		{
				$id=$out['id'];
				$newspaper=$out['newpaper'];
				$paid=$out['paid'];
				echo "<tr><td>$id</td><td>$newspaper</td><td>$paid</td>";
				echo "<td><INPUT TYPE='RADIO' NAME='id_sub' value=$id checked='checked'></td></tr>";
				
		}
		echo"</table><br><br>";
		echo "<INPUT TYPE='SUBMIT' NAME='SUBMIT1' VALUE='Paid'>";
		echo"</form>";
		
		Close_To_Server($db_handle);
		
?>	<?PHP
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
		function ETIC_update_paid($id_sub,$id_hmc)
		{
				$id=$_SESSION['login_id'];
				$SQL_Query="update ETIC set paid ='y',Payment_recv_from='$id_hmc' where id='$id_sub'";
				$result=mysql_query($SQL_Query);
				if($result==false)
				{
						echo mysql_error();
				}
				else 
				{
						print "successful";
				}
		
		}
?>
	<FORM NAME="form1" METHOD="POST" ACTION="ETIC_paid_hmc.php" >
		<INPUT TYPE="SUBMIT" NAME="SUBMIT2" VALUE="Go Back">
	</FORM>	
		
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