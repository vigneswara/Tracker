<?php
	//Start session
	session_start();
	
	include('include/config.php');
	
	$querySelect = "SELECT Login FROM users WHERE id = '".$_SESSION['SESS_MEMBER_ID']."'";
	$resultSelect = mysql_query($querySelect);
	
	$row = mysql_fetch_array($resultSelect);
		
	// Inserts into logging database the login
			
	$username = $row['Login'];
	$date = date('D-m-Y H:i:s');
	$ip = $_SERVER['REMOTE_ADDR'];
	$type = "logout";
			
	$queryInsert = "INSERT INTO logging (username, date, ip, type) VALUES ('$username', '$date', '$ip', '$type')";
	$resultInsert = mysql_query($queryInsert);
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
?>
<!doctype html>
<html>

	<head>
		<meta charset="utf-8"/>
		<meta name="apple-mobile-web-app-capable" content="yes" />
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		
		<title>Logged Out</title>
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link rel="stylesheet" media="all" href="css/less.css"/>		
		<link href='http://fonts.googleapis.com/css?family=Copse' rel='stylesheet' type='text/css'>
		<style>
		.widebg { background: url(images/widebg.jpg) repeat-x top; height:150px; display:block; position:absolute; top:0; left: -400px; width:2000px; }
		#title {color:#fff; text-shadow: 0 0 10px #000}
		</style>
	</head>
<body lang="en">
	
		<!-- Header -->
		<div class="widebg"></div>		
		<div class="head">
			<div id="logo"><a href="index.php"><img src="images/logo.png" alt="" /></a></div>
			<div id="title">My Carbon Footprint</div>
			<span id="beta">Beta v1.0</span>
		</div>
		<div class="divider"></div>	
		
		<!-- Main -->
		<div class="userform" style="text-align:center">
			<p><h4>You have been successfully logged out</h4></p>
			<p>Click here to <a href="login.php">login</a> back.</p>
		</div>

		<div class="divider"></div>
		<!-- Footer -->
		<div class="footer">
			<div id="copy">&copy; 2011 Carbon Footprint Calculator</div>
			<div id="menubot">
				<ul>
					<li><a href="#">Privacy</a></li>
					<li><a href="#">About</a></li>
					<li><a href="#">Contact</a></li>
					<li><a href="#">WWF</a></li>
				</ul>
			</div>
		</div>
	</body>
	
</html>
