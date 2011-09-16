<?php
	
	//Start session
	session_start();
	
	//Include database connection details
	require_once('include/config.php');
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
		
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//Sanitize the POST values
	$login = clean($_POST['login']);
	$password = clean($_POST['password']);
	
	//Input Validations
	if($login == '') {
		$errmsg_arr[] = 'Login ID missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
	
	//If there are input validations, redirect back to the login form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: login.php");
		exit();
	}
	
	//Create query
	$qry="SELECT * FROM users WHERE Login='$login' AND Password='".sha1($_POST['password'])."'";
	$result=mysql_query($qry);
		
	//Check whether the query was successful or not
	if($result) {
		if(mysql_num_rows($result) == 1) {
		
			//Login Successful
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			
			$id = $member['id'];
			$time1 = $member['lockouttime'];
			$time2 = $member['unlocktime'];
			$time3 = date('D-m-Y H:i:s');
					
			if($time1 != ''){
				if($time1>=$time2){
					$queryUpdate = "UPDATE users SET lockout = '0', lockouttime = '0', unlocktime = '0' WHERE id = '$id'";
					$resultUpdate = mysql_query($queryUpdate);
					             }
					        }
			
			// Checks the lockout to see if its 0 or 1 - if 0 - lets you in - if 1 - denies you
			
			$queryLockout = "SELECT lockout FROM users WHERE id = '$id'";
			$resultLockout = mysql_query($queryLockout);
			
			$row5 = mysql_fetch_array($resultLockout);
			
			$lockout = $row5['lockout'];			
			
			// Sets the Session ID
			$_SESSION['SESS_MEMBER_ID'] = $member['id'];
		
			// Checks to make sure the user is not locked out - If they are, it lets the user know, if not - continues on with the script
			
			if($lockout == '1'){
			
			// Checks to see if it has been more than 30 minutes - if so, it unlocks the account and lets the user in

			
			
			
			echo "I'm sorry but your account is currently locked. Please try back again later.";
			exit();
			}
			
					
			
			// Inserts into logging database the login

			$username = $_POST['login'];
			$date = date('D-m-Y H:i:s');
			$ip = $_SERVER['REMOTE_ADDR'];
			$type = "login";
			
			$queryInsert = "INSERT INTO logging (username, date, ip, type) VALUES ('$username', '$date', '$ip', '$type')";
			$resultInsert = mysql_query($queryInsert);
	
			session_write_close();
			header("location: index.php");
			exit();
		}else {
			//Login failed
			
			// Inserts into logging database the login - this inserts failed - If failed 5 times, it locks out
			
			$username = $_POST['login'];
			$date = date('D-m-Y H:i:s');
			$ip = $_SERVER['REMOTE_ADDR'];
			$type = "failed";
			
			$queryInsert = "INSERT INTO logging (username, date, ip, type) VALUES ('$username', '$date', '$ip', '$type')";
			$resultInsert = mysql_query($queryInsert);
			
			// Checks to see the total number of failures within the past half hour
			
			$time1 = date('D-m-Y H:i:s');
			$time2 = date('D-m-Y H:i:s',time()-1800);
			$time3 = date('D-m-Y H:i:s',time()+1800);
			
			$queryCheck = "SELECT COUNT(type) as TypeCount FROM logging WHERE type = 'failed' AND date BETWEEN '$time2' AND '$time1' AND username ='$username'";
			$resultCheck = mysql_query($queryCheck);
			
			$row1 = mysql_fetch_array($resultCheck);
			
			$TypeCount = $row1['TypeCount'];
			
			if($TypeCount >= '5'){
			
			// Inserts a 1 into the users file to lock the login for 30 minutes
			
			$queryInsert2 = "UPDATE users SET lockout = '1', lockouttime = '$time1', unlocktime = '$time3' WHERE login = '$username'";
			$resultInsert2 = mysql_query($queryInsert2);
			
			echo "I'm sorry but your account has been locked for 30 minutes. Please try again later.";
			}else{
						echo "Login Failed. Incorrect Password";
				 }
			
			exit();
		}
	}else {
		die("Query failed");
	}
?>