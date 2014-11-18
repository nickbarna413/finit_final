<?php include 'includes/head.php' ?>

<body id="client">

<?php include 'includes/header.php';
include 'php/config.inc.php';
if (!isset($_SESSION['user_id'])) {
        //$_SESSION['user_id'] = '1';
        //$url = $protocol . BASE_URL . $destination; // Define the URL.
        //header("Location: http://localhost:8888/DIG4530/versionA/home_page.php", true);
        echo '<h1 style="text-align: center;">You do not have permission to view this page. <button><a href="home_page.php" style="color: #222;">Back</a></button></h1>';
        exit(); // Quit the script.
}else{
    $userID = $_SESSION['user_id'];
    $query = "SELECT name, email, addr_1, city, state, zip FROM customer WHERE id = '".$userID."'";/*".$_SESSION['user_id']."'";*/
    $request = mysqli_query($mysqli, $query);
    $row = mysqli_fetch_array($request, MYSQLI_ASSOC);
    //echo $query." ".$row['addr_1'];
}
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $upd_Num = $mysqli->real_escape_string($_POST['newNum']);
        $upd_Addr = $mysqli->real_escape_string($_POST['newAddr']);
        $upd_Addr2 = $mysqli->real_escape_string($_POST['newAddr2']);
        $upd_City = $mysqli->real_escape_string($_POST['newCity']);
        $upd_State = $mysqli->real_escape_string($_POST['newState']);
        $upd_Zip = $mysqli->real_escape_string($_POST['newZip']);

        if(preg_match('/^[0-9]+$/', $upd_Num)){
            Echo " phone passed ";  
            $numQuery = "UPDATE `finit`.`customer` SET `phone` = '".$upd_Num."' WHERE `customer`.`id` = '".$userID."'";
            mysqli_query($mysqli, $numQuery);
        }
        if(preg_match('/^[0-9a-zA-Z. ]+$/', $upd_Addr)){
            Echo "first address passed ";
            $addrQuery = "UPDATE `finit`.`customer` SET `addr_1` = '".$upd_Addr."' WHERE `customer`.`id` = '".$userID."'";
            mysqli_query($mysqli, $addrQuery);
        }
        if(preg_match('/^[a-zA-Z0-9 ]+$/', $upd_Addr2)){
            Echo "second address passed ";
            $addr2Query = "UPDATE `finit`.`customer` SET `addr_2` = '".$upd_Addr2."' WHERE `customer`.`id` = '".$userID."'";
            mysqli_query($mysqli, $addr2Query);
        }
        if(preg_match('/^[a-zA-Z ]+$/', $upd_City)){
            Echo "city passed ";
            $cityQuery = "UPDATE `finit`.`customer` SET `city` = '".$upd_City."' WHERE `customer`.`id` = '".$userID."'";
            mysqli_query($mysqli, $cityQuery);
        }
        if(preg_match('/^[a-zA-Z ]+$/', $upd_State)){
            Echo "state passed ";
            $stateQuery = "UPDATE `finit`.`customer` SET `state` = '".$upd_State."' WHERE `customer`.`id` = '".$userID."'";
            mysqli_query($mysqli, $stateQuery);
        }
        if(preg_match('/^[0-9]+$/', $upd_Zip)){
            Echo "zip passed ";
            $zipQuery = "UPDATE `finit`.`customer` SET `zip` = '".$upd_Zip."' WHERE `customer`.`id` = '".$userID."'";
            mysqli_query($mysqli, $zipQuery);
        }
        //$updQuery = "UPDATE `finit`.`customer` SET `phone` = '".$upd_Num."', `addr_1` = '".$upd_Addr."', `addr_2` = '".$upd_Addr2."', `city` = '".$upd_City."', `state` = '".$upd_State."', `zip` = '".$upd_Zip."' WHERE `customer`.`id` = '".$userID."'";
        //echo "<script type='text/javascript'>alert('sent the query to the db');</script>";
        //echo $updQuery;
}

?>

<main class="global-width section group">

<aside class="col span_1_of_5">

	<h1 class="h1">User Profile</h1>

	<span class="h3">My Account</span>
    
    <nav class="user-nav">
    
    	<ul>
        
        	<li><a href="#userInfo">User Information</a></li>
            
            <li><a href="#billingInfo">Update User Info</a></li>
            
            <li><a href="#cancelAccount">Cancel Account</a></li>
    
    	</ul>
    
    </nav>		<!--end of user nav-->

</aside>		<!--end of sideBar-->

<section class="col span_4_of_5 main-content">

		<article class="user-article">

            <h2 class='h2'>User Information</h2>
        
        <dl>
        
            <dt>User Name:</dt><dd><span><?php echo "JEFF";//$_SESSION["username"]; ?></span></dd>
            
            <dt>Name:</dt><dd><span><?php echo $row['name']; ?></span></dd>
            
            <?php
                if(is_null($row['addr_1']) != true && $row['addr_1'] != '') {
                    echo "<dt>Address:</dt><dd><span>".$row['addr_1']."</span><span>".$row['city']."</span><span>".$row['state']."</span><span>".$row['zip']."</span></dd>";
                }else{
                    echo "<dt>Address:</dt><dd><span>No User info provided</span></dd>";
                }
            ?>
            <dt>Email Address:</dt><dd><span><?php echo $row['email']; ?></span></dd>
        
        </dl>
        
        </article>

		<article class="user-article">

            <h2 class="h2">Update User Info</h2>
        <form action=" " method="post">
            <dl>
                <dt>Phone Number:</dt><dd><span> <input type="text" placeholder='Number' name='newNum' class='field'> </span></dd>

                <dt>Street Address 1:</dt><dd><span> <input type="text" placeholder='Address' name='newAddr' class='field'> </span></dd>
                
                <dt>Address 2:</dt><dd><span> <input type="text" placeholder='Address 2' name='newAddr2' class='field'> </span></dd>
                
                <dt>City:</dt><dd><span> <input type="text" placeholder='City' name='newCity' class='field'> </span></dd>

                <dt>State:</dt><dd><span> <input type="text" placeholder='State' name='newState' class='field'> </span></dd>

                <dt>Zip Code:</dt><dd><span> <input type="text" placeholder='Zip Code' name='newZip' class='field'> </span></dd>
                <input type="submit" value='update' name='update' class='formSubmit'>
            </dl>
        </form>
            
         </article>
        
        <article class="user-article">
        
            <h2 class="h2">Cancel Account</h2>
            
            <p>If you would like to cancel your account, click the button below. </p>
            
            <form action="cancel.php">
            
                <input type="submit" class="admin-button" value="CANCEL" />
            
            </form>

	</article>

</section>		<!--end of main content-->


</main>	<!--end of wrapper-->

<?php include 'includes/footer.php' ?>



</body>

</html>
