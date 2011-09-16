<?php
	// Connect to the database =========================================================
	# Type="MYSQL"
	# HTTP="true"
	$hostname = "localhost";
	$database = "it_track";
	$dbusername = "admin";
	$dbpassword = "password";
	/*
	$database = "bluecar_mycfc";
	$dbusername = "bluecar_admin";
	$dbpassword = "n0br4c3ulb";
	*/

	$conn = mysql_pconnect("$hostname", "$dbusername", "$dbpassword") or die(mysql_error());
	mysql_select_db($database, $conn) or die(mysql_error());
	// =================================================================================
?>