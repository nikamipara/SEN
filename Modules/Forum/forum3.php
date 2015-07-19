<html>
	<head>
		<title>Forum </title>
        <link rel="stylesheet" type="text/css" href="style.css">
	</head>
	
	<body>
	<center><h1>Forum</h1></center>
	 <?php
	
	$admin=0;
	if(isset($_SESSION['access'])&& ($_SESSION['access']==4))
	{
	$admin==1;
	 }
	
	 
	
		require_once("config.php");
		$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
		
		if(!$link)
		 {
			die('Failed to connect to server: ' . mysql_error());
		}
		
		$db = mysql_select_db(DB_DATABASE);
		if(!$db) {
			die("Unable to select database");
		}
		
		$qry = "SELECT * FROM forum ";
		$result = mysql_query($qry);
		$countrow=0;
		if($result)
		{	if($admin==1)
				{
					echo "<form action='deleteprocess2.php' method='post'>";
					echo "<input type='hidden' name='lallan' value='top'>";
				}
			
				
				
					
			echo "<table cellspacing='0' class='forumpost' width='800px'>";
			echo"<tbody>";
			
			while($post = mysql_fetch_array($result))
			{	$countrow=$countrow+1;
				echo"<tr class='header'>";
				if($admin==1)
				{
				echo "<td class='picture left'>";
				echo "<input type='checkbox' name='formDoor[]' value='$post[forum_id]'/>";
				echo"</td>";
				}
				echo"<td class='topic starter'>";
echo "<div class='subject'>".$post['subject']."</div><div class='author'>by".$post['name']."-". $post['date'].",".$post['time']."</div></td></tr>";
echo "<tr>";
echo"<td class='left side'>&nbsp;</td>";
echo"<td class='content'>";
echo"<div class='posting'>".$post['post']."</div></td></tr>";
				 
				
				
			}
			echo"</tbody>";
			echo "</table>";
			if($countrow==0)echo "database khaali hai";
		}
		else
		{
			echo "error";
		}
	
	 
			
	if($admin==1 && $countrow!=0)
				{ echo "<input type='submit' value='delete'></form>";}
				
			
	 ?>
	 
<form action=postprocess2.php method="post">
		<center>
        <table>
       
         <tr>
        	<td> Name</td><td><input type="text" name="name" ></td>
			</tr>
             <tr>
			<td>	Subject</td><td><input type="text" name="subject"></td>
		</tr>
             <tr>
			<td> Post</td><td> <textarea rows="4" cols="23" name="post"></textarea></td>
			</tr>
            <?php echo "<input type='hidden' name='lallan' value='top'>";
			?>
            <tr>
		   <td> <input type="submit" value='post'></td>
			</tr>
            </center>
            
            </table>
             </form>
	</body>
</html>
