<HTML>
<HEAD>
<TITLE>Registration- Reisdents</TITLE>
<?PHP
		session_start();
		if(isset($_SESSION['access'])&&($_SESSION['access']=='5'))
		{
			if(isset($_POST['SUBMIT7']))
			{
						header('location:/sen/Modules/Links_temp/guard_links.php');
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
		}
		else 
		{
			$_SESSION['access']=0;
			session_destroy();
			header('location:/sen/Modules/login.php');
			echo "invalid Login";
		}
		
?>
</HEAD>

<BODY>
	<FORM NAME="form2" METHOD="POST" ACTION="gate.php" >
	
		Resident ID   : <INPUT TYPE="TEXT" NAME="resident_id"> 
		<br>
		Purpose (Only applicable if taking leave): <INPUT TYPE="TEXT" NAME="purpose"> 
		<br>
		<INPUT TYPE="SUBMIT" NAME="SUBMIT1" VALUE="Go Out After 7 P.M.">
		<br>
		<INPUT TYPE="SUBMIT" NAME="SUBMIT2" VALUE="Come in After 7 P.M.">
		<br>
		<INPUT TYPE="SUBMIT" NAME="SUBMIT3" VALUE="Taking a leave">
		<br>
		<INPUT TYPE="SUBMIT" NAME="SUBMIT4" VALUE="Coming Back from leave">
		<br>
		<INPUT TYPE="SUBMIT" NAME="SUBMIT5" VALUE="Taking Laptop Out">
		<br>
		<INPUT TYPE="SUBMIT" NAME="SUBMIT6" VALUE="Bringing Laptop In">
		<br>
		<INPUT TYPE="SUBMIT" NAME="SUBMIT7" VALUE="Go Back">
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
		
?>