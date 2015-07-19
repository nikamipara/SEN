<?PHP
session_start();
require_once('db.php');
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
        <li><a href="#">Home</a></li>
        <li><a href="#">Lost & Found</a></li>
        <li><a href="#">Snail Mail</a></li>
        <li><a href="#">ETIC Scheme</a></li>
		<li><a href="#">Forum</a></li>
		<li><a href="/sen/Modules/Rules_Regulations.pdf" target="_blank">Rules And Regulations</a></li>
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
		<section>
		<?php
	
	$admin=0;
	if(isset($_SESSION['access'])&& ($_SESSION['access']==4))
	{
	$admin=1;
	 }
	
	 
	
		require_once("config.php");
		$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
		
		if(!$link)
		 {
			die('Failed to connect to server: ' . mysql_error());
		}
		
		$db = mysql_select_db(DB_DATABASE);
		if(!$db) {
			die("Unable to select database");
		}
		
		$qry = "SELECT * FROM forum ";
		$result = mysql_query($qry);
		$countrow=0;
		if($result)
		{	if($admin==1)
				{
					echo "<form action='deleteprocess2.php' method='post'>";
					echo "<input type='hidden' name='lallan' value='top'>";
				}
			
				
				
					
			echo "<table cellspacing='0' class='forumpost' width='800px'>";
			echo"<tbody>";
			
			while($post = mysql_fetch_array($result))
			{	$countrow=$countrow+1;
				echo"<tr class='header'>";
				if($admin==1)
				{
				echo "<td class='picture left'>";
				echo "<input type='checkbox' name='formDoor[]' value='$post[forum_id]'/>";
				echo"</td>";
				}
				echo"<td class='topic starter'>";
				echo "<div class='subject'>".$post['subject']."</div><div class='author'>by".$post['name']."-". $post['date'].",".$post['time']."</div></td></tr>";
				echo "<tr>";
					if($admin==1)
				{
				echo"<td class='left side'>&nbsp;</td>";
				}
				echo"<td class='content'>";
				echo"<div class='posting'>".$post['post']."</div></td></tr>";
				 
				
				
			}
			echo"</tbody>";
			echo "</table>";
			if($countrow==0)echo "database empty...";
		}
		else
		{
			echo "error";
		}
	
	 
			
	if($admin==1 && $countrow!=0)
				{ echo "<center><input type='submit' value='delete'><center></form>";}
				
			
	 ?>
		<form action="postprocess2.php" method="post">
		<center>
        <table>
       
         <tr>
        	<td> Name</td><td><input type="text" name="name" ></td>
			</tr>
             <tr>
			<td>	Subject</td><td><input type="text" name="subject"></td>
		</tr>
             <tr>
			<td> Post</td><td> <textarea rows="4" cols="23" name="post"></textarea></td>
			</tr>
            <?php echo "<input type='hidden' name='lallan' value='top'>";
			?>
            <tr>
		   <td> <input type="submit" value='post'></td>
			</tr>
            </center>
            
            </table>
             </form>
		
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