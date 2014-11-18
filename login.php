<<<<<<< HEAD
<?php include 'includes/head.php';
include 'php/config.inc.php'; ?>
=======
>>>>>>> FETCH_HEAD

<?php include 'includes/head.php' ?>

<body id="login">

<?php include 'includes/header.php' ?>

<main class="global-width group section">


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
			$email = mysqli_real_escape_string($mysqli, $_POST['email']);
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


				function generateHash($password){
				if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH){
						$salt = '$2y$11$'.substr(md5($password),0,22);
						return crypt($password, $salt);
					}//uniqid(rand(),true)
				}
				if(generateHash($password) ==  $row['password']){
					$result = true;
				}
				else{
					$result = false;
				}

				
				
				
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
					echo 'HEY IT WORKS';
						
				}else { // Right email address, invalid password.
					$login_errors['login'] = 'The password does not match that on file.';
						foreach ($login_errors as $error => $x) {
						echo 'Error: '.$x;
						echo '<br />';
						}
						//echo $row['password']."<br>".generateHash($password);
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

echo '<div class="global-width">';
	echo '<h1 class="h1">Login</h1>
			
			<form method="post" class="login">
			
					<input type="email" placeholder="Email" name="email" class="field">
				
					<input type="password" placeholder="Password" name="password" class="field">
				
					<input type="submit" value="Login" name="login" class="formSubmit admin-button">
				
			</form>
		
			<h3 class="h3">No Account? <a href="register.php">Register</a></h3><br /><br /><br />';
echo '</div>';

?>
</main>	<!--end of wrapper-->

<?php include 'includes/footer.php' ?>



</body>

</html>
