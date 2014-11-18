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


<body id="checkout">


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

	<article id="cartItems">
    
    	<h2 class="h2">Checkout</h2>
    
    <?php
        $total = 0;
    if(isset($_SESSION['cart'])){
    $num_items = count($_SESSION['cart']);
    
    
    
    
    for( $i = 0; $i < $num_items; $i++ ){
        
        $product_id = $_SESSION['cart'][$i];
        
        $result = mysqli_query($mysqli,"SELECT product.name AS product_name, product.price AS product_price FROM product WHERE product.id = $product_id");
    
        while($row = mysqli_fetch_array($result)) {
            
            $product_price = $row['product_price'];
            
            $total = $total + $product_price;
            
        }
        
        
        ?>
        
            

        <?php
    }
    ?>
    
        
        
    
    
    <?php
    
    }
    
    ?>

        <span id="total" class="embiggen">total: <em><?php echo $total; ?></em></span>

     </article>
     
     </section>

</main>	<!--end of wrapper-->

<?php include 'includes/footer.php' ?>



</body>

</html>
