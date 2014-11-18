<?php session_start();
include 'php/config.inc.php'; 

echo '<!DOCTYPE html>
<html>
<head>
<title>Logout</title>
</head>

<body style="font-family: verdan, sans-serif;">';

if (!isset($_SESSION['user_id'])) {
		//$url = $protocol . BASE_URL . $destination; // Define the URL.
		header("home_page.php", true);
		exit(); // Quit the script.
	}
session_destroy();
setcookie (session_name(), '', time()-300);
	echo '<div style="width: 80%; padding: 5px 15px; border: 1px solid #e3e3e3; margin: auto;" id="pageHeader">
			<h1>You have successfully logged out!</h1>
			<br />
			<button><a href="home_page.php" style="color: #222;">Back</a></button>
		  </div>';
?>