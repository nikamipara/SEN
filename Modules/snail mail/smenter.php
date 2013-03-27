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
	
$date1 = new DateTime();
$date = $date1->format('Y-m-d');
$time = $date1->format('H:i:s');

$userid= $_POST['id'];
$sentby1 = $_POST['sentby'];

//echo $date . $time . $userid . $sentby1 . gettype($_POST['sentby']); 

$query1= "INSERT INTO `snail_mail`(`date`, `time`, `id`, `sentby`) VALUES (NOW() , NOW(), $userid , '' '.$sentby1.' '') ";
//$query1="INSERT INTO `snail_mail`(`date`, `time`, `id`, `sentby`) VALUES (2013-03-27 , '06:50:50' , '201001199' ,'spped postr') ";

$result = mysql_query($query1);
				if($result==false)
				{
						echo 'some thing went wrong !!!!!!!!'. mysql_error();
				}
				else
				{	
					echo 'snail mail update added successfully for '. $userid;
				}

?>
<?php
//5. close connection

mysql_close($db);


?>