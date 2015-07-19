<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<title>Welcome to DA-IICT Hostel Website</title>
<meta charset="iso-8859-1">
<link rel="stylesheet" href="/sen/Modules/Login/styles/layout.css" type="text/css">
<script src="../Login/jquery.js"></script>
<script>
		  $(document).ready(function(){
				$('#login-trigger').click(function(){
					$(this).next('#login-content').slideToggle();
					$(this).toggleClass('active');					
					
					if ($(this).hasClass('active')) $(this).find('span').html('&#x25B2;')
						else $(this).find('span').html('&#x25BC;')
					})
		  });
	</script>
<!--[if lt IE 9]><script src="scripts/html5shiv.js"></script><![endif]-->
</head>
<body>
<div id="whole">
<div class="wrapper row1">
  <header id="header" class="clear">
    <hgroup>
      <img src="../Login/images/demo/logo.png"></img>
    </hgroup>
    <form action="#" method="post">
      <fieldset>
        <nav>
	<ul>
		<li id="login">
			<a id="login-trigger" href="#">
				Log in <span>&#x25BC;</span>
			</a>
			<div id="login-content">
				<form>
					<fieldset id="inputs">
						<input id="username" name="username" placeholder="Your ID" required>   
						<input id="password" type="password" name="password" placeholder="Password">
					</fieldset>
					<fieldset id="actions">
						<input type="submit" name="SUBMIT1" id="submit" value="Log in">
						<input type="submit" id="password1" name="SUBMIT2" value="Forgot Password">
						<?PHP
							
							require("../Login/phpmailer/class.phpmailer.php");
							require("../Login/phpmailer/class.smtp.php");
							if(isset($_POST['SUBMIT1']))
							{
			
								$username=$_POST['username'];
								$password=$_POST['password'];
								$db_handle=Connect_To_Server();
								$db_found=Connect_To_DB();
								login($username,$password);
								Close_To_Server($db_handle);
							}
							if(isset($_POST['SUBMIT2']))
							{
			
								$username=$_POST['username'];
								$db_handle=Connect_To_Server();
								$db_found=Connect_To_DB();
								forgot_password($username);
								Close_To_Server($db_handle);
							}
						?>
					</fieldset>
				</form>
			</div>                     
		</li>
		<li>
			<a href="http://www.daiict.ac.in">DA-IICT</a>
		</li>
		<li>
			<a href="http://intranet.daiict.ac.in">Intranet</a>
		</li>
	</ul>
</nav>
      </fieldset>
    </form>
  </header>
</div>
<!-- content -->
<div class="wrapper row2">
  <div id="status">
	
  </div>
  <div id="menu_bar">
	<nav>
      <ul>
        <li><a href="/sen/Modules/Login/login.php">Home</a></li>
        <li><a href="/sen/Modules/General/Lost_and_found_general.php">Lost & Found</a></li>
        <li><a href="/sen/Modules/General/snailmail_general.php">Snail Mail</a></li>
        <li><a href="/sen/Modules/General/etic_general.php">ETIC Scheme</a></li>
		<li><a href="/sen/Modules/Forum/Forum_main.php">Forum</a></li>
		<li><a href="/sen/Modules/General/Rules_and_regulations_for_general.php">Rules And Regulations</a></li>
		<li><a href="#">Information<span>&#x25BC;</span></a>
			<ul>
					<li><a href="/sen/Modules/General/passport.php">Passport</a></li>
					<li><a href="/sen/Modules/General/Railway_concession.php">Railway Concession</a></li>
					<li><a href="/sen/Modules/General/First_aid_box.php">First Aid Box</a></li>
					<li><a href="/sen/Modules/General/view_artifect_status.php">Artifact Status</a></li>
					<li><a href="/sen/Modules/General/computer_policy.php">Computer Policy</a></li>
					<li><a href="">Facilities</a>
					<ul>
					<li><a href="/sen/Modules/General/General.php">General</a></li>
					<li><a href="/sen/Modules/General/madical.php">Medical</a></li>
					</ul>
					</li>
			</ul>
		</li>
        <li><a href="/sen/modules/Calender/Calender.php" target="_blank">Calender</a></li>
      </ul>
    </nav>
  </div>
  <div id="container" class="clear">
    <!-- content body -->
		<p>
		<br><br><br>
		<section>
		<h2>Contact Us</h2><br>
		
		<table class="nopad">
								<tr valign="top">
									<td>
										<table class="contentpaneopen">
