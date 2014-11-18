<?php include 'includes/head.php' ?>
<?php include 'php/config.inc.php'; ?>



<body id="edit">


<?php include 'includes/header.php' ?>


<main class="global-width section group main-content">

<h1 class="h1">Add Product</h1>

<a class="back-button" href="admin.php">&#8592; Back</a>

<?php
	
?>

	<form action="insert_product.php" method="get">
		
        <dl>
        
        <dt><label for="product_name">Product Name</label></dt>
		<dd><input type="text" id="product_name" name="product_name" value=""></dd>
		<dt><label for="product_desc">product_description</label></dt>
		<dd><textarea id="product_desc" name="product_description"></textarea></dd>

		<dt><label for="product_price">product_price</label></dt>
			<dd><input type="text" id="product_price" name="product_price" value=""></dd>

		<dt><label for="product_discount">product_discount_rate</label></dt>
		<dd><input type="text" id="product_discount" name="product_discount" value=""></dd>

		<dt><label for="product_thumb">product_thumb</label></dt>
		<dd><input type="text" id="product_thumb" name="product_thumb" value=""></dd>
		
		
		<dt><label>Category</label></dt>
		
			
		<dd class="embiggen"><input type="radio" name="product_category" value="1" >Men's<br>
			<input type="radio" name="product_category" value="2" >Women's <br>
			<input type="radio" name="product_category" value="3"  >Children's<br>
			<input type="radio" name="product_category" value="4" >Limited</dd>
		
	
		<dt><label>Publish Status</label></dt>
			
		<dd class="embiggen"><input type="radio" name="publish_status" value="1" >Published<br>
			<input type="radio" name="publish_status" value="2" checked >Not Published</dd>
		
	</dl>
		<input type="submit" class="admin-button" value="save">
		
		
	</form>


</main>	<!--end of wrapper-->

<?php include 'includes/footer.php' ?>



</body>

</html>
