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
        <li><a href="/sen/Modules/Links_temp/hmc_convener_links_1.php">Home</a></li>
        <li><a href="#">ETIC Scheme</a>
		<ul>
			<li><a href="/sen/Modules/hmc_convener/View_etic_hmc_convener.php">View ETIC</a></li>
			<li><a href="/sen/Modules/hmc_convener/Remove_all_etic_hmc_convener.php">Remove all ETIC</a></li>
		</ul>
		</li>
        <li><a href="/sen/Modules/Forum/Forum_main.php" target="_blank">Forum</a></li>
		<li><a href="/sen/Modules/Rules_regulations.pdf" target="_blank">Rules And Regulations</a></li>
		<li><a href="#">Artifacts</a>
		<ul>
			<li><a href="/sen/Modules/hmc_convener/Add_artifact_hmc_convener.php">Add Artifact</a></li>
			<li><a href="/sen/Modules/hmc_convener/Change_artifact_hmc_convener.php">Change Artifact</a></li>
		</ul>
		</li>
		<li><a href="#">Complaints<span>&#x25BC;</span></a>
			<ul>
					<li><a href="/sen/Modules/complaints/Complaint_general_hmc_convener_view.php">General</a></li>
					<li><a href="/sen/Modules/complaints/Complaint_water_hmc_convener_view.php">Water</a></li>
					<li><a href="/sen/Modules/complaints/Complaint_electrical_hmc_convener_view.php">Electrical</a></li>
					<li><a href="/sen/Modules/complaints/Complaint_furniture_hmc_convener_view.php">Furntiture</a></li>
			</ul>
		</li>
        <li><a href="/sen/Modules/Calender/Calender.php" target="_blank">Calender</a></li>
		<li><a href="/sen/Modules/hmc_convener/Change_password_hmc_convener.php">Change Password</a></li>
      </ul>
    </nav>
  </div>
  <div id="container" class="clear">
    <!-- content body -->
		<section align="center">
		<h2 align="center">Add Artifact</h2><br><br>
			<?PHP
		if(isset($_SESSION['access'])&&($_SESSION['access']=='3'))
		{
			if(isset($_POST['SUBMIT2']))
			{
						header('location:/sen/Modules/Links_temp/hmc_convener_links_1.php');
			}
				
			if(isset($_POST['SUBMIT1']))
			{
			
				$name=$_POST['name'];
				$location=$_POST['location'];
				$resident_id=$_POST['resident_id'];
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				add_artifact($resident_id,$name,$location);
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
		function add_artifact($resident_id,$name,$location)
		{
				$SQL_Query="INSERT INTO activities (resident_id,location,Name) VALUES('$resident_id','$location','$name')";
				$result=mysql_query($SQL_Query);
				if($result==false)
				{
						if(mysql_errno()==1452)
							echo "There is No Resident with the given id";
				}
				else
				{
					echo "Successful";
				}
			
		}
?>		
		<FORM NAME="form2" METHOD="POST" ACTION="Add_artifact_hmc_convener.php" >
		<table>
		<tr><td>Name : </td><td><INPUT TYPE="TEXT" NAME="name"></td></tr>
		
		<tr><td>Location : </td><td><INPUT TYPE="TEXT"  NAME="location"></td></tr>
		
		<tr><td>ID Of the resident who has the Artifact : </td><td><INPUT TYPE="TEXT"  NAME="resident_id"></td></tr>
		
		<tr><td><INPUT TYPE="SUBMIT" NAME="SUBMIT1" VALUE="REGISTER"></td><td>
		
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