<?php
function Connect_TO_Server()
		{
			$usernamedb="root";
			$passworddb="nikunj";
			$server=$_SERVER['SERVER_ADDR'];
			$db_handle=mysql_connect($server,$usernamedb,$passworddb);
			return $db_handle; 
		}
		function Connect_TO_DB()
		{
			$database="sen";
			$db_found = mysql_select_db($database);
			if(!$db_found)
			{
				print "error in connection to database";
			}
			echo nl2br("\n");
		}
		function Close_To_Server($db_handle)
		{
			mysql_close($db_handle);
		}
?>
<?php
//include ('sen/databasefun.php');
$db=Connect_To_Server();
$db_found=Connect_To_DB();
?>
<?php
/// this page is for getting  snail mail at user side.......................................................
 //by nikunj amipara,


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>lf del for studets </title>
</head>

<body>
<?php
//3/ perform database query


//temp assignment of userid need to be removed when assembled
$userid="201001199" ;

//4. use returned data

$result = mysql_query("SELECT * FROM lost_found where id=$userid order by lost_found_id ;",$db);
if(!$result){
		die("database selection failed:".mysql_error());
	}
//4. use returned data
//while($row = mysql_fetch_array($result)){
//	echo $row["id"]. " ". $row["date"]."". $row["time"]. " ". $row["title"]. "<br/>";

echo '<table border="1">';
echo "<tr>";
	echo "<td>Type</td>";
	echo "<td>ID</td>";
	echo "<td>Date</td>";
	echo "<td>Time</td>";
	//echo "<td>User Id</td>";
	echo "<td>Title</td>";
	echo "<td>Place</td>";
	echo "<td>Object Details</td>";
	
while($row = mysql_fetch_array($result)){
	//print_r($row);
	echo "<tr>";
	if($row["type"]){
		echo "<td> Found</td>";
	}
	else
		echo "<td>Lost</td>";
	echo "<td>" . $row["lost_found_id"] . "</td>";
	echo "<td>" . $row["date"] . "</td>";
	echo "<td>" . $row["time"] . "</td>";
	//echo "<td>" . $row["id"] . "</td>";
	echo "<td>" . $row["Title"] . "</td>";
	echo "<td>" . $row["place"] . "</td>";
	echo "<td>" . $row["object_details"] . "</td>";
	
	echo "<br/>";
	
}
echo "</table>"
	

// this is  how admin can update status of snamil mail.

?>
<form action="lfdel1.php" method="post">
	<b>Enter lf  id that you want to delete</b>
	<input type="text" name="lfid" size=10 /><br />
    <input type="submit" />


</form>
</body>
</html>
<?php
//5. close connection

mysql_close($db);


?>