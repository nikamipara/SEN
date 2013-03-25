<html>
<head>
<title>Menu Bar Include</title>
<?PHP 	
		session_start();
		if(isset($_SESSION['access'])&&($_SESSION['access']=='4'))
		{
				if(isset($_POST['SUBMIT1']))
				{
						header('location:/sen/Modules/admin/register_resident.php');
			
				}
				if(isset($_POST['SUBMIT2']))
				{
						
						header('location:/sen/Modules/admin/register_admin.php');
			
				}
				if(isset($_POST['SUBMIT3']))
				{
						header('location:/sen/Modules/admin/change_password.php');
			
				}
				if(isset($_POST['SUBMIT4']))
				{
						
						$_SESSION['access']=0;
						session_destroy();
						header('location:/sen/Modules/login.php');
			
				}
		}
		else
		{
			header('location:/sen/Modules/login.php');
			echo "Please login properly";
			
		}
		
		
 ?>


</head>

<body bgcolor="#FFFFFF" text="#000000">
				<FORM NAME="form2" METHOD="POST" ACTION="admin_links.php" >
			
				<INPUT TYPE="SUBMIT" NAME="SUBMIT1" VALUE="Register New Residents">
				<br>
				<INPUT TYPE="SUBMIT" NAME="SUBMIT2" VALUE="Register New Admin">
				<br>
				<INPUT TYPE="SUBMIT" NAME="SUBMIT3" VALUE="Change Password">
				<br>
				<INPUT TYPE="SUBMIT" NAME="SUBMIT4" VALUE="Sign out">
				<br>
			</FORM>
</body>
</html>
