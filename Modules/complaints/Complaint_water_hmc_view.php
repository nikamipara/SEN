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
		<section>
		
		<?php

		// lf view for hmc floor

		if(!isset($_SESSION['access']) or $_SESSION['access']!= 2)
		{   
			$_SESSION['access']=0;
			session_destroy();
			header('location:/sen/Modules/Login/login.php');
		}

		require_once ('db.php');
		$db=Connect_To_Server();
		$db_found=Connect_To_DB();
		/// this page is for Deleting GENERAL complaints at user side.......................................................
		 //by nikunj amipara,
		  $ty = "Water";
			

		?>
		<?php
//3/ perform database query
// for deleteing complaints.........................................................

			//$hmcid = 'hmcg2';
			$hmcid= $_SESSION['login_id'];
			$result1 = mysql_query("SELECT * FROM hmc where login_id = '$hmcid'",$db);
			 "result".$result1;
			$row1 = mysql_fetch_array($result1);
			
			 "wing".$wing = $row1['wing'];
			 "floor".$floor = $row1['floor'];
						
			$result = mysql_query("SELECT t1.* FROM complaints AS t1 JOIN residents AS t2 ON t1.id = t2.login_id where Type = '$ty' and  t2.floor='$floor' and t2.wing = '$wing'  order by serviced ",$db);
			if(!$result){
					die("database selection failed:".mysql_error());
				}
			//4. use returned data
			//while($row = mysql_fetch_array($result)){
			//	echo $row["snail_mail_id"]. " ". $row["date"]."". $row["time"]. " ". $row["sentby"]."<br/>";
			echo '<table border="1">';
			echo "<tr>";
				echo "<td>Complaint_id</td>";
				echo "<td>ID</td>";
				echo "<td>Type</td>";
				echo "<td>Posting Date</td>";
				echo "<td>Posting Time</td>";
				echo "<td>Serviced Date</td>";
				echo "<td>Serviced Time</td>";
				echo "<td>Descrption</td>";
				
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
				
			}
			echo "</table>";

			?>
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
<?php
//5. close connection

Close_To_Server($db);


?>