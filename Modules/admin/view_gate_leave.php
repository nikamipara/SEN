<HTML>
<HEAD>
<TITLE>Student - Entries</TITLE>
<?PHP
  	session_start();
		if(isset($_SESSION['access'])&&($_SESSION['access']=='4'))
		{
			if(isset($_POST['SUBMIT2']))
			{
						header('location:/sen/Modules/Links_temp/admin_links.php');
			}
			
			if(isset($_POST['SUBMIT4']))
			{
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				view_laptop_gate_entry();
				Close_To_Server($db_handle);
			}	
			if(isset($_POST['SUBMIT3']))
			{
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				$id=$_POST['id'];
				view_laptop_gate_by_id($id);
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
</HEAD>

<BODY>
	<FORM NAME="form2" METHOD="POST" ACTION="view_gate_leave.php" >
		ID: <INPUT TYPE="TEXT" NAME="id" >
		<br>
		<INPUT TYPE="SUBMIT" NAME="SUBMIT4" VALUE="View All">
		<br>
		<INPUT TYPE="SUBMIT" NAME="SUBMIT3" VALUE="View by ID">
		<br>
		<INPUT TYPE="SUBMIT" NAME="SUBMIT2" VALUE="Go Back">
	</FORM>


</BODY>

</HTML>


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
		}
		function Close_To_Server($db_handle)
		{
			mysql_close($db_handle);
		}
		function view_laptop_gate_entry()
		{
				$SQL_Query="select resident_id,name,entry_time_date,exit_time_date,purpose from gate_leave join residents on gate_leave.resident_id=residents.id order by entry_time_date";
				$result=mysql_query($SQL_Query);
				if($result==false)
				{
						echo mysql_error();
				}
				else
				{
						echo "<table border='1'>";
						echo"<tr><td>Resident ID</td><td>Name</td><td>Entry Date</td><td>Entry Time </td><td>Exit Date</td><td>Exit Time</td><td>Purpose</td>";
						while($out=mysql_fetch_assoc($result))
						{
							$name=$out['name'];
							$exit=$out['exit_time_date'];
							$entry=$out['entry_time_date'];
							$id=$out['resident_id'];
							$entry_date=explode(' ',$entry);
							$exit_date=explode(' ',$exit);
							$pur=$out['purpose'];
							if($entry==NULL)
							{
									echo "<tr><td>$id</td><td>$name</td><td>'outside'</td><td>'outside'</td><td>$exit_date[0]</td><td>$exit_date[1]</td><td>$pur</td></tr>";
							}
							else
							{
								echo "<tr><td>$id</td><td>$name</td><td>$entry_date[0]</td><td>$entry_date[1]</td><td>$exit_date[0]</td><td>$exit_date[1]</td></td><td>$pur</td></tr>";
							}
						}
						echo"</table>";
				}

		}
		function view_laptop_gate_by_id($id)
		{
				$SQL_Query="select resident_id,name,entry_time_date,exit_time_date,purpose from gate_leave join residents on gate_leave.resident_id=residents.id where resident_id='$id' order by entry_time_date ";
				$result=mysql_query($SQL_Query);
				if($result==false)
				{
						echo mysql_error();
				}
				else
				{
						echo "<table border='1'>";
						echo"<tr><td>Resident ID</td><td>Name</td><td>Entry Date</td><td>Entry Time </td><td>Exit Date</td><td>Exit Time</td><td>Purpose</td>";
						while($out=mysql_fetch_assoc($result))
						{
							$name=$out['name'];
							$exit=$out['exit_time_date'];
							$entry=$out['entry_time_date'];
							$id=$out['resident_id'];
							$entry_date=explode(' ',$entry);
							$exit_date=explode(' ',$exit);
							$pur=$out['purpose'];
							if($entry==NULL)
							{
									echo "<tr><td>$id</td><td>$name</td><td>'outside'</td><td>'outside'</td><td>$exit_date[0]</td><td>$exit_date[1]</td><td>$pur</td></tr>";
							}
							else
							{
								echo "<tr><td>$id</td><td>$name</td><td>$entry_date[0]</td><td>$entry_date[1]</td><td>$exit_date[0]</td><td>$exit_date[1]</td></td><td>$pur</td></tr>";
							}
						}
						echo"</table>";
				}
		}
				
?>
