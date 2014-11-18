<?php 
include 'includes/head.php';
include 'php/config.inc.php'; ?>

<!DOCTYPE html>

<?php include 'includes/head.php' ?>


<body id="login">

<?php include 'includes/header.php' ?>

<main class="global-width group section">


<?php

	// For storing registration errors:
	$reg_errors = array();

	if ($_SERVER['REQUEST_METHOD'] === 'POST'){
		// Check for a name:
		if (preg_match('/^[A-Z \'.-]{2,45}$/i', $_POST['name'])) {
			$name = $mysqli->real_escape_string($_POST['name']);
		} else {
			$reg_errors['name'] = 'Please enter your name!';
		}

		// Check for a username:
	if (preg_match('/^[A-Z0-9]{2,45}$/i', $_POST['username'])) {
		$username = $mysqli->real_escape_string($_POST['username']);
		} else {
			$reg_errors['username'] = 'Please enter a desired name using only letters and numbers!';
		}
	
	// Check for an email address:
	if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === $_POST['email']) {
		$email = $mysqli->real_escape_string($_POST['email']);
		} else {
			$reg_errors['email'] = 'Please enter a valid email address!';
		}

	// Check for a password and match against the confirmed password:
	if (preg_match('/^(\w*(?=\w*\d)(?=\w*[a-z])(?=\w*[A-Z])\w*){6,}$/', $_POST['password1']) ) {
		if ($_POST['password1'] === $_POST['password2']) {
			$password = $_POST['password1'];
		}
		 else {
			$reg_errors['password2'] = 'Your password did not match the confirmed password!';
		}

		}
 	else {
		$reg_errors['password1'] = 'Please enter a valid password!';
	}

	if(empty($reg_errors)){
		// Make sure the email address and username are available:
		$query = "SELECT email, username FROM users WHERE email='$email' OR username='$username'";
		$query2 = "INSERT INTO customer (username, name, email) VALUES ('$username','$name','$email')";
		$request = mysqli_query($mysqli, $query);
		$request2 = mysqli_query($mysqli, $query2);

		$rows = mysqli_num_rows($request);
	
		function generateHash($password){
			if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH){
				$salt = '$2y$11$'.substr(md5($password),0,22);
				return crypt($password, $salt);
			}
		}

		// meaning that the entered username and email don't yet exist so they can be used.
		if ($rows === 0){
			$query = "INSERT INTO users (username, email, password, name, date_expires) VALUES ('$username', '$email', '"  .  generateHash($password) .  "', '$name', SUBDATE(NOW(), INTERVAL 1 DAY) )" ; 
			$query2 = "INSERT INTO customer (username, name, email) VALUES ('$username','$name','$email')";
			$request = mysqli_query($mysqli, $query);
			$request2 = mysqli_query($mysqli, $query2);

			if(mysqli_affected_rows($mysqli) === 1){
				$id_num = mysqli_insert_id($mysqli);
				//$_SESSION['user_id'] = $id_num;

				//thank the user for registering
				echo '<h1>Thanks for registering, <a href="login.php">click here</a> to login to your account.</span>';
				//echo "<p> You are now logged in as " .$username. " </p>";

			}
			 else { // If it did not run OK.
				trigger_error('You could not be registered due to a system error. We apologize for any inconvenience. We will correct the error ASAP.');
			}
		}
		else{
			$row = mysqli_fetch_array($request, MYSQLI_NUM);
			if( ($row[0] === $_POST['email']) && ($row[1] === $_POST['username'])) { // Both match.
					$reg_errors['email'] = 'This email address has already been registered. If you have forgotten your password, use the link at left to have your password sent to you.';	
					$reg_errors['username'] = 'This username has already been registered with this email address. If you have forgotten your password, use the link at left to have your password sent to you.';
					foreach ($login_errors as $error => $x) {
					echo 'Error: '.$x;
					echo '<br />';
					}
				} elseif ($row[0] === $_POST['email']) { // Email match.
					$reg_errors['email'] = 'This email address has already been registered. If you have forgotten your password, use the link at left to have your password sent to you.';
					foreach ($login_errors as $error => $x) {
					echo 'Error: '.$x;
					echo '<br />';
					}						
				} elseif ($row[1] === $_POST['username']) { // Username match.
					$reg_errors['username'] = 'This username has already been registered. Please try another.';	
					foreach ($login_errors as $error => $x) {
					echo 'Error: '.$x;
					echo '<br />';
					}		
				}
			}
	}
	else{
		foreach ($reg_errors as $error => $x) {
				echo "error: ".$x;
				echo '<br />';
	}
}
}
?>

			<h1 class="h1">Register</h1>
			
			<form action="register.php" method="post" class="login">
				
					<input type="text" placeholder="Name" name="name" class="field">
					
					<input type="text" placeholder="Username" name="username" class="field">
					
					<input type="email" placeholder="Email" name="email" class="field">
					
					<input type="password" placeholder="Password" name="password1" class="field">
					<span class="help-block embiggen">Must be at least 6 characters long, with at least one lowercase letter, one uppercase letter, and one number.</span>
				
					<input type="password" placeholder="Confirm Password" name="password2" class="field">
					
					<input type="submit" value="Register" name="register" class="formSubmit admin-button">
			
			</form>
</main>	<!--end of wrapper-->

<?php include 'includes/footer.php' ?>



</body>

</html>
