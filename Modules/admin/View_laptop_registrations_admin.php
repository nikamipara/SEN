<!DOCTYPE html>
<?PHP
  	session_start();
		if(isset($_SESSION['access'])&&($_SESSION['access']=='4'))
		{
			if(isset($_POST['SUBMIT2']))
			{
						header('location:Laptop_settings_admin.php');
			}
			
			if(isset($_POST['SUBMIT4']))
			{
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				view_laptop_details();
				Close_To_Server($db_handle);
			}	
			if(isset($_POST['SUBMIT3']))
			{
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				$id=$_POST['id'];
				view_laptop_details_by_id($id);
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

?>
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
	
  </div>
  <div id="menu_bar">
	<nav>
      <ul>
        <li><a href="/sen/Modules/Links_temp/admin_links_1.php">Home</a></li>
        <li><a href="/sen/Modules/lost and found/LF_admin_main.php">Lost & Found</a></li>
        <li><a href="/sen/Modules/snail mail/Snail_mail_admin_main.php">Snail Mail</a></li>
		<li><a href="/sen/Modules/Forum/Forum_main.php" target="_blank">Forum</a></li>
		<li><a href="/sen/Modules/Rules_regulations.pdf" target="_blank">Rules And Regulations</a></li>
		<li><a href="#">Complaints<span>&#x25BC;</span></a>
			<ul>
					<li><a href="/sen/Modules/complaints/Complaint_admin_general_view.php">General</a></li>
					<li><a href="/sen/Modules/complaints/Complaint_admin_water_view.php">Water</a></li>
					<li><a href="/sen/Modules/complaints/Complaint_admin_electrical_view.php">Electrical</a></li>
					<li><a href="/sen/Modules/complaints/Complaint_admin_furniture_view.php">Furntiture</a></li>
			</ul>
		</li>
        <li><a href="/sen/Modules/Calender/Calender.php" target="_blank">Calender</a></li>
		<li><a href="/sen/Modules/mail/Mail_main.php">Group Mail</a></li>
		<li><a href="#">Settings<span>&#x25BC;</span></a>
		<ul>
					<li><a href="/sen/Modules/admin/Register_new_admin.php">Admin</a></li>
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
		<section>
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
		function view_laptop_details()
		{
				$SQL_Query="select name,name_of_manufacturer,invoice_number,resident_id,present_status from laptop_registration join residents on laptop_registration.resident_id=residents.id order by resident_id";
				$result=mysql_query($SQL_Query);
				if($result==false)
				{
						echo mysql_error();
				}
				else
				{
						echo "<table border='1'>";
						echo"<tr><td>Resident ID</td><td>Name</td><td>Invoice Number</td><td>Present Status </td><td>Name Of manufacturer</td>";
						while($out=mysql_fetch_assoc($result))
						{
							$name=$out['name'];
							$nom=$out['name_of_manufacturer'];
							$inv_no=$out['invoice_number'];
							$id=$out['resident_id'];
							$ps=$out['present_status'];
							echo "<tr><td>$id</td><td>$name</td><td>$inv_no</td><td>$ps</td><td>$nom</td>";
						}
						echo"</table>";
				}

		}
		function view_laptop_details_by_id($id)
		{
				$SQL_Query="select name,name_of_manufacturer,invoice_number,resident_id,present_status from laptop_registration join residents on laptop_registration.resident_id=residents.id where resident_id='$id' order by resident_id";
				$result=mysql_query($SQL_Query);
				if($result==false)
				{
						echo mysql_error();
				}
				else
				{
						echo "<table border='1'>";
						echo"<tr><td>Resident ID</td><td>Name</td><td>Invoice Number</td><td>Present Status </td><td>Name Of manufacturer</td>";
						while($out=mysql_fetch_assoc($result))
						{
							$name=$out['name'];
							$nom=$out['name_of_manufacturer'];
							$inv_no=$out['invoice_number'];
							$id=$out['resident_id'];
							$ps=$out['present_status'];
							echo "<tr><td>$id</td><td>$name</td><td>$inv_no</td><td>$ps</td><td>$nom</td>";
						}
						echo"</table>";
				}

		}
				
?>	
		<h2 align="center">View Laptop Registrations</h2><br><br>
		<FORM NAME="form2" METHOD="POST" ACTION="View_laptop_registrations_admin.php" >
		<table>
		<tr><td>ID: </td></tr>
		<tr><td><INPUT TYPE="TEXT" NAME="id"></td></tr>
		<tr><td><INPUT TYPE="SUBMIT" NAME="SUBMIT4" VALUE="View All"></td></tr>
		<tr><td><INPUT TYPE="SUBMIT" NAME="SUBMIT3" VALUE="View by ID"></td></tr>
		<tr><td><INPUT TYPE="SUBMIT" NAME="SUBMIT2" VALUE="Go Back"></td></tr>
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