
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>mail</title>
</head>
<body>
<center> <h1>Mail</h1> </center>
 <?php 
	 if(isset($_SESSION['acess'])&& $_SESSION['acess']==4)
	 {
			 
	 }
	/* else
	 {
		 die("not admin");
	}
	*/  
	 ?>
	 simple llick ssubmir to send to all
<form action="mailer2.php" >
<fieldset>
<legend><center>selectstudents where:</center></legend>

  <input type="checkbox" name="cwing" value="1">  <label id="chkbx">Wing: </label> 
  <input type="text"  name="wing"/><br><br>
    <input type="checkbox" name="cbatch" value="1">  <label id="chkbx">batch: </label> 
  <input type="text"  name="batch"/><br><br>
    <input type="checkbox" name="cfloor" value="1">  <label id="chkbx">floor: </label> 
  <input type="text"  name="floor"/><br><br>
  <input type="checkbox" name="cprog" value="1">  <label id="chkbx">prog: </label> 
  <input type="text"  name="prog"/><br><br>
    <input type="Submit" value="Submit">
    <input type='hidden' value='top' name='lallan'>
    sub
     <input type="textarea"  name="subject"/><br><br>
      body
      <input type="textarea"  name="body"/><br><br>
       

</fieldset>
</form>

</div>
<div id="footer" align='bottom'>
	<p>Author:
		Ayush Kulshrestha,geniusayush@gmail.com</p>
	</div>
</body>
</html>
