<html>
<head>
<title>Menu Bar Include</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">


<?PHP 	
		session_start();
		if(isset($_SESSION['access'])&&($_SESSION['access']==3))
		{
			
			include "link_page.txt";
		}
		else
		{
			echo "Please login properly";
		}
		
		
 ?>


</head>

<body bgcolor="#FFFFFF" text="#000000">


</body>
</html>
