<?php

// lf delete for admin

session_start();
if(!isset($_SESSION['access']) or $_SESSION['access']!= 4)
{   
	$_SESSION['access']=0;
	session_destroy();
	header('location:/sen/Modules/Login/login.php');
}

require_once ('db.php');
$db=Connect_To_Server();
$db_found=Connect_To_DB();
  $ty = "Furniture";
	

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
	<h2 align="center">View/Delete Furniture Complaints</h2><br><br><br>
    <!-- content body -->
		<section align="center">
			<?php
			//3/ perform database query
			// for deleteing complaints.........................................................
			if(isset($_POST['SUBMITDEL']))
	
			{
				$cid = $_POST['delete_radio'];
				$row1;
				//$temp = $_POST['r'];// this is to get  u want to delete or make it servidced.......
				
				$result1 = mysql_query(" delete from complaints where complaints_id = $cid  ",$db);
					if($result1){
						/*echo "<script type='text/javascript'> alert('complain deleted successfully')
						</script>";*/
						echo "<h1>complain deleted successfully</h1>";
						//sleep(10);
						//header('location:/sen/complaints/cadmin.php');
					}
					else{
					
						echo "<h1>error try again</h1>";
					}
			}
			else if(isset($_POST['SUBMITTIC']))
	
			{			
				$cid = $_POST['delete_radio'];
		
				
				$result3 = mysql_query("SELECT serviced FROM complaints where complaints_id=$cid ",$db);
				if(!$result3){
					die("database selection failed:".mysql_error());
				}
				$row1 = mysql_fetch_array($result3);
				if($row1['serviced']==true){ echo "Complaint is serviced already";}
				else{
					//print_r($row1);
					$result1 = mysql_query(" update complaints set serviced_date = NOW(),serviced_time=NOW(),serviced= true where complaints_id = $cid  ",$db);
					
					if($result1){
					
						echo "Complaint updated successfully";
						
					
					}
					else{
					
						echo "<h1>error try again</h1>";
					}
				}
}


			
			
			
			$result = mysql_query("SELECT t1.*,t2.wing,t2.floor,t2.room FROM complaints AS t1 JOIN residents AS t2 ON t1.id = t2.login_id where Type = '$ty' order by serviced ",$db);
			if(!$result){
					die("database selection failed:".mysql_error());
				}
			//4. use returned data
			//while($row = mysql_fetch_array($result)){
			//	echo $row["snail_mail_id"]. " ". $row["date"]."". $row["time"]. " ". $row["sentby"]."<br/>";
			echo "<form action='Complaint_admin_furniture_view.php' method='post'>";
			echo '<table align="center">';
			echo "<tr>";
				echo "<td>Complaint_id</td>";
				echo "<td>ID</td>";
				echo "<td>Type</td>";
				echo "<td>Posting Date</td>";
				echo "<td>Posting Time</td>";
				echo "<td>Serviced Date</td>";
				echo "<td>Serviced Time</td>";
				echo "<td>Descrption</td>";
				echo "<td>Wing</td>";
				echo "<td>Room</td>";
				
			while($row = mysql_fetch_array($result)){
				$temp = $row["complaints_id"];
				echo "<tr>";
				echo "<td>" . $row["complaints_id"] . "</td>";
				echo "<td>" . $row["id"] . "</td>";
				echo "<td>" . $row["Type"] . "</td>";
				echo "<td>" . $row["posting_date"] . "</td>";
				echo "<td>" . $row["posting_time"] . "</td>";
				echo "<td>" . $row["serviced_date"] . "</td>";
				echo "<td>" . $row["serviced_time"] . "</td>";
				echo "<td>" . $row["description"] . "</td>";
				echo "<td>" . $row["wing"] . "</td>";
				echo "<td>" . $row["floor"] . "</td>";
				echo "<td> <input type='radio' name=delete_radio value='$temp'> </td>";
			}
			echo "</table>";

			?>
			<br><br>
			<input type="submit" name="SUBMITDEL" value="Delete"/>
			<input type="submit" name="SUBMITTIC" value="Tick Serviced"/>

			</form>
		
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