
<?php
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
	
// user id get it from session veriable this needs to be done before deploying :)........
/// temp  i am assigning it in static way...
$userid= '201001199';


$type = $_POST['type'];
$des = $_POST['description'];

echo ".................................." .$type; 

$query1= "INSERT INTO `complaints`(`posting_date`, `posting_time`,`id`, `Type`, `description`) 
		  VALUES (NOW(),NOW(),$userid,'$type','$des') ";

$result = mysql_query($query1);
				if($result==false)
				{
						echo 'some thing went wrong !!!!!!!!'. mysql_error();
				}
				else
				{	
					echo $_POST['type'] . "complaint added successfully for " . $userid;
				}

?>
<?php
//5. close connection

mysql_close($db);


?>


