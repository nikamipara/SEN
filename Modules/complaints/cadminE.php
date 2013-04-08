
<?php
session_start();
if(!isset($_SESSION['access']) or $_SESSION['access']!= 4)
{   
	$_SESSION['access']=0;
	session_destroy();
	header('location:/sen/Modules/login.php');
}

require_once("db.php");
//include ('sen/databasefun.php');
$db=Connect_To_Server();
$db_found=Connect_To_DB();
?>
<?php
/// this page is for getting  complaints GENERAL  at user side.......................................................
 //by nikunj amipara,
 $ty = "Electrical";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Complaints GENERAL Admin </title>
</head>

<body>
<?php
//3/ perform database query


// for deleteing complaints.........................................................
/*$cid = $_POST['cid'];
$result1 = mysql_query(" delete from complaints where complaints_id = $cid and id = $userid ",$db);
if($result1)
	echo "complain deleted successfully";
*/

// for displaying result.............................................................

$result = mysql_query("SELECT * FROM complaints where Type = '$ty'  order by serviced ",$db);
if(!$result){
		die("database selection failed:".mysql_error());
	}
//4. use returned data
//while($row = mysql_fetch_array($result)){
//	echo $row["snail_mail_id"]. " ". $row["date"]."". $row["time"]. " ". $row["sentby"]."<br/>";

echo '<table border="1">';
echo "<tr>";
	echo "<td>Complaint_id</td>";
	echo "<td>ID</td>";
	echo "<td>Type</td>";
	echo "<td>Posting Date</td>";
	echo "<td>Posting Time</td>";
	echo "<td>Serviced Date</td>";
	echo "<td>Serviced Time</td>";
	echo "<td>Descrption</td>";
	
while($row = mysql_fetch_array($result)){
	echo "<tr>";
	echo "<td>" . $row["complaints_id"] . "</td>";
	echo "<td>" . $row["id"] . "</td>";
	echo "<td>" . $row["Type"] . "</td>";
	echo "<td>" . $row["posting_date"] . "</td>";
	echo "<td>" . $row["posting_time"] . "</td>";
	echo "<td>" . $row["serviced_date"] . "</td>";
	echo "<td>" . $row["serviced_time"] . "</td>";
	echo "<td>" . $row["description"] . "</td>";
	
	echo "<br/>";
}

?>


<form action="cadminE1.php" method="post">
<strong>Tick Serviced <input type="radio" name="r" value="Tick Serviced" checked="checked" />
Delete..<input type="radio" name="r" value="Delete" /></strong>
<strong>
<br /> Enter Complaint Id </strong>

<input type="text" name="cid" size="10" />
<input type="submit" name="Delete"/>

</form>
</body>
</html>
<?php
//5. close connection

Close_To_Server($db);


?>