<tr>
		
<table class="contentpaneopen">



<tr>
<td valign="top">
<p align="center">&nbsp;<b><font color="#ff0000" face="verdana,geneva"><span class="editlinktip hasTip"></span></font></b></p><b>Prof. Asim Banerjee<br />
                                                            </b>Warden, HOR-Men,<br />
                                                            Faculty Bunglow - 3,<br />DA-IICT Campus, Gandhinagar<br />
                                                            Gujarat - 382 007, India, <br />
                                                            <i>Telephone:</i> 554 (Off.), 9328888966 (Mob.)<br />
                                                            email: <a href="mailto:
 <script language='JavaScript' type='text/javascript'>
 <!--
 var prefix = '&#109;a' + 'i&#108;' + '&#116;o';
 var path = 'hr' + 'ef' + '=';
 var addy32250 = 'w&#97;rd&#101;n_b&#111;yshr' + '&#64;';
 addy32250 = addy32250 + 'd&#97;&#105;&#105;ct' + '&#46;' + '&#97;c' + '&#46;' + '&#105;n';
 document.write( '<a ' + path + '\'' + prefix + ':' + addy32250 + '\'>' );
 document.write( addy32250 );
 document.write( '<\/a>' );
 //-->\n </script> <script language='JavaScript' type='text/javascript'>
 <!--
 document.write( '<span style=\'display: none;\'>' );
 //-->
 </script>This e-mail address is being protected from spambots. You need JavaScript enabled to view it
 <script language='JavaScript' type='text/javascript'>
 <!--
 document.write( '</' );
 document.write( 'span>' );
 //-->
 </script>" mce_href="mailto:
 <script language='JavaScript' type='text/javascript'>
 <!--
 var prefix = '&#109;a' + 'i&#108;' + '&#116;o';
 var path = 'hr' + 'ef' + '=';
 var addy30050 = 'w&#97;rd&#101;n_b&#111;yshr' + '&#64;';
 addy30050 = addy30050 + 'd&#97;&#105;&#105;ct' + '&#46;' + '&#97;c' + '&#46;' + '&#105;n';
 document.write( '<a ' + path + '\'' + prefix + ':' + addy30050 + '\'>' );
 document.write( addy30050 );
 document.write( '<\/a>' );
 //-->\n </script> <script language='JavaScript' type='text/javascript'>
 <!--
 document.write( '<span style=\'display: none;\'>' );
 //-->
 </script>This e-mail address is being protected from spambots. You need JavaScript enabled to view it
 <script language='JavaScript' type='text/javascript'>
 <!--
 document.write( '</' );
 document.write( 'span>' );
 //-->
 </script>">
 <script language='JavaScript' type='text/javascript'>
 <!--
 var prefix = '&#109;a' + 'i&#108;' + '&#116;o';
 var path = 'hr' + 'ef' + '=';
 var addy61948 = 'w&#97;rd&#101;n_b&#111;yshr' + '&#64;';
 addy61948 = addy61948 + 'd&#97;&#105;&#105;ct' + '&#46;' + '&#97;c' + '&#46;' + '&#105;n';
 document.write( '<a ' + path + '\'' + prefix + ':' + addy61948 + '\'>' );
 document.write( addy61948 );
 document.write( '<\/a>' );
 //-->\n </script> <script language='JavaScript' type='text/javascript'>
 <!--
 document.write( '<span style=\'display: none;\'>' );
 //-->
 </script>This e-mail address is being protected from spambots. You need JavaScript enabled to view it
 <script language='JavaScript' type='text/javascript'>
 <!--
 document.write( '</' );
 document.write( 'span>' );
 //-->
 </script></a><p>&nbsp;</p><p><br /></p><p><b>Prof. P. M. Jat <br />
                                                            </b>Associate Warden, HOR-Men,<br />
                                                            Faculty Bunglow - 2,<br />DA-IICT Campus, Gandhinagar<br />
                                                            Gujarat - 382 007, India, <br />
                                                            <i>Telephone:</i> 541 (Off.)<br />
                                                            email: 
 <script language='JavaScript' type='text/javascript'>
 <!--
 var prefix = '&#109;a' + 'i&#108;' + '&#116;o';
 var path = 'hr' + 'ef' + '=';
 var addy77109 = '&#97;w&#97;rd&#101;n_b&#111;yshr' + '&#64;';
 addy77109 = addy77109 + 'd&#97;&#105;&#105;ct' + '&#46;' + '&#97;c' + '&#46;' + '&#105;n';
 document.write( '<a ' + path + '\'' + prefix + ':' + addy77109 + '\'>' );
 document.write( addy77109 );
 document.write( '<\/a>' );
 //-->\n </script> <script language='JavaScript' type='text/javascript'>
 <!--
 document.write( '<span style=\'display: none;\'>' );
 //-->
 </script>This e-mail address is being protected from spambots. You need JavaScript enabled to view it
 <script language='JavaScript' type='text/javascript'>
 <!--
 document.write( '</' );
 document.write( 'span>' );
 //-->
 </script><a href="mailto:
 <script language='JavaScript' type='text/javascript'>
 <!--
 var prefix = '&#109;a' + 'i&#108;' + '&#116;o';
 var path = 'hr' + 'ef' + '=';
 var addy88842 = 'w&#97;rd&#101;n_b&#111;yshr' + '&#64;';
 addy88842 = addy88842 + 'd&#97;&#105;&#105;ct' + '&#46;' + '&#97;c' + '&#46;' + '&#105;n';
 document.write( '<a ' + path + '\'' + prefix + ':' + addy88842 + '\'>' );
 document.write( addy88842 );
 document.write( '<\/a>' );
 //-->\n </script> <script language='JavaScript' type='text/javascript'>
 <!--
 document.write( '<span style=\'display: none;\'>' );
 //-->
 </script>This e-mail address is being protected from spambots. You need JavaScript enabled to view it
 <script language='JavaScript' type='text/javascript'>
 <!--
 document.write( '</' );
 document.write( 'span>' );
 //-->
 </script>"></a></p><p><br /></p><p><b>Prof. Binita Desai<br />
                                                            </b>Warden, HOR-Women,<br />
                                                            2212, Faculty Block-2,<br />DA-IICT, Gandhinagar,<br />
                                                            Gujarat – 382 007, India,<br />
                                                            <i>Telephone: </i>598 (Off.), 9328721604 (Mob.)<br />
                                                            email: <a href="mailto:
 <script language='JavaScript' type='text/javascript'>
 <!--
 var prefix = '&#109;a' + 'i&#108;' + '&#116;o';
 var path = 'hr' + 'ef' + '=';
 var addy13628 = 'w&#97;rd&#101;n_l&#97;d&#105;&#101;shr' + '&#64;';
 addy13628 = addy13628 + 'd&#97;&#105;&#105;ct' + '&#46;' + '&#97;c' + '&#46;' + '&#105;n';
 document.write( '<a ' + path + '\'' + prefix + ':' + addy13628 + '\'>' );
 document.write( addy13628 );
 document.write( '<\/a>' );
 //-->\n </script> <script language='JavaScript' type='text/javascript'>
 <!--
 document.write( '<span style=\'display: none;\'>' );
 //-->
 </script>This e-mail address is being protected from spambots. You need JavaScript enabled to view it
 <script language='JavaScript' type='text/javascript'>
 <!--
 document.write( '</' );
 document.write( 'span>' );
 //-->
 </script>" mce_href="mailto:
 <script language='JavaScript' type='text/javascript'>
 <!--
 var prefix = '&#109;a' + 'i&#108;' + '&#116;o';
 var path = 'hr' + 'ef' + '=';
 var addy41304 = 'w&#97;rd&#101;n_l&#97;d&#105;&#101;shr' + '&#64;';
 addy41304 = addy41304 + 'd&#97;&#105;&#105;ct' + '&#46;' + '&#97;c' + '&#46;' + '&#105;n';
 document.write( '<a ' + path + '\'' + prefix + ':' + addy41304 + '\'>' );
 document.write( addy41304 );
 document.write( '<\/a>' );
 //-->\n </script> <script language='JavaScript' type='text/javascript'>
 <!--
 document.write( '<span style=\'display: none;\'>' );
 //-->
 </script>This e-mail address is being protected from spambots. You need JavaScript enabled to view it
 <script language='JavaScript' type='text/javascript'>
 <!--
 document.write( '</' );
 document.write( 'span>' );
 //-->
 </script>">
 <script language='JavaScript' type='text/javascript'>
 <!--
 var prefix = '&#109;a' + 'i&#108;' + '&#116;o';
 var path = 'hr' + 'ef' + '=';
 var addy73091 = 'w&#97;rd&#101;n_l&#97;d&#105;&#101;shr' + '&#64;';
 addy73091 = addy73091 + 'd&#97;&#105;&#105;ct' + '&#46;' + '&#97;c' + '&#46;' + '&#105;n';
 document.write( '<a ' + path + '\'' + prefix + ':' + addy73091 + '\'>' );
 document.write( addy73091 );
 document.write( '<\/a>' );
 //-->\n </script> <script language='JavaScript' type='text/javascript'>
 <!--
 document.write( '<span style=\'display: none;\'>' );
 //-->
 </script>This e-mail address is being protected from spambots. You need JavaScript enabled to view it
 <script language='JavaScript' type='text/javascript'>
 <!--
 document.write( '</' );
 document.write( 'span>' );
 //-->
 </script></a></p>
                                                        <br /><p><b>Mr. Jitendra Parmar
                                                                <br />
                                                            </b>Hostel Supervisor, Tel. 544 (Off.)<br />
                                                            email: <a href="mailto:
 <script language='JavaScript' type='text/javascript'>
 <!--
 var prefix = '&#109;a' + 'i&#108;' + '&#116;o';
 var path = 'hr' + 'ef' + '=';
 var addy58909 = 'h&#111;st&#101;l_s&#117;p&#101;rv&#105;s&#111;r' + '&#64;';
 addy58909 = addy58909 + 'd&#97;&#105;&#105;ct' + '&#46;' + '&#97;c' + '&#46;' + '&#105;n';
 document.write( '<a ' + path + '\'' + prefix + ':' + addy58909 + '\'>' );
 document.write( addy58909 );
 document.write( '<\/a>' );
 //-->\n </script> <script language='JavaScript' type='text/javascript'>
 <!--
 document.write( '<span style=\'display: none;\'>' );
 //-->
 </script>This e-mail address is being protected from spambots. You need JavaScript enabled to view it
 <script language='JavaScript' type='text/javascript'>
 <!--
 document.write( '</' );
 document.write( 'span>' );
 //-->
 </script>" mce_href="mailto:
 <script language='JavaScript' type='text/javascript'>
 <!--
 var prefix = '&#109;a' + 'i&#108;' + '&#116;o';
 var path = 'hr' + 'ef' + '=';
 var addy96716 = 'h&#111;st&#101;l_s&#117;p&#101;rv&#105;s&#111;r' + '&#64;';
 addy96716 = addy96716 + 'd&#97;&#105;&#105;ct' + '&#46;' + '&#97;c' + '&#46;' + '&#105;n';
 document.write( '<a ' + path + '\'' + prefix + ':' + addy96716 + '\'>' );
 document.write( addy96716 );
 document.write( '<\/a>' );
 //-->\n </script> <script language='JavaScript' type='text/javascript'>
 <!--
 document.write( '<span style=\'display: none;\'>' );
 //-->
 </script>This e-mail address is being protected from spambots. You need JavaScript enabled to view it
 <script language='JavaScript' type='text/javascript'>
 <!--
 document.write( '</' );
 document.write( 'span>' );
 //-->
 </script>">
 <script language='JavaScript' type='text/javascript'>
 <!--
 var prefix = '&#109;a' + 'i&#108;' + '&#116;o';
 var path = 'hr' + 'ef' + '=';
 var addy27985 = 'h&#111;st&#101;l_s&#117;p&#101;rv&#105;s&#111;r' + '&#64;';
 addy27985 = addy27985 + 'd&#97;&#105;&#105;ct' + '&#46;' + '&#97;c' + '&#46;' + '&#105;n';
 document.write( '<a ' + path + '\'' + prefix + ':' + addy27985 + '\'>' );
 document.write( addy27985 );
 document.write( '<\/a>' );
 //-->\n </script> <script language='JavaScript' type='text/javascript'>
 <!--
 document.write( '<span style=\'display: none;\'>' );
 //-->
 </script>This e-mail address is being protected from spambots. You need JavaScript enabled to view it
 <script language='JavaScript' type='text/javascript'>
 <!--
 document.write( '</' );
 document.write( 'span>' );
 //-->
 </script></a></p>
                                                        <p><b><br /></b></p><p><b>Mr. Hasendrasinh Jhala<br />
                                                            </b>Head- HR &amp; Administration<br />
                                                            <i>Telephone:</i> 591 (Off.), 9327043615 (Mob.)<br />
                                                            email: <a href="mailto:
 <script language='JavaScript' type='text/javascript'>
 <!--
 var prefix = '&#109;a' + 'i&#108;' + '&#116;o';
 var path = 'hr' + 'ef' + '=';
 var addy1841 = 'h&#97;s&#101;ndr&#97;s&#105;nh_jh&#97;l&#97;' + '&#64;';
 addy1841 = addy1841 + 'd&#97;&#105;&#105;ct' + '&#46;' + '&#97;c' + '&#46;' + '&#105;n';
 document.write( '<a ' + path + '\'' + prefix + ':' + addy1841 + '\'>' );
 document.write( addy1841 );
 document.write( '<\/a>' );
 //-->\n </script> <script language='JavaScript' type='text/javascript'>
 <!--
 document.write( '<span style=\'display: none;\'>' );
 //-->
 </script>This e-mail address is being protected from spambots. You need JavaScript enabled to view it
 <script language='JavaScript' type='text/javascript'>
 <!--
 document.write( '</' );
 document.write( 'span>' );
 //-->
 </script>" mce_href="mailto:
 <script language='JavaScript' type='text/javascript'>
 <!--
 var prefix = '&#109;a' + 'i&#108;' + '&#116;o';
 var path = 'hr' + 'ef' + '=';
 var addy64768 = 'h&#97;s&#101;ndr&#97;s&#105;nh_jh&#97;l&#97;' + '&#64;';
 addy64768 = addy64768 + 'd&#97;&#105;&#105;ct' + '&#46;' + '&#97;c' + '&#46;' + '&#105;n';
 document.write( '<a ' + path + '\'' + prefix + ':' + addy64768 + '\'>' );
 document.write( addy64768 );
 document.write( '<\/a>' );
 //-->\n </script> <script language='JavaScript' type='text/javascript'>
 <!--
 document.write( '<span style=\'display: none;\'>' );
 //-->
 </script>This e-mail address is being protected from spambots. You need JavaScript enabled to view it
 <script language='JavaScript' type='text/javascript'>
 <!--
 document.write( '</' );
 document.write( 'span>' );
 //-->
 </script>">
 <script language='JavaScript' type='text/javascript'>
 <!--
 var prefix = '&#109;a' + 'i&#108;' + '&#116;o';
 var path = 'hr' + 'ef' + '=';
 var addy45204 = 'h&#97;s&#101;ndr&#97;s&#105;nh_jh&#97;l&#97;' + '&#64;';
 addy45204 = addy45204 + 'd&#97;&#105;&#105;ct' + '&#46;' + '&#97;c' + '&#46;' + '&#105;n';
 document.write( '<a ' + path + '\'' + prefix + ':' + addy45204 + '\'>' );
 document.write( addy45204 );
 document.write( '<\/a>' );
 //-->\n </script> <script language='JavaScript' type='text/javascript'>
 <!--
 document.write( '<span style=\'display: none;\'>' );
 //-->
 </script>This e-mail address is being protected from spambots. You need JavaScript enabled to view it
 <script language='JavaScript' type='text/javascript'>
 <!--
 document.write( '</' );
 document.write( 'span>' );
 //-->
 </script></a></p>
                                                        <p><b><br /></b></p><p><b>Mr. Rajesh Patel<br />
                                                            </b>Electrical Engineer<br />
                                                            <i>Telephone:</i> 622 (Off.), 9328721608 (Mob.)<br />
                                                            email: 
 <script language='JavaScript' type='text/javascript'>
 <!--
 var prefix = '&#109;a' + 'i&#108;' + '&#116;o';
 var path = 'hr' + 'ef' + '=';
 var addy38521 = 'r&#97;j&#101;sh_p&#97;t&#101;l' + '&#64;';
 addy38521 = addy38521 + 'd&#97;&#105;&#105;ct' + '&#46;' + '&#97;c' + '&#46;' + '&#105;n';
 document.write( '<a ' + path + '\'' + prefix + ':' + addy38521 + '\'>' );
 document.write( addy38521 );
 document.write( '<\/a>' );
 //-->\n </script> <script language='JavaScript' type='text/javascript'>
 <!--
 document.write( '<span style=\'display: none;\'>' );
 //-->
 </script>This e-mail address is being protected from spambots. You need JavaScript enabled to view it
 <script language='JavaScript' type='text/javascript'>
 <!--
 document.write( '</' );
 document.write( 'span>' );
 //-->
 </script></p>
                                                        <p><b><br /></b></p><p><b>Mr. Nimesh B. Patel<br />
                                                            </b>Systems Engineer<br />
                                                            <i>Telephone:</i> 520 (Off.), 9328721597 (Mob.)<br />
                                                            email: 
 <script language='JavaScript' type='text/javascript'>
 <!--
 var prefix = '&#109;a' + 'i&#108;' + '&#116;o';
 var path = 'hr' + 'ef' + '=';
 var addy84356 = 'sys&#97;dm&#105;n' + '&#64;';
 addy84356 = addy84356 + 'd&#97;&#105;&#105;ct' + '&#46;' + '&#97;c' + '&#46;' + '&#105;n';
 document.write( '<a ' + path + '\'' + prefix + ':' + addy84356 + '\'>' );
 document.write( addy84356 );
 document.write( '<\/a>' );
 //-->\n </script> <script language='JavaScript' type='text/javascript'>
 <!--
 document.write( '<span style=\'display: none;\'>' );
 //-->
 </script>This e-mail address is being protected from spambots. You need JavaScript enabled to view it
 <script language='JavaScript' type='text/javascript'>
 <!--
 document.write( '</' );
 document.write( 'span>' );
 //-->
 </script><br /></p>
                                                        <p><b><br /></b></p><p><b>Mr. Kirit Pandya<br />
                                                            </b>Administrative Assistant<br />
                                                            Tel. 592 (Off.), 9327043616 (Mob.)<br />
                                                            email: <a href="mailto:
 <script language='JavaScript' type='text/javascript'>
 <!--
 var prefix = '&#109;a' + 'i&#108;' + '&#116;o';
 var path = 'hr' + 'ef' + '=';
 var addy84571 = 'k&#105;r&#105;t_p&#97;ndy&#97;' + '&#64;';
 addy84571 = addy84571 + 'd&#97;-&#105;&#105;ct' + '&#46;' + '&#111;rg';
 document.write( '<a ' + path + '\'' + prefix + ':' + addy84571 + '\'>' );
 document.write( addy84571 );
 document.write( '<\/a>' );
 //-->\n </script> <script language='JavaScript' type='text/javascript'>
 <!--
 document.write( '<span style=\'display: none;\'>' );
 //-->
 </script>This e-mail address is being protected from spambots. You need JavaScript enabled to view it
 <script language='JavaScript' type='text/javascript'>
 <!--
 document.write( '</' );
 document.write( 'span>' );
 //-->
 </script>" mce_href="mailto:
 <script language='JavaScript' type='text/javascript'>
 <!--
 var prefix = '&#109;a' + 'i&#108;' + '&#116;o';
 var path = 'hr' + 'ef' + '=';
 var addy63333 = 'k&#105;r&#105;t_p&#97;ndy&#97;' + '&#64;';
 addy63333 = addy63333 + 'd&#97;-&#105;&#105;ct' + '&#46;' + '&#111;rg';
 document.write( '<a ' + path + '\'' + prefix + ':' + addy63333 + '\'>' );
 document.write( addy63333 );
 document.write( '<\/a>' );
 //-->\n </script> <script language='JavaScript' type='text/javascript'>
 <!--
 document.write( '<span style=\'display: none;\'>' );
 //-->
 </script>This e-mail address is being protected from spambots. You need JavaScript enabled to view it
 <script language='JavaScript' type='text/javascript'>
 <!--
 document.write( '</' );
 document.write( 'span>' );
 //-->
 </script>">
 <script language='JavaScript' type='text/javascript'>
 <!--
 var prefix = '&#109;a' + 'i&#108;' + '&#116;o';
 var path = 'hr' + 'ef' + '=';
 var addy32903 = 'k&#105;r&#105;t_p&#97;ndy&#97;' + '&#64;';
 addy32903 = addy32903 + 'd&#97;&#105;&#105;ct' + '&#46;' + '&#97;c' + '&#46;' + '&#105;n';
 document.write( '<a ' + path + '\'' + prefix + ':' + addy32903 + '\'>' );
 document.write( addy32903 );
 document.write( '<\/a>' );
 //-->\n </script> <script language='JavaScript' type='text/javascript'>
 <!--
 document.write( '<span style=\'display: none;\'>' );
 //-->
 </script>This e-mail address is being protected from spambots. You need JavaScript enabled to view it
 <script language='JavaScript' type='text/javascript'>
 <!--
 document.write( '</' );
 document.write( 'span>' );
 //-->
 </script></a></p>
                                                        <p><b><br /></b></p><p><b>Mr. Kishore Singh Zala<br />
                                                            </b>Electrician<br />
                                                            Telephone: 668 (Off.), 9374726501 (Mob.) <br /></p>

