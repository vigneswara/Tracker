<!doctype html>
<html>

	<head>
		
		<title>IT Component Tracker</title>
		
	</head>
	
	<body lang="en">
		<?php
			if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
				echo '<ul class="err">';
				foreach($_SESSION['ERRMSG_ARR'] as $msg) {
					echo '<li>',$msg,'</li>'; 
				}
				echo '</ul>';
				unset($_SESSION['ERRMSG_ARR']);
			}
		?>	
		
		<!-- Main -->
		<div class="userform">
			<p><h4>Login</h4></p>
			<div id="landingform">
				<form id="loginForm" name="loginForm" method="post" action="login-exec.php">
					<p><label for="username">Username</label><br /><input name="login" type="text" class="textfield" id="login" /></p>
					<p><label for="password">Password</label><br /><input name="password" type="password" class="textfield" id="password" /></p>
					<p><input type="submit" name="submit" value="LOGIN"/></p>
					<p>
						<div class="forgot">
						<a href="forgotpassword.php">Forgot your password?</a>
						</div>
					</p>
				</form>
			</div>
		</div>
			

		

		
	</body>
	
</html>