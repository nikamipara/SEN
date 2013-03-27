
<?php
/// this page is for getting  snail mail at user side.......................................................
 //by nikunj amipara,
	//1 create database connection
	
	$path = "localhost";
	$pass = "nikunj";
	$user = "root";
	$db = mysql_connect("localhost","root","nikunj");
	if(!$db){
		die("Database connection ended" .mysql_error());
	
	}
	//2. selection of database
	$db_select = mysql_select_db("sen",$db);
	if(!$db_select){
		die("database selection failed:".mysql_error());
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>snail mail reterive for admin </title>
</head>

<body>
<?php
//3/ perform database query
//user name wwhich has to be fatched from session array
$userid = $_POST['id'];


//temp assignment of userid need to be removed when assembled
//$userid="201001199" ;

$result = mysql_query("SELECT * FROM snail_mail where id= $userid and received_status = false",$db);
if(!$result){
		die("database selection failed:".mysql_error());
	}
//4. use returned data
while($row = mysql_fetch_array($result)){
	echo $row["snail_mail_id"]. " ". $row["date"]."". $row["time"]. " ". $row["sentby"]."<br/>";


}
echo '<br/>'

// this is  how admin can update status of snamil mail.

?>
<form action="smrec1.php" method="post">
	<b>Enter snail mail id for which u want to update status to received</b>
	<input type="text" name="smid" size=10 /><br />
    <input type="submit" />


</form>
</body>
</html>
<?php
//5. close connection

mysql_close($db);


?>