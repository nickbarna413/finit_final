<?php
    session_start();

    include "php/config.inc.php";
       
    ?>
    
        
        <h3 id="cart_title">SHOPPING CART</h3>
        <ul id="cart_list">
    <?php
    
        
    if(isset($_SESSION['cart'])){
    $num_items = count($_SESSION['cart']);
    
    
    $total = 0;
    
    for( $i = 0; $i < $num_items; $i++ ){
        
        $product_id = $_SESSION['cart'][$i];
        
        $result = mysqli_query($mysqli,"SELECT product.name AS product_name, product.price AS product_price FROM product WHERE product.id = $product_id");
    
        while($row = mysqli_fetch_array($result)) {
            
            $product_name = $row['product_name'];
            $product_price = $row['product_price'];
            
            echo "<li>".$product_name."<span style='float: right'>".$product_price."</li>";
            
            $total = $total + $product_price;
            
        }
        
        
        ?>
        
            

        <?php
    }
    
    ?>
    
        <
        <a href='clear_cart.php'>Clear Cart</a>
        <a href="page_checkout.php" id="checkout_link">
            <h3>CHECKOUT</h3>
        </a>
        
    
    
    <?php
    
    }
        echo "<a href='clear_cart.php'>CLEAR CART</a>";
?>

