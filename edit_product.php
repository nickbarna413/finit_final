<?php include 'php/config.inc.php'; ?>

<?php include 'includes/head.php' ?>

<body id="edit">


<?php include 'includes/header.php' ?>


<main class="global-width section group main-content">

<h1 class="h1">Edit Product</h1>

<a class='back-button' href="admin.php">&#8592; Back</a>

<?php
	if(isset($_GET['product_editing'])){
		$product = $_GET['product_editing'];
		
		$query = "
		
				SELECT
					product.id AS product_id,
					product.name AS product_name,
					product.price AS product_price,
					product.description AS product_description,
					product.discount_rate AS product_discount_rate,
					product.last_update AS product_last_update,
					product.published_status_id AS published_status_id,
					product.category_id AS product_category_id,
					product.thumb AS product_thumb
				FROM
					product
				WHERE
					product.id = '".$product."';
		
		";
		
		$result = mysqli_query($mysqli, $query);
            
		while($row = mysqli_fetch_array($result)) {
		    
			$product_id = $row['product_id'];
			$product_name = $row["product_name"];
			$product_price = $row["product_price"];
			$product_thumb = $row["product_thumb"];
			$product_discount = $row["product_discount_rate"];
			$product_description = $row["product_description"];
			$product_last_update = $row['product_last_update'];
			$product_category_id = $row['product_category_id'];
			$publish_status_id = $row['published_status_id'];
		}
		
		
	} else {
		// REDIRECT TO PRODUCTS TABLE
		$product = "1";
	}
	
?>

	<form action="update_product.php" method="get">
		<dl>
        
        	<dt><label for="product_id">Product ID:</label></dt>
			
            <dd><input id="product_id" type="text" name="product_id" value="<?php echo $product; ?>" readonly></dd>
		

			<dt><label for="product_name">Product Name:</label></dt>
			<dd><input type="text" id="product_name" name="product_name" value="<?php echo $product_name; ?>"></dd>

			<dt><label for="product_desc">Product Description:</label></dt>
			<dd><textarea rows=7 id="product_desc" name="product_description" ><?php echo $product_description; ?></textarea></dd>
	
			<dt><label for="product_price">Product Price:</label></dt>
			<dd><input id="product_price" type="text" name="product_price" value="<?php echo $product_price; ?>"></dd>

			<dt><label for="product_discount">Product Discount Rate:</label></dt>
			<dd><input id="product_discount" type="text" name="product_discount" value="<?php echo $product_discount; ?>"></dd>
	
			<dt><label for="product_thumb">Product Thumb</label></dt>
			<dd><input id="product_thumb" type="text" name="product_thumb" value="<?php echo $product_thumb; ?>"></dd>

			<dt><label>Last Update:</label></dt>
			<dd class="embiggen"><?php echo $product_last_update; ?></dd>
		

			<dt><label>Category:</label></dt>
		
			<?php
				if($product_category_id == "1"){
					$mens = "checked";
					$womens = "";
					$childrens = "";
					$limited = "";
				} else if($product_category_id == "2") {
					$womens = "checked";
					$childrens = "";
					$limited = "";
					$mens = "";					
				} else if($product_category_id == "3") {
					$childrens = "checked";
					$limited = "";
					$mens = "";	
					$womens = "";					
				} else if($product_category_id == "4") {
					$limited = "checked";
					$mens = "checked";
					$womens = "";
					$childrens = "";					
				}
			
			?>
			
			<dd class="embiggen"><input type="radio" name="product_category" value="1" <?php echo $mens ?> >Men's<br />
			<input type="radio" name="product_category" value="2" <?php echo $womens ?> >Women's <br />
			<input type="radio" name="product_category" value="3" <?php echo $childrens ?> >Children's<br />
			<input type="radio" name="product_category" value="4" <?php echo $limited ?> >Limited</dd>
	
		
        <dt><label>Publish Status</label></dt>
			<?php
				if($publish_status_id == "2"){
					$not_pub = "checked";
					$pub = "";
				} else {
					$pub = "checked";
					$not_pub = "";
				}
			
			?>
			
			<dd class="embiggen"><input type="radio" name="publish_status" value="1" <?php echo $pub ?> >Published<br />
			<input type="radio" name="publish_status" value="2" <?php echo $not_pub ?> >Not Published<br /></dd>
		
		</dl>
		<input type="submit" class="admin-button" value="save">
		
		
	</form>

</main>	<!--end of wrapper-->

<?php include 'includes/footer.php' ?>



</body>

</html>
