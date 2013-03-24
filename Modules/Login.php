<HTML>
<HEAD>
<TITLE>A Basic login Form</TITLE>
<?PHP
		if(isset($_POST['SUBMIT1']))
		{
			
			$username=$_POST['username'];
			$password=$_POST['password'];
			$db_handle=Connect_To_Server();
			$db_found=Connect_To_DB();
			login($username,$password);
			
			Close_To_Server($db_handle);
		}
		
		else 
		{
				print("please enter username below");
		}
?>
</HEAD>

<BODY>

	<FORM NAME="form1" METHOD="POST" ACTION="login.php" >
	
		Username : <INPUT TYPE="TEXT"  NAME="username"> 
		<br>
		Password : <INPUT TYPE="PASSWORD"  NAME="password">
		<br>
		<INPUT TYPE="SUBMIT" NAME="SUBMIT1" VALUE="LOGIN">
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
		function login($username,$password)
		{
			$SQL_Query="select * from login";
			$result_query=mysql_query($SQL_Query);
			
			
			$flag1=1;
			while($out=mysql_fetch_assoc($result_query))
			{
				if($username==$out['login_id'])
				{
					$flag1=0;
					if($password==$out['password'])
					{
						
						echo nl2br("\n");
						echo "hi ";
						echo $username . "<BR>" . "Your login was succesful" ;
						echo nl2br("\n");
						session_start();
						$_SESSION['access']=$out['priority'];
						if($out['priority']==4)
						{
							header('location:/sen/Modules/Links_temp/admin_links.php');
						}
					}
					else 
					{
						echo "Incorrect Password";
					}
				}
			}
			
			if($flag1==1)
			{
				echo "incorrect username";
			}
			
		}
?>