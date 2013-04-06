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
			if(isset($_POST['SUBMIT3']))
			{
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				view_all_residents();
				Close_To_Server($db_handle);
			}
			if(isset($_POST['SUBMIT1']))
			{
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				$id=$_POST['resident_id'];
				view_particular_residents($id);
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
	<FORM NAME="form2" METHOD="POST" ACTION="view_student_details.php" >
		<INPUT TYPE="TEXT" NAME="resident_id">
		<br>
		<INPUT TYPE="SUBMIT" NAME="SUBMIT1" VALUE="view Particular student Details">
		<br>
		<INPUT TYPE="SUBMIT" NAME="SUBMIT3" VALUE="view all resident Details">
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
			echo nl2br("\n");
		}
		function Close_To_Server($db_handle)
		{
			mysql_close($db_handle);
		}
		function view_all_residents()
		{
				$SQL_Query="select * from residents ";
				$result=mysql_query($SQL_Query);
				
				if($result==false)
				{
						echo mysql_error();
				}
				else
				{
						echo "<table border='1'>";
						echo"<tr><td>Resident ID</td><td>Name</td><td>Contact Details</td><td>Email </td><td>Guardian Contact Details</td><td>Wing </td><td>Room</td><td>Batch</td><td>Program</td>";
						while($out=mysql_fetch_assoc($result))
						{
							$id=$out['id'];
							$name=$out['name'];
							$contact=$out['contact_details'];
							$program=$out['program'];
							$email=$out['email'];
							$wing=$out['wing'];
							$gcontact=$out['guardian_contact_details'];
							$wing=$out['wing'];
							$room=$out['room'];
							$batch=$out['batch'];
							echo "<tr><td>$id</td><td>$name</td><td>$contact</td><td>$email</td><td>$gcontact</td><td>$wing</td><td>$room</td><td>$batch</td><td>$program</td>";
						}
						echo"</table>";
				}

		}
		function view_particular_residents($id)
		{
				$SQL_Query="select * from residents where id='$id' ";
				$result=mysql_query($SQL_Query);
				
				if($result==false)
				{
						echo mysql_error();
				}
				else
				{
						echo "<table border='1'>";
						echo"<tr><td>Resident ID</td><td>Name</td><td>Contact Details</td><td>Email </td><td>Guardian Contact Details</td><td>Wing </td><td>Room</td><td>Batch</td><td>Program</td>";
						while($out=mysql_fetch_assoc($result))
						{
							$id=$out['id'];
							$name=$out['name'];
							$contact=$out['contact_details'];
							$program=$out['program'];
							$email=$out['email'];
							$wing=$out['wing'];
							$gcontact=$out['guardian_contact_details'];
							$wing=$out['wing'];
							$room=$out['room'];
							$batch=$out['batch'];
							echo "<tr><td>$id</td><td>$name</td><td>$contact</td><td>$email</td><td>$gcontact</td><td>$wing</td><td>$room</td><td>$batch</td><td>$program</td>";
						}
						echo"</table>";
				}
		}
?>
