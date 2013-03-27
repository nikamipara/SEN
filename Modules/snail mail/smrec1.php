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
	
$smid1= $_POST['smid'];



$query1= "UPDATE `snail_mail` SET `received_status`= true WHERE snail_mail_id = $smid1  ";
//$query1="INSERT INTO `snail_mail`(`date`, `time`, `id`, `sentby`) VALUES (2013-03-27 , '06:50:50' , '201001199' ,'spped postr') ";

$result = mysql_query($query1);
				if($result==false)
				{
						echo 'some thing went wrong !!!!!!!!'. mysql_error();
				}
				else
				{	
					echo 'snail mail update added successfully for '. $smid1;
				}

?>
<?php
//5. close connection

mysql_close($db);


?>