</td>
</tr>

</table>
<span class="article_separator">&nbsp;</span>

										
									</td>
																	</tr>
							</table>
<br><br>
		</section>
		</p>
    <!-- main content -->
    <div id="homepage">
      
      <!-- / Two Third -->
    </div>
    <!-- / content body -->
  </div>
</div>
</div>
<!-- Footer -->
<div class="wrapper row3">
  <footer id="footer" class="clear">
    <p class="fl_left">Copyright &copy; DA-IICT, Near Indroda Circle, Gandhinagar - 382 007, Gujarat, India. All rights reserved.</a></p>
    <p class="fl_right">Created by SEN Group 21, B.Tech 2010</p>
  </footer>
</div>
</body>
</html>
<?PHP
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
			echo nl2br("\n");
		}
		function Close_To_Server($db_handle)
		{
			mysql_close($db_handle);
		}
		function login($username,$password)
		{
			$SQL_Query="select * from login";
			$result_query=mysql_query($SQL_Query);
			
			
			$flag1=1;
			while($out=mysql_fetch_assoc($result_query))
			{
				if($username==$out['login_id'])
				{
					$flag1=0;
					if($password==$out['password'])
					{
						
						echo nl2br("\n");
						echo "hi ";
						echo nl2br("\n");
						session_start();
						$_SESSION['access']=$out['priority'];
						$_SESSION['login_id']=$out['login_id'];
						
						if($out['priority']==6)
						{
							header('location:/sen/Modules/Links_temp/doctor_links.php');
						}
						else if($out['priority']==5)
						{
							header('location:/sen/Modules/Links_temp/guard_links.php');
						}
						else if($out['priority']==4)
						{
							header('location:/sen/Modules/Links_temp/admin_links_1.php');
						}
						else if($out['priority']==3)
						{
							header('location:/sen/Modules/Links_temp/hmc_convener_links.php');
						}
						else if($out['priority']==2)
						{
							header('location:/sen/Modules/Links_temp/hmc_links.php');
						}
						else if($out['priority']==1)
						{
							header('location:/sen/Modules/Links_temp/resident_links_1.php');
						}
					}
					else 
					{
						echo "Incorrect Password";
					}
				}
			}
			
			if($flag1==1)
			{
				echo "incorrect username";
			}
			
		}
		function forgot_password($password)
		{	
			$mail = new PHPMailer(); 
			$mail->IsSMTP(); // send via SMTP
			$mail->SMTPAuth = true; // turn on SMTP authentication
			$mail->Username = "daiicthor@gmail.com"; // SMTP username
			$mail->Password = "horofdaiict"; // SMTP password
			$mail->SMTPKeepAlive = true;                  // SMTP connection will not close after each email sent
			$webmaster_email = "da_hostel@daiict.ac.in"; 				//Reply to this email ID
			$webmaster_name="admin";

			$mail->From = $webmaster_email;

			$mail->FromName = $webmaster_name;

			$mail->AddReplyTo($webmaster_email,$webmaster_name);

														
			$mail->IsHTML(true); // send as HTML
			

			$mail->WordWrap = 50; // set word wrap									//only suportsmax 500 users

																					//$mail->AddAttachment("/var/tmp/file.tar.gz"); // attachment

																					//$mail->AddAttachment("/tmp/image.jpg", "new.jpg"); // attachment
			$SQL_Query="select email,password,name from login natural join residents where login_id='$username'";
			$result_query=mysql_query($SQL_Query);
			$out=mysql_fetch_assoc($result);
			if($out['email']=="")
			{
				echo "Your Username was not found";
			}
			else
			{
			
				$password=$out['password'];
				$mail->Subject ='Password of Hostel Management Website at DAIICT' ;
				$mail->Body = "Your Password is $password "; 										//HTML Body
				$mail->AddAddress($out['password'],$out['name']);
				if(!$mail->Send())
				{
					echo "Mailer Error: " . $mail->ErrorInfo;
				}
				else
				{
					echo "An email has been sent to your registered email id";
				}
			}
}
?>