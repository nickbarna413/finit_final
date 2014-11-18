<?php
	$mailTo = "e.vazquez@knights.ucf.edu"; //made it my email to make sure it was working. 
	$mailFrom = $_POST['email'];
	$subject = "A new comment from Finit";
	$message = $_POST['comment'];
	
mail($mailTo, $subject, $message, "From: ".$mailFrom);
?>