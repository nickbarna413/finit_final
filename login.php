<?php require('./includes/config.php'); ?>
<!DOCTYPE html>
<html>
<head>
<title>Login</title>
</head>

<body style="font-family: verdan, sans-serif;">
	<?php

/*if (isset($_SESSION['user_id'])) {
		//$url = $protocol . BASE_URL . $destination; // Define the URL.
		header("Location: http://localhost:8888/DIG4530/versionA/home_page.php", true);
		exit(); // Quit the script.
	}*/

//$_SESSION['user_id'] = 1;
$_SESSION['user_admin'] = true;
//$_SESSION['user_not_expired'] = true;

/*
// Create the mysqli object

	$mysqli = new mysqli("localhost", 'pannullor', 
			'tarral0423', 'shopping_cart');
            
// Check for any errors. 

	$errnum=mysqli_connect_errno();
	if ($errnum) 
	{
     	$errmsg=mysqli_connect_error();
		print "Connect failed. error number=$errnum<br />
        		error message=$errmsg";    
		exit();
	}*/

	if ($_SERVER['REQUEST_METHOD'] === 'POST'){
		$login_errors = array();

		// Validate the email address:
		if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$email = $mysqli->real_escape_string($_POST['email']);
		} else {
			$login_errors['email'] = 'Please enter a valid email address!';
		}

		// Validate the password:
		if (!empty($_POST['password'])) {
			$password = $_POST['password'];
		} else {
			$login_errors['password'] = 'Please enter your password!';
		}
			
		if (empty($login_errors)){
			$query = "SELECT id, username, type, password FROM users WHERE email='$email'";
			$request = mysqli_query($mysqli, $query);

			if (mysqli_num_rows($request) === 1){

				//echo 'test';

				$row = mysqli_fetch_array($request, MYSQLI_ASSOC);
				/*while ($row=$request->fetch_assoc())
				//{	
					$id=$row['id'];
					$username=$row['username'];
					$type=$row['type'];
					$pass=$row['password'];
					//$email1=$row['email'];
				//}

				/*echo $pass. " " .$email1;
				echo '<br />';
				echo $password. " " .$email;*/

				//$pass = password_hash($password, PASSWORD_BCRYPT);

				$result = password_verify($password, $row['password']);
				
				
				
				//echo $result.'<br />';

				//echo 'entered password: '. $pass .'database password: '. $row['password'];
				//$_SESSION["userName"] = $row['username'];

				if( $result ){
					
					// If the user is an administrator, create a new session ID to be safe:
					//echo 'I made it here';

					if ($row['type'] === 'admin') {
						session_regenerate_id(true);
						$_SESSION['user_admin'] = true;
						//echo 'username '. $_SESSION['username'];
						header('location: http://localhost:8888/DIG4530/versionA/admin.php', true);
						}

					
						// Store the data in a session:
						$_SESSION['user_id'] = $row['id'];
						$_SESSION['username'] = $row['username'];
						$_SESSION['user_admin'] = $row['type'];
						//echo 'username '. $_SESSION['username'];
						header('location: client.php', true);
						
					}

				else { // Right email address, invalid password.
					$login_errors['login'] = 'The password does not match that on file.';
						foreach ($login_errors as $error => $x) {
						echo 'Error: '.$x;
						echo '<br />';
					}
				}

			}
			else { // Right password wrong email.
				$login_errors['login'] = 'The email address is wrong';
				foreach ($login_errors as $error => $x) {
					echo 'Error: '.$x;
					echo '<br />';
				}
			}
		}

		else{
			foreach ($login_errors as $error => $x) {
				echo 'Error: '.$x;
				echo '<br />';
			}
		}

	}

echo '<div id="pageWrap">';
	echo '<div style="width: 80%; padding: 5px 15px; border: 1px solid #e3e3e3; margin: auto;" id="pageHeader">
			<h1>Login</h1>
			<br />
			<form action=" " method="post">
				<div class="formWrap">
					<input type="email" placeholder="Email" name="email" class="field">
					<br />
					<input type="password" placeholder="Password" name="password" class="field">
					<br />
					<input type="submit" value="Login" name="login" class="formSubmit">
				</div>
			</form>
			<br />
			<h6>No Account? <a href="register.php">Register</a></h6>
		  </div>';
echo '</div>';
echo '</body>';
echo '</html>';

?>