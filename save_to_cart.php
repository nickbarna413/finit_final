<?php
    session_start();
    
    $product_id = $_GET["ProductID"];
    
    
    $index = count($_SESSION['cart']);
    $_SESSION['cart'][$index] = $product_id;
    
    // INSERT PRODUCT_ID INTO SESSION ARRAY 'CART',
    // THEN REDIRECT TO SHOPPING CART
    
    header('Location: ' . 'cart.php')
    
?>