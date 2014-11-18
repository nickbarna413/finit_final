<?php include 'includes/head.php';

include 'php/config.inc.php'; ?>




<body id="cart">


<?php include 'includes/header.php' ?>


<main class="global-width section group">

<aside class="col span_1_of_5">

	<h1 class="h1">Shopping Cart</h1>

	<span class="h3">My Account</span>
    
    <nav class="user-nav">
    
    	<ul>
        
        	<li><a href="client.php">User Information</a></li>
            
            <li><a href="client.php#billingInfo">Update User Info</a></li>
    
    	</ul>
    </nav>		<!--end of user nav-->


</aside>		<!--end of sideBar-->

<section class="main-content col span_4_of_5">

    	<h2 class="h2">Items</h2>
        
        <table>
        
        	<tr>
            
            	<th>Item</th>
                
                <th>Price</th>
            </tr>
            
    <?php
    
    $total = 0;
    if(isset($_SESSION['cart'])){
        $num_items = count($_SESSION['cart']);

        for( $i = 0; $i < $num_items; $i++ ){
            
            $product_id = $_SESSION['cart'][$i];
            
            $result = mysqli_query($mysqli,"SELECT product.name AS product_name, product.price AS product_price FROM product WHERE product.id = $product_id");
        
            while($row = mysqli_fetch_array($result)) {
                
                $product_name = $row['product_name'];
                $product_price = $row['product_price'];
                
                echo "<tr><td>".$product_name."</td><td>".$product_price."</td></tr><tr>";
                
                $total = $total + $product_price;
                
            }
        }
    }else{
        //echo "DIDINT WORKD";
    }
        
?>
            
            
            
             </tr>
	    <tr>
	      <td>
		TOTAL
	      </td>
	      <td>
		$<?php echo $total; ?>
	      </td>
	    </tr>
	    
        
        </table>
        <a href="clear_cart.php" style="color:cornflowerblue">Clear Cart</a>
        <form action="checkout.php">
        
        	<input type="submit" class="admin-button" name="cartSubmit" value="Check Out" />
       
        </form>

</section>		<!--end of main content-->


</main>	<!--end of wrapper-->

<?php include 'includes/footer.php' ?>



</body>

</html>
