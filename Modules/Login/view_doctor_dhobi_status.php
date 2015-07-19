<?php

		$db_handle=Connect_To_Server();
		$db_found=Connect_To_DB();
		view_dhobi();
		view_doctor();
		Close_To_Server($db_handle);
		function Connect_TO_Server()
		{
			$usernamedb="root";
			$passworddb="";
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
		}
		function view_dhobi()
		{
				$SQL_Query="select name from dhobi_status where present='i' limit 1";
				$result=mysql_query($SQL_Query);
				$out=mysql_fetch_assoc($result);
				$name=$out['name'];
				if($name!="")
				{
					echo "Dhobi $name Is Present";
				}
				else
				{
					echo "No Dhobi Is Present";
				}
		}
		function view_doctor()
		{
				$SQL_Query="select count(*) as counter from doctor where present='i' limit 1";
				$result=mysql_query($SQL_Query);
				$out=mysql_fetch_assoc($result);
				$count=$out['counter'];
				if($count>=1)
				{
					echo "Doctor Is Present";
				}
				else
				{
					echo "No Doctor Is Present";
				}
		}
?>