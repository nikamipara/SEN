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
	<marquee behavior="scroll" direction="left" scrollamount="20"><?php
		//require_once('db.php');
		$db_handle=Connect_To_Server();
		$db_found=Connect_To_DB();
		view_dhobi();
		echo " And ";
		view_doctor();
		Close_To_Server($db_handle);
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
?></marquee>
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
		<h2>Welcome</h2><br>
                <table class="contentpaneopen">
                
                
                
                <tr>
                <td valign="top">
                <div style="TEXT-ALIGN: center"><big><big>Rules and Regulations: Halls of Residence</big></big><br /></div>
                <ol>
                <li><span style="FONT-WEIGHT: bold">ALLOCATION</span>:</li>
                <ol>
                <li>The Management reserves the right to allot and also to take away the room.</li>
                <li>The allotment will only be made to a student of DA-IICT.</li>
                <li>The resident has to vacate the room within five days of his/her ceasing to be the student of DA-IICT.</li></ol></ol>
                <ol start="2" width="80%">
                <li><span style="FONT-WEIGHT: bold">BEHAVIOR AND DISCIPLINE</span>: 
                <ol>
                <li>The Residents must ensure peace and tranquility within the Halls of Residence area such that they do not cause disturbance to other Residents.</li>
                <li>The Residents will behave as per the social ethics and respect the privacy of others at all the time. No noisy music disrupting peace and quiet. Boys will avoid unwanted attention seeking behaviors towards girls that can constitute ‘harassment’</li>
                <li>Consumption of alcoholic drinks, smoking, usages of any form of intoxicating materials and all forms of gambling in the Halls of Residence are strictly prohibited. In any case, prohibition is enforced in the state of Gujarat. Any person found guilty of the same, would face strict disciplinary action (minimum is expulsion from the Halls of Residence).</li>
                <li>Residents of Halls of Residence are expected to return to the campus by midnight. Girls must return to the Ladies HoR by midnight. If a resident is required to stay beyond these hours, a special permission has to be sought through email, at least 24 hours in advance, from the respective warden.</li>
                <li>It is the responsibility of the Residents to keep the Hostel Supervisor informed if they intend to stays away from the Halls of Residence (even if it is for one night). However, if the absence includes missing of the academic curriculum, then specific permission must be obtained from Dean Academic Program.</li>
                <li>A Halls of Residence Accommodation is a place where students are expected to study and have adequate rest. As such, due consideration must be accorded to other inmates at all times. This would be implemented by keeping the volume of radios & hi-fi sets low and also during parties/other social gatherings in the wings if and when permitted by Wardens.  In case of complaints from other residents, suitable disciplinary action will be taken.</li>
                <li>Males will not be allowed to visit the designated Ladies` Wings and Females are also not allowed to visit designated Men`s Wings.</li>
                <li>Residents are not permitted to change rooms or exchange any of the Halls of Residence property without informing the Hostel Supervisor and seeking the approval of the Halls of Residence Authorities.  This is a punishable offence and you will be asked to return to your officially allotted room immediately and you are likely to face rigorous fine. Residents must get the approval from the Warden to shift their room officially.  Official shifting of rooms will be permitted.</li>
                <ol type="i">
                <li>for genuine reasons (upto warden’s discretion) only.</li>
                <li>only during the summer and winter vacations.</li></ol>
                <li>Ragging of any nature is strictly prohibited. Ragging is a punishable offence under Central Government Act. Violation of this rule will attract any one or more of following possible punishments depends on the seriousness of the issue:-</li>
                <ol type="i">
                <li>One year suspension from the institute</li>
                <li>A fine up to Rs. 2500/-</li>
                <li>Expulsion from the institute.</li>
                <li>suspension from the institute or classes for a limited period</li>
                <li>fine with a public apology.</li>
                <li>withholding scholarships or other benefits.</li>
                <li>debarring from representation in events.</li>
                <li>withhold results.</li>
                <li>suspension or expulsion from Halls of Residence.</li></ol>
                <li>Outside the rooms, the Residents will not be dressed in a manner that would offend anyone within or outside the Complex.</li>
                <li>Residents will not use loud abusive or offensive or inciting language while conveying their view points.</li>
                <li>Residents and visitors are not permitted to sit on parapet or railings or stair cases or any unsafe area.</li>
                <li>Parking of vehicle should be done in authorized parking areas. If any vehicle found at a place other than authorized parking, the owner would be fined a minimum fine of Rs.500/-.</li>
                <li>Inside the room, cheap posters displaying vulgarity will not be permitted on the walls or elsewhere in the room.</li>
                <li>Non-residents of Halls of Residence must not give the Halls of Residence address for their posts.  Residents must check the Snail Mail link at this website everyday.  Mails which are older than 10 days will be disposed by the Hostel Supervisor.</li>
                <li>A minimum fine of Rs. 500/- per day would be charged to both the occupants, if anyone stays in a residents’ room without the warden’s permission  or informing the Hostel Supervisor. This is in addition to the guest charge of Rs. 100 per day.</li>
                <li>All electrical switches and gadgets must be switched off while leaving the rooms.</li>
                <li>Drying clothes on the room window and staircase railing is strictly prohibited. Drying of clothes should be done at the place designated for the same, e.g. clotheslines provided in the designated areas.</li>
                <li>Residents are not allowed to bring food plates inside the Halls of Residence. If any student (need not be a HMC member), Hostel Supervisor or any administrative authority finds a student carrying a plate inside the Halls of Residence, he will be questioned and if found violating the rule, he will be fined an amount of Rs. 500. This amount should be paid within 72 hours to the Hostel Supervisor and the receipt for the same should be collected from the Supervisor.  If the student fails to pay the penalty within the stipulated time, the warden will forward this case to the Disciplinary Committee for appropriate disciplinary action.</li>
                <li>A sick student (certified by doctor) can get food in the room. To bring food for a sick student, either the sick student or his friends must (intimate) send an email to 
                 <script language='JavaScript' type='text/javascript'>
                 <!--
                 var prefix = '&#109;a' + 'i&#108;' + '&#116;o';
                 var path = 'hr' + 'ef' + '=';
                 var addy90398 = 'h&#111;st&#101;l_s&#117;p&#101;rv&#105;s&#111;r' + '&#64;';
                 addy90398 = addy90398 + 'd&#97;&#105;&#105;ct' + '&#46;' + '&#97;c' + '&#46;' + '&#105;n';
                 document.write( '<a ' + path + '\'' + prefix + ':' + addy90398 + '\'>' );
                 document.write( addy90398 );
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
                 </script> with copy to <a href="/
                 <script language='JavaScript' type='text/javascript'>
                 <!--
                 var prefix = '&#109;a' + 'i&#108;' + '&#116;o';
                 var path = 'hr' + 'ef' + '=';
                 var addy31427 = 'w&#97;rd&#101;n_b&#111;yshr' + '&#64;';
                 addy31427 = addy31427 + 'd&#97;&#105;&#105;ct' + '&#46;' + '&#97;c' + '&#46;' + '&#105;n';
                 document.write( '<a ' + path + '\'' + prefix + ':' + addy31427 + '\'>' );
                 document.write( addy31427 );
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
                 var addy49446 = 'w&#97;rd&#101;n_b&#111;yshr' + '&#64;';
                 addy49446 = addy49446 + 'd&#97;&#105;&#105;ct' + '&#46;' + '&#97;c' + '&#46;' + '&#105;n';
                 document.write( '<a ' + path + '\'' + prefix + ':' + addy49446 + '\'>' );
                 document.write( addy49446 );
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
                 </script></a> and <a href="/
                 <script language='JavaScript' type='text/javascript'>
                 <!--
                 var prefix = '&#109;a' + 'i&#108;' + '&#116;o';
                 var path = 'hr' + 'ef' + '=';
                 var addy63023 = 'c&#97;f&#101;t&#101;r&#105;&#97;_c&#111;mm&#105;tt&#101;&#101;' + '&#64;';
                 addy63023 = addy63023 + 'd&#97;&#105;&#105;ct' + '&#46;' + '&#97;c' + '&#46;' + '&#105;n';
                 document.write( '<a ' + path + '\'' + prefix + ':' + addy63023 + '\'>' );
                 document.write( addy63023 );
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
                 var addy37317 = 'c&#97;f&#101;t&#101;r&#105;&#97;_c&#111;mm&#105;tt&#101;&#101;' + '&#64;';
                 addy37317 = addy37317 + 'd&#97;&#105;&#105;ct' + '&#46;' + '&#97;c' + '&#46;' + '&#105;n';
                 document.write( '<a ' + path + '\'' + prefix + ':' + addy37317 + '\'>' );
                 document.write( addy37317 );
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
                 </script></a></li>
                <li>Residents are permitted to use computers (provided they are allowed to do so as per the Rules governing the usage of the same), table Lamps, and Audio Systems. Hostel Supervisor should be informed in writing if a resident wishes to keep any of these items in the room. </li>
                <li>Computers are to be registered with Hostel Supervisor and a permanent gate pass is to be acquired for taking it out and in of the campus as may be required so. <a href="/index.php?option=com_content&amp;view=article&amp;id=28&amp;Itemid=74" mce_href="/index.php?option=com_content&amp;view=article&amp;id=28&amp;Itemid=74">...more details</a>.</li>
                <li>For obtaining Intranet connectivity, the resident has to apply for same to the Hostel Supervisor. Initially Hostel Supervisor will provide the data patch chord and charge Rs 50 as refundable deposit (will be refunded with the caution deposit).</li>
                <li>Use of high power consuming electrical equipment is STRICTLY PROHIBITED. These include irons, heaters, ovens, refrigerators, TV, Kettles and the like.  It’s against the rule as well as highly dangerous to keep such gadgets in your room. Any resident having the same in his/her room would be severely punished with a minimum of expulsion from the Halls of Residence.</li>
                <li>No cooking is permitted in the Halls of Residence.</li>
                <li>Residents are NOT allowed to transfer any furniture from one room to another.</li></ol></li></ol>
                <ol start="3">
                <li><span style="FONT-WEIGHT: bold">MAINTENANCE OF HALLS OF RESIDENCE:</span></li>
                <ol>
                <li>Residents are individually responsible for keeping their rooms, bath rooms/toilets neat and clean. The common areas too must be kept clean and tidy at all times and residents should avoid littering the place and instead use the dustbins for the same. The Institute/Halls of Residence will undertake the housekeeping of common areas only.</li>
                <li>Residents will be responsible for adhering to the electricity, water etc. conservation plans announced from time to time. Any misuse observed or detected will result in an imposition of appropriate fine, as prescribed from time to time. This may be for the whole floor of the affected wing(s). This would be deducted from the advance paid by the residents or from the caution deposit.</li>
                <li>The HMC members of the respective floors/wings or the Hostel Supervisor should be informed by the students through emails or personally for problems pertaining to water, electricity, furniture and the like.  If the problems remain unsolved for reasonably long time, the students can escalate the matter by reporting it to the respective wardens.</li>
                <li>Any damage to Halls of Residence property must be reported immediately to the Hostel Supervisor. The residents will be charged for all willful damages either on detection or while vacating the room.</li>
                <li>The Institute reserves the right to make spot checks of the rooms without prior notice to the students. Every effort will be made to respect the privacy and dignity of the residents.</li>
                <li>Drilling and other civil works, which may alter the structure of the Halls of Residence, are strictly prohibited.</li>
                <li>All rooms will have their own fixed inventory; copy of the same will be handed over to the occupant who will be responsible for their maintenance in good condition.</li>
                <li>No private items of furniture are allowed in the Halls of Residence. However students may bring their personal furniture, if advised by a doctor, by producing medical certificate to the Hostel Supervisor and obtaining written permission from the respective Halls of Residence Wardens.</li>
                <li>The residents are expected to bring mattress, pillow, linen and personal clothing. </li>
                <li>The residents of the Halls of Residence, through the Hostel Management Committee (HMC) report any maintenance related issue to the Halls of Residence authorities.</li></ol></ol>
                <ol start="4">
                <li><span style="FONT-WEIGHT: bold">VISITORS</span>:</li>
                <ol>
                <li>Visitors are allowed into the Halls of Residence Complex between 8.00 am to 10.00 p.m. only. Male visitors are not allowed in Girls’ Halls of Residence and female visitors are not allowed in boys’ Halls of Residence. </li>
                <li>Guest Room in both Halls of Residences will be available only for medical emergencies. To avail of this facility:</li>
                <ol>
                <li>the students must get the permission from the respective wardens for their guests to stay in the Halls of Residence preferably during office hours.</li>
                <li>the rent should be paid in advance (Rs. 100 per person per day) to the Hostel Supervisor and the respective warden must be informed about it.</li></ol>
                <li>Any resident found entertaining a visitor without prior intimation or booking will be liable to be fined a minimum of Rs. 500/- in addition to the guest charge for the duration of stay.</li>
                <li>Parents and Guardians wishing to visit at other times should obtain special permission from Halls of Residence warden.</li>
                <li>Visitors are not allowed to stay overnight in the Halls of Residence except when specific accommodation is made available to them at prepaid guest charge of Rs.100/- per night per person.  If a resident entertains a visitor to stay overnight without permission, then he/she will be fined a minimum of Rs. 500 + Rs. 100 per day of violation of rule.</li>
                <li>All students who are non-resident of Halls of Residence must-</li>
                <ol>
                <li>inform the Hostel Supervisor first for registration.</li>
                <li>mention the exact period of stay</li>
                <li>pay Rs. 60 towards rent per day during their stay.</li></ol>
                <li>A copy of the list of temporary residents of the Halls of Residence will be given to the Security Supervisor for monitoring purpose. </li>
                <li>The Security personnel will report to the Hostel Supervisor/Wardens if he finds some students staying beyond the registered time.</li>
                <li>Rooms for temporary stay will be provided based on the availability.</li>
                <li>Once a student is permitted to stay for a short-period, the student will become the temporary resident of the Halls of Residence and hence must follow all the rules and regulations of the Halls of Residence applicable to other residents.</li></ol></ol>
                <ol start="5">
                <li><span style="FONT-WEIGHT: bold">SECURITY:</span></li>
                <ol>
                <li>The Institute is NOT RESPONSIBLE FOR ANY LOSS OR DAMAGE OF PERSONAL PROPERTY of any kind.<br /></li>
                <li>Student must keep their belongings in lock and key, and lock their room before leaving.<br /></li>
                <li>Residents must avoid keeping any valuables in Halls of Residence, like gold ornaments, large amount of Cash, etc.<br /></li>
                <li>Any Student, who finds his/her room mate(s) missing during the night, must intimate details of such missing student to the Hostel Supervisor/Wardens.</li>
                <li>Each Resident will be given one key to his / her room. In case of loss of the original key a fine of Rs. 200/- will be charged along with the cost of a new lock.</li>
                <li>The residents must not use their own locks.</li>
                <li>In case of any damage to the provided lock, the resident must inform about it to hostel supervisor and should get new lock issued by paying a fine of Rs. 200/- along with the cost of a new lock..</li>
                <li>If a resident fails to inform the Hostel Supervisor about it and found using his/her own lock, (s)he would be charged a fine of Rs. 1000. If both room mates are responsible then fined would Rs.500/- each.</li>
                <li>Residents must update their profile (like phone numbers and addresses of parents and guardian) whenever there is a change in the same.</li>
                <li>Residents must ensure that their photographs have been uploaded on SRS.</li></ol></ol>
                <ol start="6">
                <li><span style="FONT-WEIGHT: bold">PETS:</span></li>
                <ol>
                <li>NO PETS are allowed in the Halls of Residence room. </li>
                <li>Residents must not encourage stray cats/dogs. They should inform security guard in case they find any.</li></ol></ol>
                <ol start="7">
                <li><span style="FONT-WEIGHT: bold">HALLS OF RESIDENCE CHARGES</span>:</li>
                <ol type="1">
                <li>With effective from academic year 2006 – 2007, Halls of Residence charges are as under:</li>
                <ol type="A">
                <li>Halls of Residence Rent:</li>
                <ol type="a">
                <li>For BTech/MTech/MSc-IT/MSc-IT-ARD students:</li>
                <ol type="i">
                <li>Autumn Semester : Rs. 7000.00<br />Mid-July to 31st December for fresh batch of students<br />1st July to 31st December for other regular students<br /></li>
                <li>Winter Semester : Rs. 7000.00<br />1st January to 30th June<br /></li></ol>
                <li>For PhD students/Research Engineers/Research Associates:</li>
                <ol type="i">
                <li>Autumn Semester: Rs. 8000.00<br />Mid-July to 31st December for fresh batch of students<br />1st July to 31st December for other regular students<br /></li>
                <li>Winter Semester: Rs. 8000.00<br />1st January to 30th June<br /></li></ol></ol>
                <li>Electricity : As per the actual consumption.</li></ol>
                <li>As Halls of Residence accommodation is compulsory for all BTech students, they will have to pay the Halls of Residence rent and electricity bill (of the previous semester) at the time of registration.</li>
                <li>Normally students will not have to vacate the Halls of Residence during vacations/breaks (except for final year students who will vacate by June 30).  However, the Institute reserves the right to ask you to vacate your room during vacations/breaks if required. The list of rooms selected by the Institute to vacate during vacations/breaks will be announced by the respective wardens. </li></ol>
                <ol></ol></ol>
                <ol start="8">
                <li><span style="FONT-WEIGHT: bold">HOSTEL MANAGEMENT:</span></li>
                <ol>
                <li>The Hostel Management Committee (HMC) reserves the right to revise the Rules and Regulations from time to time and will keep the residents informed of any changes.</li>
                <li>The students found violating any of the Halls of Residence rules will be referred to Disciplinary Committee for appropriate punitive action and those involved in serious breaches may even be asked to leave the Halls of Residence within 24 hours.</li>
                <li>All problems/complaints of common/general nature will be referred to the Halls of Residence authorities through the student representatives.</li>
                <li>Annual election will be held for floor representatives who in turn will form sub-committees to monitor and assist in smooth management of the Halls of Residence.</li>
                <li>Sub-committees of student representatives. The elected student members representing the floor form various sub-committees, e.g. finance, discipline, environment, festival celebrations, sports and the like. These sub-committees strive to improve the environment and make the Halls of Residence a better living place and a peaceful environment for students to study and relax. The residents are encouraged to use this forum to express any difficulties.</li>
                <li>The Hostel Management Council (HMC) comprises of:</li>
                <ol type="i">
                <li>Dean of Student Affairs</li>
                <li>Wardens & Associate Wardens</li>
                <li>Hostel Supervisor</li>
                <li>Electrical Maintenance Engineer</li>
                <li>Elected student representatives<br /> <br /></li></ol></ol></ol>
                
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