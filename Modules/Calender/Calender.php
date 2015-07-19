<!DOCTYPE html>
<?PHP
require_once('db.php');
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
		<iframe src="https://www.google.com/calendar/embed?src=sbg20122013%40gmail.com&ctz=Asia/Calcutta" style="border: 0" width="960" height="600" frameborder="0" scrolling="no"></iframe>
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