<html>
<head>
<title>Menu Bar Include</title>
<?PHP 	
		session_start();
		if(isset($_SESSION['access'])&&($_SESSION['access']=='1'))
		{
				if(isset($_POST['SUBMIT1']))
				{
						header('location:/sen/Modules/resident/ETIC.php');
			
				}
				if(isset($_POST['SUBMIT2']))
				{
						
						header('location:/sen/Modules/resident/Change_Password.php');
			
				}
				if(isset($_POST['SUBMIT3']))
				{
						
						$_SESSION['access']=0;
						session_destroy();
						header('location:/sen/Modules/login/login.php');
			
				}
		}
		else
		{
			header('location:/sen/Modules/Login/login.php');
			echo "Please login properly";
			
		}
		
		
 ?>


</head>

<body bgcolor="#FFFFFF" text="#000000">
				<FORM NAME="form2" METHOD="POST" ACTION="resident_links.php" >
			
				<INPUT TYPE="SUBMIT" NAME="SUBMIT1" VALUE="Register For ETIC">
				<br>
				<INPUT TYPE="SUBMIT" NAME="SUBMIT2" VALUE="Change Password">
				<br>
				<INPUT TYPE="SUBMIT" NAME="SUBMIT3" VALUE="Sign out">
				<br>
			</FORM>
</body>
</html>
