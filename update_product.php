<?php

    include 'php/config.inc.php';
    
    $product_id = $_GET['product_id'];
    $product_name = $_GET['product_name'];
    $product_description = $_GET['product_description'];
    $product_price = $_GET['product_price'];
    $product_discount = $_GET['product_discount'];
    $product_image = $_GET['product_thumb'];
    $product_thumb = $_GET['product_thumb'];
    // LAST UPDATE
    $product_category = $_GET['product_category'];
    $publish_status = $_GET['publish_status'];
    
    
    
    
    $query = "
                UPDATE
                    product
                SET
                    name = '".mysqli_real_escape_string($mysqli,$product_name)."',
                    description = '".mysqli_real_escape_string($mysqli,$product_description)."',
                    price = '".$product_price."',
                    discount_rate = '".$product_discount."',
                    image = '".$product_thumb."',
                    thumb = '".$product_thumb."',
                    category_id = '".$product_category."',
                    published_status_id = '".$publish_status."'
                    
                WHERE   
                    id = '".$product_id."'
    ";
    
    
    if (mysqli_query($mysqli, $query)) {
        header('Location: edit_product.php?product_editing='.$product_id );
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    
    

    

?>