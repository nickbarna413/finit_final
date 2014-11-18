<?php include 'php/config.inc.php'; ?>

<?php

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($mysqli,"SELECT * FROM products WHERE id = '3'");


mysqli_close($mysqli);
?> 

<?php include 'includes/head.php' ?>

<body id="cart">


<?php include 'includes/header.php' ?>


<main class="global-width section group">

<aside class="col span_1_of_5">

	<h1 class="h1">Shopping Cart</h1>

	<span class="h3">My Account</span>
    
    <nav class="user-nav">
    
    	<ul>
        
        	<li><a href="#userInfo">User Information</a></li>
            
            <li><a href="#billingInfo">Billing Information</a></li>
            
            <li><a href="#orderInfo">My Orders</a></li>
            
            <li><a href="#cancelAccount">Cancel Account</a></li>
    
    	</ul>
    </nav>		<!--end of user nav-->


</aside>		<!--end of sideBar-->

<section class="main-content col span_4_of_5">

    	<h2 class="h2">Items</h2>
        
        <table>
        
        	<tr>
            
            	<th>Item</th>
                
                <th>Description</th>
                
                <th>Qty</th>
                
                <th>Price</th>
            
            </tr>
            
            <tr>
            
            <?php 
			
			while($row = mysqli_fetch_array($result)) {
  
				echo "<td><img src='" . $row['productimage'] . "' alt=\"Grandmas Wallpaper\" /></td>";
				
				echo "<td>" . $row['name'] . "</td>";
				
				echo "<td>1</td>";
				
				echo "<td>$" . $row['price'] . ".99</td>";

			}
      		?>
            
             </tr>
        
        </table>
        <form action="checkout.php">
        
        	<input type="submit" class="admin-button" name="cartSubmit" value="Check Out" />
       
        </form>

</section>		<!--end of main content-->


</main>	<!--end of wrapper-->

<?php include 'includes/footer.php' ?>



</body>

</html>
