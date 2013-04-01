
<?php
/// this page is for getting  complaints at user side.......................................................
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
<title>snail mail reterive </title>
</head>

<body>
<?php
//3/ perform database query
//user name wwhich has to be fatched from session array
$userid;

//temp assignment of userid need to be removed when assembled
$userid="201001199" ;
// for deleteing complaints.........................................................
$cid = $_POST['cid'];
$result1 = mysql_query(" delete from complaints where complaints_id = $cid and id = $userid ",$db);
if($result1){
	echo "complain deleted successfully";
	header('location:/sen/complaints/cgetresi.php');
}
else{
	echo "error cant not delete try agin ";
	header ('location:/sen/complaints/cgetresi.php');
}
?>

</body>
</html>
<?php
//5. close connection

mysql_close($db);


?>