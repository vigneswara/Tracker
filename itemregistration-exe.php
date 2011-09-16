<?php



require_once('auth.php');
	
	
	include('include/config.php');
	
	$querySelect = "SELECT name FROM users WHERE id = '".$_SESSION['SESS_MEMBER_ID']."'";
	$resultSelect = mysql_query($querySelect);
	
	$row = mysql_fetch_array($resultSelect);
	
	$storeName = $row['name'];
	$id = $_SESSION['SESS_MEMBER_ID'];
	$brand = $_POST['element_13'];
	$model = $_POST['element_1'];
	$serialNumber = $_POST['element_2'];
	$ram = $_POST['element_3'];
	$processor = $_POST['element_4'];
	$hardDrive = $_POST['element_5'];
	$screenSize = $_POST['element_6'];
	$acAdapter = $_POST['element_14'];
	$battery = $_POST['element_15'];
	$bag = $_POST['element_16'];
	$powerStatus = $_POST['element_17'];
	$physicalCondition = $_POST['element_7'];
	$problemDescription = $_POST['element_8'];
	$status = "Received";
	$registrationDate = date('Y-m-d H:i:s');
	
	$firstName = $_POST['element_9_1'];
	$lastName = $_POST['element_9_2'];
	$add1 = $_POST['element_10_1'];
	$add2 = $_POST['element_10_2'];
	$city = $_POST['element_10_3'];
	$state = $_POST['element_10_4'];
	$zipcode = $_POST['element_10_5'];
	$country = $_POST['element_10_6'];
	$mobile = $_POST['element_11'];
	$email = $_POST['element_12'];
	
	$query = "INSERT INTO it_item(firstName,lastName,email,mobile,storeName,registrationDate,status,price,brand,model,serialNumber,ram,processor,hardDrive,screenSize,acAdapter,battery,bag,powerStatus,physicalCondition,problemDescription) VALUES ('$firstName','$lastName','$email','$mobile','$storeName','$registrationDate','$status','$price','$brand','$model','$serialNumber','$ram','$processor','$hardDrive','$screenSize','$acAdapter','$battery','$bag','$powerStatus','$physicalCondition','$problemDescription')";
	

	
	$insert = @mysql_query($query);
	header("location: temp.php");
?>