<!DOCTYPE html>
<?php
//for admin refers smrec1.php  and get inputs form smrecform
require_once ('db.php');

session_start();
if(!isset($_SESSION['access']) or $_SESSION['access']!= 4)
{   
	$_SESSION['access']=0;
	session_destroy();
	header('location:/sen/Modules/Login/login.php');
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
	<h2 align="center">Snail Mail</h2><br><br>
	<section align="center">
		<?PHP
			$db=Connect_To_Server();
			$db_found=Connect_To_DB();

			if(isset($_POST['SUBMIT20']))
				{
					if(!isset($_POST['received_radio'])){
						echo "You have not selected any Entries!!";
					}
					$smid1= $_POST['received_radio'];
					



					$query1= "UPDATE `snail_mail` SET `received_status`= true WHERE snail_mail_id = $smid1  ";
					//$query1="INSERT INTO `snail_mail`(`date`, `time`, `id`, `sentby`) VALUES (2013-03-27 , '06:50:50' , '201001199' ,'spped postr') ";
					
					$result = mysql_query($query1);
							if($result==false)
							{
									echo 'some thing went wrong !!!!!!!!'. mysql_error();
							}
							else
							{	
								echo 'snail mail Received update added successfully for '. $smid1;
							}

				}

/// this page is for getting  snail mail at admin ......................................................
 //by nikunj amipara,
		
		?>
		<?php
			//3/ perform database query
			//user name wwhich has to be fatched from session array
			$userid = $_POST['id'];


			//temp assignment of userid need to be removed when assembled
			//$userid="201001199" ;

			$result = mysql_query("SELECT * FROM snail_mail where id= $userid and received_status = false",$db);
			if(!$result){
					die("database selection failed:".mysql_error());
				}
			echo "<form action='Snail_mail_admin_after_update_update.php' method='post'>";
			//4. use returned data
			echo '<table border="1">';
			echo "<tr>";
				echo "<td>snail_mail_id</td>";
				echo "<td>date</td>";
				echo "<td>time</td>";
				echo "<td>sentby</td>";
				
			while($row = mysql_fetch_array($result)){
				$temp = $row["snail_mail_id"] ;
				echo "<tr>";
				echo "<td>" . $row["snail_mail_id"] . "</td>";
				echo "<td>" . $row["date"] . "</td>";
				echo "<td>" . $row["time"] . "</td>";
				echo "<td>" . $row["sentby"] ."</td>";
				echo "<td> <input type='radio' name=received_radio checked = 'checked' value='$temp'> </td>";
				
				
				
				
				
				echo "</tr>";

			}
			echo "</table>";
			echo '<br/>';
			echo "<input type='submit' name='SUBMIT20' value='Received'>";
			echo"</form>";

			// this is  how admin can update status of snamil mail.

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
<?php
//5. close connection

mysql_close($db);


?>