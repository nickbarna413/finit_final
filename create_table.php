<?php

// Create the mysqli object

	$mysqli = mysqli_connect("localhost", 'pannullor', 
			'tarral0423', 'shopping_cart');
            
// Check for any errors. 

	$errnum=mysqli_connect_errno();
	if ($errnum) 
	{
     	$errmsg=mysqli_connect_error();
		print "Connect failed. error number=$errnum<br />
        		error message=$errmsg";    
		exit();
	}

$sql = "CREATE TABLE `users` (
`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
`type` ENUM('member','admin') NOT NULL DEFAULT 'member',
`username` VARCHAR(45) NOT NULL,
`email` VARCHAR(80) NOT NULL,
`password` VARCHAR(255) NOT NULL,
`name` VARCHAR(45) NOT NULL,
`date_created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
`date_expires` DATE NOT NULL,
PRIMARY KEY (`id`)
)";

if ($mysqli->query($sql) === TRUE) {
    echo "Table users created successfully";
} else {
    echo "Error creating table: " . $mysqli->error;
}

$mysqli->close();


?>