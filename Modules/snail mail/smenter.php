<?php

require("phpmailer/class.phpmailer.php");
require("phpmailer/class.smtp.php");
function createmail( $userid , $sentby)
{	
require_once("db.php");
	$mail = new PHPMailer(); 
$mail->IsSMTP();
$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->Username = "daiicthor@gmail.com"; // SMTP username
$mail->Password = "horofdaiict"; // SMTP password
$mail->SMTPKeepAlive = true;                  // SMTP connection will not close after each email sent

			
			$webmaster_email = "da_hostel@daiict.ac.in"; //Reply to this email ID
																					$webmaster_name="admin";

			$mail->From = $webmaster_email;

			$mail->FromName = $webmaster_name;

			$mail->AddReplyTo($webmaster_email,$webmaster_name);

														
			$mail->IsHTML(true); // send as HTML
			

			$mail->WordWrap = 50; // set word wrap									//only suportsmax 500 users

																					//$mail->AddAttachment("/var/tmp/file.tar.gz"); // attachment

																					//$mail->AddAttachment("/tmp/image.jpg", "new.jpg"); // attachment

			
			$mail->Subject ='You have a new snail mail email. ';
			$mail->Body = " you have a new snail mail  from". $sentby ;			
			


	
				$mail->AddAddress($post['email'],$userid);
				
				
	
	if(!$mail->Send())
			{
			echo "Mailer Error: " . $mail->ErrorInfo;
			}
			else
			{
			echo "Message has been sent";
			}
	
}

	 

		?>
        
        
        
<?php

//include ('sen/databasefun.php');

session_start();
require_once("db.php");
if(isset($_SESSION['access'])&&($_SESSION['access']=='4'))
{
$db=Connect_To_Server();
$db_found=Connect_To_DB();	
$date1 = new DateTime();
$date = $date1->format('Y-m-d');
$time = $date1->format('H:i:s');

$userid= $_POST['id'];
$sentby1 = $_POST['sentby'];
$emailid;
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

//5. close connection

mysql_close($db);
}
else 
		{
			$_SESSION['access']=0;
			session_destroy();
			header('location:/sen/Modules/login.php');
			echo "invalid Login";
		}

?>
