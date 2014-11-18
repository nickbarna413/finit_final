<?php

    include 'php/config.inc.php';

// GET VARS

    $product_name = $_GET['product_name'];
    $product_description = $_GET['product_description'];
    $product_price = $_GET['product_price'];
    $product_discount = $_GET['product_discount'];
    $product_thumb = $_GET['product_thumb'];
    $product_category = $_GET['product_category'];
    $publish_status = $_GET['publish_status'];

// MAKE QUERY STRING

    $query = "
    
                INSERT INTO
                    product (name, description, price, discount_rate, thumb, category_id, published_status_id)
                VALUES
                    ( '".mysqli_real_escape_string($mysqli,$product_name)."', '".mysqli_real_escape_string($mysqli,$product_description)."', '".$product_price."', '".$product_discount."', '".$product_thumb."', '".$product_category."', '".$publish_status."');
                
    ";
    

if (mysqli_query($mysqli, $query)) {
        //header('Location: edit_product.php?product_editing='.$product_id );
        
        
        // get AI value and use it to insert into product review table
        
    } else {
        echo "Error updating record: " . mysqli_error($conn);
        echo $query;
    }
    
    
        
        

?>