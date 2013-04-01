
<?php
/// this page is for getting  complaints at user side...get u to cresi1....................................................
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
<title>complaints user </title>
</head>

<body>
<?php
//3/ perform database query
//user name wwhich has to be fatched from session array
$userid;

//temp assignment of userid need to be removed when assembled
$userid="201001199" ;
// for deleteing complaints.........................................................
/*$cid = $_POST['cid'];
$result1 = mysql_query(" delete from complaints where complaints_id = $cid and id = $userid ",$db);
if($result1)
	echo "complain deleted successfully";
*/

// for displaying result.............................................................

$result = mysql_query("SELECT * FROM complaints where id= $userid order by serviced ",$db);
if(!$result){
		die("database selection failed:".mysql_error());
	}
//4. use returned data
//while($row = mysql_fetch_array($result)){
//	echo $row["snail_mail_id"]. " ". $row["date"]."". $row["time"]. " ". $row["sentby"]."<br/>";

echo '<table border="1">';
echo "<tr>";
	echo "<td>Complaint_id</td>";
	echo "<td>Type</td>";
	echo "<td>Posting Date</td>";
	echo "<td>Posting Time</td>";
	echo "<td>Serviced Date</td>";
	echo "<td>Serviced Time</td>";
	echo "<td>Descrption</td>";
	
while($row = mysql_fetch_array($result)){
	echo "<tr>";
	echo "<td>" . $row["complaints_id"] . "</td>";
	echo "<td>" . $row["Type"] . "</td>";
	echo "<td>" . $row["posting_date"] . "</td>";
	echo "<td>" . $row["posting_time"] . "</td>";
	echo "<td>" . $row["serviced_date"] . "</td>";
	echo "<td>" . $row["serviced_time"] . "</td>";
	echo "<td>" . $row["description"] . "</td>";
	
	echo "<br/>";
}

?>


<form action="cgetresi1.php" method="post">
<strong> Delete Complaint
<br /> Enter Complaint Id </strong>
<input type="text" name="cid" size="10" />
<input type="submit" name="Delete"/>

</form>
</body>
</html>
<?php
//5. close connection

mysql_close($db);


?>