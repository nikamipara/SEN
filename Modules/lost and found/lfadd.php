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
///for temp i am assigning it in static way...
$userid= '201001199';


//$type = $_POST['type'];
print_r ($_POST);
$t;
$title = $_POST['title'];
$objd = $_POST['object_details'];
$place = $_POST['place']; 
if($_POST['type'] == 'lost'){ $t = 0;}
else if ($_POST['type'] == 'found'){$t=1;}
//echo $date . $time . $userid . $sentby1 . gettype($_POST['sentby']); 

$query1= "INSERT INTO `lost_found`(`type`,`date`, `time`, `id`, `title`,`place`,`object_details`) 
			VALUES ($t,NOW() , NOW(), $userid , '$title','$place','$objd') ";
//$query1="INSERT INTO `snail_mail`(`date`, `time`, `id`, `sentby`) VALUES (2013-03-27 , '06:50:50' , '201001199' ,'spped postr') ";

$result = mysql_query($query1);
				if($result==false)
				{
						echo 'some thing went wrong !!!!!!!!'. mysql_error();
				}
				else
				{	
					echo $_POST['type'] . "update added successfully for " . $userid;
				}

?>
<?php
//5. close connection

mysql_close($db);


?>