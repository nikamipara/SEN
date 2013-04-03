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
						header('location:/sen/Modules/admin/register_hmc.php');
			
				}
				if(isset($_POST['SUBMIT5']))
				{
						header('location:/sen/Modules/admin/change_hmc.php');
			
				}
				if(isset($_POST['SUBMIT6']))
				{
						header('location:/sen/Modules/admin/register_doctor.php');
			
				}
				if(isset($_POST['SUBMIT7']))
				{
						header('location:/sen/Modules/admin/register_laptop.php');
			
				}
				if(isset($_POST['SUBMIT8']))
				{
						header('location:/sen/Modules/admin/Change_resident.php');
			
				}
				if(isset($_POST['SUBMIT9']))
				{
						
						$_SESSION['access']=0;
						$_SESSION['login_id']=0;
						session_destroy();
						header('location:/sen/Modules/login/login.php');
			
				}
		}
		else
		{
			header('location:/sen/Modules/login/login.php');
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
				<INPUT TYPE="SUBMIT" NAME="SUBMIT4" VALUE="Register HMC">
				<br>
				<INPUT TYPE="SUBMIT" NAME="SUBMIT5" VALUE="Change HMC">
				<br>
				<INPUT TYPE="SUBMIT" NAME="SUBMIT6" VALUE="Register New Doctor">
				<br>
				<INPUT TYPE="SUBMIT" NAME="SUBMIT7" VALUE="Register New Laptop">
				<br>
				<INPUT TYPE="SUBMIT" NAME="SUBMIT8" VALUE="Change Resident Details">
				<br>
				<INPUT TYPE="SUBMIT" NAME="SUBMIT9" VALUE="Sign out">
				<br>
			</FORM>
</body>
</html>
