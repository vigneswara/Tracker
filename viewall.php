<?php
	require_once('auth.php');
	include('include/config.php');
	// Get User Information
	$querySelect = "SELECT name, date FROM users WHERE id = '".$_SESSION['SESS_MEMBER_ID']."'";
	$resultSelect = mysql_query($querySelect);
	$row = mysql_fetch_array($resultSelect);
	$storeName = $row['name'];
	$rawdate = $row['date'];
	$joindate=date('d-m-y',strtotime($rawdate));
	$uid = $_SESSION['SESS_MEMBER_ID'];
	
	echo "hello";
	
	$query = "SELECT * FROM it_item WHERE storeName = '$storeName'";
	$sql = mysql_query($query);
	echo "<table>";
	while($row = mysql_fetch_array($sql)){
	echo "<tr>";
	//echo $row['brand'];
	echo "<td>$row[trackingNo]</td><td>$row[firstName]</td><td>$row[model]</td><td>$row[registrationDate]</td><td>$row[status]</td><td><a href=\"viewitem.php?id=$row[trackingNo]\">View Item</a></td>";
	echo "</tr>";
	}
	echo "</table>";/*
*/	
?>