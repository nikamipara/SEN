<!DOCTYPE html>
<?PHP
		session_start();
		if(isset($_SESSION['access'])&&($_SESSION['access']=='5'))
		{
			if(isset($_POST['SUBMIT7']))
				{
							header('location:/sen/Modules/guard/Gate_guard.php');
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
        <li><a href="/sen/Modules/guard/Gate_guard.php">Gate</a></li>
       	<li><a href="/sen/Modules/guard/Change_password_guard.php">Change Password</a></li>
      </ul>
    </nav>
  </div>
  <div id="container" class="clear">
    <!-- content body -->
		<section align="center">
		<?PHP
		if(isset($_SESSION['access'])&&($_SESSION['access']=='5'))
		{
			if(isset($_POST['SUBMIT7']))
			{
						header('location:/sen/Modules/guard/Gate_guard.php');
			}
			if(isset($_POST['SUBMIT1']))
			{
			
				$resident_id=$_POST['resident_id'];
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				out_evening($resident_id);
				Close_To_Server($db_handle);
			}
			if(isset($_POST['SUBMIT2']))
			{
			
				$resident_id=$_POST['resident_id'];
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				in_evening($resident_id);
				Close_To_Server($db_handle);
			}
			if(isset($_POST['SUBMIT3']))
			{
			
				$resident_id=$_POST['resident_id'];
				$purpose=$_POST['purpose'];
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				out_leave($resident_id,$purpose);
				Close_To_Server($db_handle);
			}
			if(isset($_POST['SUBMIT4']))
			{
				$resident_id=$_POST['resident_id'];
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				in_leave($resident_id);
				Close_To_Server($db_handle);
			}
			if(isset($_POST['SUBMIT20']))
			{
				$resident_id=$_POST['resident_id'];
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				$rid=$_SESSION['rid'];
				laptop_in($rid);
				Close_To_Server($db_handle);
			}
			if(isset($_POST['SUBMIT21']))
			{
				$resident_id=$_POST['resident_id'];
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				$rid=$_SESSION['rid'];
				laptop_out($rid);
				Close_To_Server($db_handle);
			}
			if(isset($_POST['SUBMIT10']))
			{
				$resident_id=$_POST['resident_id'];
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				$rid=$_POST['dhobi_id'];
				dhobi_status_in($rid);
				Close_To_Server($db_handle);
			}
			if(isset($_POST['SUBMIT11']))
			{
				$resident_id=$_POST['resident_id'];
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				$rid=$_POST['dhobi_id'];
				dhobi_status_out($rid);
				Close_To_Server($db_handle);
			}
			if(isset($_POST['SUBMIT12']))
			{
				$resident_id=$_POST['resident_id'];
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				$rid=$_POST['doctor_id'];
				doctor_status_in($rid);
				Close_To_Server($db_handle);
			}
			if(isset($_POST['SUBMIT13']))
			{
				$resident_id=$_POST['resident_id'];
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				$rid=$_POST['doctor_id'];
				doctor_status_out($rid);
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
	<FORM NAME="form2" METHOD="POST" ACTION="Gate_guard.php" >
	<table>
		<tr><td colspan="3">Resident ID   : <INPUT TYPE="TEXT" NAME="resident_id"></td></tr>
		<tr><td colspan="3">Purpose (Only applicable if taking leave): <INPUT TYPE="TEXT" NAME="purpose" value="home"> </td></tr>
		
		<tr rowspan="2"><td><INPUT TYPE="SUBMIT" NAME="SUBMIT1" VALUE="Go Out After 7 P.M."></td>
		
		<td><INPUT TYPE="SUBMIT" NAME="SUBMIT3" VALUE="Taking a leave"></td>
		
		<td><INPUT TYPE="SUBMIT" NAME="SUBMIT5" VALUE="Taking Laptop Out"></td></tr>
		
			<?php
		
							
					if(isset($_POST['SUBMIT5']))
					{
						$resident_id=$_POST['resident_id'];
						$db_handle=Connect_To_Server();
						$db_found=Connect_To_DB();
						$in_out='out';
						view_laptop_details($resident_id,$in_out);
						Close_To_Server($db_handle);
					}
		
		
			?>
		
		<tr rowspan="2"><td><INPUT TYPE="SUBMIT" NAME="SUBMIT2" VALUE="Come in After 7 P.M."></td>
		
		<td><INPUT TYPE="SUBMIT" NAME="SUBMIT4" VALUE="Coming Back from leave"></td>
		
		<td><INPUT TYPE="SUBMIT" NAME="SUBMIT6" VALUE="Bringing Laptop In"></td></tr>
		
			<?php
		
							
					if(isset($_POST['SUBMIT6']))
					{
						$resident_id=$_POST['resident_id'];
						$db_handle=Connect_To_Server();
						$db_found=Connect_To_DB();
						$in_out='in';
						view_laptop_details($resident_id,$in_out);
						Close_To_Server($db_handle);
					}
			?>
			</table>
		<?php view_form(); ?>
		<table>
		<?php view_form_doctor(); ?>
		<tr><td colspan="3"><INPUT TYPE="SUBMIT" NAME="SUBMIT7" VALUE="Go Back"></td></tr>
		</table>
	</FORM>	

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
		function out_evening($residentid)
		{
				$date_time=date('Y-m-d h:i:s ', time());
				$SQL_Query="INSERT INTO gate_evening ( resident_id , time_date, entry_exit) VALUES ('$residentid','$date_time','o') ";
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
		
		function in_evening($residentid)
		{
				$date_time=date('Y-m-d h:i:s ', time());
				$SQL_Query="INSERT INTO gate_evening ( resident_id , time_date, entry_exit) VALUES ('$residentid','$date_time','i') ";
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
		function out_leave($residentid,$purpose)
		{
				$date_time=date('Y-m-d h:i:s ', time());
				
				$SQL_Query="INSERT INTO gate_leave ( resident_id , exit_time_date,purpose) VALUES ('$residentid','$date_time','$purpose') ";
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
		
		function in_leave($residentid)
		{
				
				$SQL_Query="select leave_id from gate_leave where resident_id='$residentid' and entry_time_date is NULL ";
				$result=mysql_query($SQL_Query);
				
				if($result==false)
				{
						echo mysql_error();
				}
				else
				{
					
					$out=mysql_fetch_assoc($result);
					if($out['leave_id']=="")
					{
						echo "Your entry was not found . Please first exit and then Enter";
					}
					else
					{
						$leave_id=$out['leave_id'];
						$date_time=date('Y-m-d h:i:s ', time());
						$SQL_Query="update gate_leave set entry_time_date='$date_time' where leave_id='$leave_id' ";
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
				}
		}
		
		function view_laptop_details($resident_id,$in_out)
		{
				
				$SQL_Query="select name,name_of_manufacturer,invoice_number from laptop_registration join residents on laptop_registration.resident_id=residents.id where resident_id='$resident_id' ";
				$result=mysql_query($SQL_Query);
				
				if($result==false)
				{
						echo mysql_error();
				}
				else
				{
						echo "<FORM NAME='form3' METHOD='POST' ACTION='gate.php' >";
						echo "<table border='1'>";
						echo"<tr><td>Resident ID</td><td>Name</td><td>Laptop Invoice Number</td><td>Manufacturer</td>";
						while($out=mysql_fetch_assoc($result))
						{
							$inv_no=$out['invoice_number'];
							$name=$out['name'];
							$nom=$out['name_of_manufacturer'];
							echo "<tr><td>$resident_id</td><td>$name</td><td>$inv_no</td><td>$nom</td>";
							echo "";
						}
						echo"</table>";
						echo "<br>";
						if($in_out=='in')
						{
							echo "<INPUT TYPE='SUBMIT' NAME='SUBMIT20' VALUE='Confirm'>";
						}
						if($in_out=='out')
						{
							echo "<INPUT TYPE='SUBMIT' NAME='SUBMIT21' VALUE='Confirm'>";
						}
						echo "<INPUT TYPE='SUBMIT' NAME='SUBMIT22' VALUE='Wrong Invoice Number'>";
						echo "<br>";
						echo "</form>";
						$_SESSION['rid']=$resident_id;
						
				}
		}
		function laptop_in($id)
		{
				
				$date_time=date('Y-m-d h:i:s ', time());
				$SQL_Query="insert into gate_laptop_entry (resident_id,entry_time_date) values('$id','$date_time') ";
				$result=mysql_query($SQL_Query);
				if($result==false)
				{
						echo mysql_error();
						if(mysql_errno()=='1064')
						{
							echo "The student with this id has not registered his laptop";
						}
				}
				else
				{
						$SQL_Query="update laptop_registration set present_status='i' where resident_id='$id'";
						$result=mysql_query($SQL_Query);
						if($result==true)
						{
							echo "in Successful";
						}
				}
		}
		function laptop_out($id)
		{
				
				$SQL_Query="select resident_id from gate_laptop_entry where resident_id='$id' and exit_time_date is NULL";
				$result=mysql_query($SQL_Query);			
				if($result==false)
				{
						echo mysql_error();
				}
				else
				{
				
					$out=mysql_fetch_assoc($result);
					if($out['resident_id']=="")
					{
						echo "Your entry was not found . Please first Enter and then Exit";
					}		
					else
					{
							$date_time=date('Y-m-d h:i:s ', time());
							$SQL_Query="update gate_laptop_entry set exit_time_date='$date_time' where resident_id='$id' and exit_time_date is NULL";
							$result=mysql_query($SQL_Query);
							$SQL_Query="update laptop_registration set present_status='o' where resident_id='$id'";
							$result=mysql_query($SQL_Query);
							echo "out Successful";
					}
				}
		}
		function dhobi_status_in($dhobi_id)
		{
				
				$SQL_Query="update dhobi_status set present='i' where dhobi_id='$dhobi_id' ";
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
		function dhobi_status_out($dhobi_id)
		{
				
				$SQL_Query="update dhobi_status set present='o' where dhobi_id='$dhobi_id' ";
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
		function view_form()
		{
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				$SQL_Query="select dhobi_id,name from dhobi_status";
				$result=mysql_query($SQL_Query);
				if($result==false)
				{
						echo mysql_error();
				}
				else
				{
				//	echo "<FORM NAME='form3' METHOD='POST' ACTION='gate.php' >";
					echo "<table>";
					echo  "<tr><td>Dhobi Name: </td><td><select name='dhobi_id'>";
					while($out=mysql_fetch_assoc($result))
					{
						$name=$out['name'];
						$dhobi_id=$out['dhobi_id'];
						echo  "<option value=$dhobi_id> $dhobi_id : $name </option>";
					}
					echo "</td></tr>";
					echo "</select>";
					echo "<tr><td>";
					echo "<input type='SUBMIT' NAME='SUBMIT10' VALUE='Dhobi Enter' >";
					echo "</td><td>";
					echo "<input type='SUBMIT' NAME='SUBMIT11' VALUE='Dhobi Exit' >";
					echo "</td></tr>";
					
				}
				echo "</table>";
		}
		
		function doctor_status_in($doctor_id)
		{
				
				$SQL_Query="update doctor set present='y' where doctor_id='$doctor_id' ";
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
		function doctor_status_out($doctor_id)
		{
				
				$SQL_Query="update doctor set present='n' where doctor_id='$doctor_id' ";
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
		function view_form_doctor()
		{
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				$SQL_Query="select doctor_id,name from doctor";
				$result=mysql_query($SQL_Query);
				if($result==false)
				{
						echo mysql_error();
				}
				else
				{
				//	echo "<FORM NAME='form3' METHOD='POST' ACTION='gate.php' >";
					echo "<table>";
					echo  "<tr><td>Doctor Name: </td><td><select name='doctor_id'>";
				
					while($out=mysql_fetch_assoc($result))
					{
						$name=$out['name'];
						$doctor_id=$out['doctor_id'];
						echo  "<option value=$doctor_id>  $name </option>";
					}
					echo "</td></tr>";
					echo "</select>";
					echo "<tr><td>";
					echo "<input type='SUBMIT' NAME='SUBMIT12' VALUE='Doctor Enter' >";
					echo "</td><td>";
					echo "<input type='SUBMIT' NAME='SUBMIT13' VALUE='Doctor Exit' >";
					echo "</td></tr>";
					
				}
				echo "</table>";
		}
		
		
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