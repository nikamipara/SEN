<HTML>
<HEAD>
<TITLE>Registration- Reisdents</TITLE>
<?PHP
		session_start();
		if(isset($_SESSION['access'])&&($_SESSION['access']=='4'))
		{
			if(isset($_POST['SUBMIT2']))
			{
						header('location:/sen/Modules/Links_temp/admin_links.php');
			}
				
			if(isset($_POST['SUBMIT1']))
			{
			
				$id=$_POST['id'];
				$name=$_POST['name'];
				$wing=$_POST['wing'];
				$floor=$_POST['floor'];
				$room=$_POST['room'];
				$contact=$_POST['contact'];
				$gender=$_POST['gender'];
				$batch=$_POST['batch'];
				$gcontact=$_POST['gcontact'];
				$program=$_POST['program'];
				$db_handle=Connect_To_Server();
				$db_found=Connect_To_DB();
				register($id,$name,$wing,$floor,$room,$contact,$gender,$batch,$gcontact,$program);
				Close_To_Server($db_handle);
			}
		}
		else 
		{
			echo "invalid Login";
		}
		
?>
</HEAD>

<BODY>
	<FORM NAME="form1" METHOD="POST" ACTION="register.php" >
	
		ID : <INPUT TYPE="TEXT" NAME="id"> 
		<br>
		Name : <INPUT TYPE="TEXT"  NAME="name">
		<br>
		Wing : <INPUT TYPE="TEXT"  NAME="wing">
		<br>
		Floor : <INPUT TYPE="TEXT"  NAME="floor">
		<br>
		Room Number: <INPUT TYPE="NUMBER"  NAME="room">
		<br>
		Contact Details : <INPUT TYPE="NUMBER"  NAME="contact">
		<br>
		Gender : <INPUT TYPE="TEXT"  NAME="gender">
		<br>
		Batch : <INPUT TYPE="NUMBER"  NAME="batch">
		<br>
		Program : <INPUT TYPE="TEXT"  NAME="program">
		<br>
		Guardian Contact details : <INPUT TYPE="NUMBER"  NAME="gcontact">
		<br>
		
		<INPUT TYPE="SUBMIT" NAME="SUBMIT1" VALUE="REGISTER">
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
		function register($id,$name,$wing,$floor,$room,$contact,$gender,$batch,$gcontact,$program)
		{
			if(($gender=="f")&&($wing!="j"&&wing!="k"))
			{
				echo "Invalid Wing ";
			}
			else if(($gender=="m")&&($wing!="a"&&wing!="b"&&wing!="c"&&wing!="d"&&wing!="e"&&wing!="f"&&wing!="g"&&wing!="h"))
			{
				echo "Invalid Wing ";
			}
			else if($gender!=="m"&&$gender!="f")
			{
				echo "invalid Gender";
			}
			else
			{
				
				$password="reset123";
				$access="1";
				$SQL_Query="INSERT INTO login VALUES ('$id','$password','$access')";
				$result=mysql_query($SQL_Query);
				if($result==false)
				{
						echo mysql_error();
				}
				else
				{
					$email=$id."@daiict.ac.in";
					$SQL_Query="INSERT INTO residents(id,name,room,floor,wing,contact_details,guardian_contact_details,batch,program,email,login_id) VALUES ('$id','$name','$room','$floor','$wing','$contact','$gcontact','$batch','$program','$email','$id')";
					$result=mysql_query($SQL_Query);
					if($result==false)
					{
							echo mysql_error();
							$SQL_Query="delete from login where login_id='$id'";
							$result=mysql_query($SQL_Query);
						
							echo mysql_error();
					}
					else
					{
						
						echo "Register Successfully";
					}
				}
			}
		}
?>