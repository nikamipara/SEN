<html>
<head>
<title>Menu Bar Include</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">


<?PHP 	
		session_start();
		if(isset($_SESSION['access'])&&($_SESSION['access']=='4'))
		{
				if(isset($_POST['SUBMIT1']))
				{
						header('location:/sen/Modules/admin/register_resident.php');
			
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

			<INPUT TYPE="SUBMIT" NAME="SUBMIT1" VALUE="Register">
			<br>
			<INPUT TYPE="SUBMIT" NAME="SUBMIT2" VALUE="Sign out">
</body>
</html>
