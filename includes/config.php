<?php
ob_start();
session_start();
ini_set('display_errors',1); 
error_reporting(E_ALL);



// Create the mysqli object

	$mysqli = new mysqli("localhost", 'root', 
			'root', 'clothing_shop');
            
// Check for any errors. 

	$errnum=mysqli_connect_errno();
	if ($errnum) 
	{
     	$errmsg=mysqli_connect_error();
		print "Connect failed. error number=$errnum<br />
        		error message=$errmsg";    
		exit();
	}


