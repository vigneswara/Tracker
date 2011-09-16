<?php
	require_once('auth.php');
	include('include/config.php');
	// Get User Information
	$querySelect = "SELECT name, date FROM users WHERE id = '".$_SESSION['SESS_MEMBER_ID']."'";
	$resultSelect = mysql_query($querySelect);
	$row = mysql_fetch_array($resultSelect);
	$name = $row['name'];
	$rawdate = $row['date'];
	$joindate=date('d-m-y',strtotime($rawdate));
	$uid = $_SESSION['SESS_MEMBER_ID'];

?>
<div>Hello World!</div>
<div>
<a href="itemregistration.php">Register New Item</a> || <a href="viewall.php">View All Items</a>
</div>

