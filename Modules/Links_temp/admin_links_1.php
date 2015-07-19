<!DOCTYPE html>
<?php

		
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
		<li><a href="/sen/Modules/admin/Change_password_admin.php">Change Password</a></li>
      </ul>
    </nav>
  </div>
  <div id="container" class="clear">
    <!-- content body -->
		<p>
		<br><br><br>
		<section>
		<h2>Welcome</h2><br>
		
		There are two Halls of Residence, namely, Hall of Residence Men and Hall of Residence Women.<br><br>
		Prof. Binita Desai and Prof. Asim Banerjee are the wardens of HOR-Ladies and HOR-Men, respectively. Prof. P.M. Jat is the Associate Warden for HOR-Men.  Mr. Jitendra Parmar is the supervisor for both HORs.<br><br>

		The HOR-Men has 8 wings and each wing has about 60 rooms.  These wings are called as A, B, C, D, E, F, G and H wings.   In total about 900 students can stay; two boys per room.  One room is reserved for guests.<br><br>

		The HOR-Women has 2 wings, called as J and K wings,  and each wing has about 60 rooms; two girls per room.<br><br>
	
		Only for medical emergencies, the guestroom will be available in both the HORs.<br><br>
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