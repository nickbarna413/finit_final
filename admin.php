<?php include 'includes/head.php' ?>
<?php include 'php/config.inc.php'; ?>



<body id="admin">

<?php include 'includes/header.php'; 

if($_SESSION['user_admin'] != 'admin'){
	header('location:home_page.php', true);
	echo "LEAVE NOW YOU, CANT BE HERE!";
}
?> 


<main class="global-width section group">

<aside class="col span_1_of_5">

	<h1 class="h1">Admin Panel</h1>

	<span class="h3">My Account</span>
    
    <nav class="user-nav">
    
    	<ul>
        
        	<li><a href="client.php#userInfo">User Information</a></li>
            
            <li><a href="client.php#billingInfo">Billing Information</a></li>
            
            <li><a href="client.php#orderInfo">My Orders</a></li>
            
            <li><a href="client.php#cancelAccount">Cancel Account</a></li>
    
    	</ul>
    </nav>		<!--end of user nav-->


</aside>		<!--end of sideBar-->

<section class="main-content col span_4_of_5">


    
    <h2 class="h2">Products</h2>
    
    	<a href="add_product.php" class="admin-button embiggen ">Add</a>

    <h2 class="h2 margin">Inventory</h2>
    
<table>
	<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Category</th>
		<th>Description</th>
		<th>Price</th>
		<th>Discount</th>
		<th>Image</th>
		<th>Last Update</th>
		<th>Published</th>
		<th colspan="1">Manage</th>
		
	</tr>
	<?php
		// ECHO LIST OF PRODUCTS
		$query = "
			SELECT
				*
			FROM
				product
		";
		    
		
		$result = mysqli_query($mysqli, $query);
		
		$result = $mysqli->query($query);

		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
			$product_id = $row['id'];
			$product_name = $row["name"];
			$product_description = $row["description"];
			$product_description_short = strlen($product_description) > 50 ? substr($product_description,0,20)."..." : $product_description;
			$product_price = $row["price"];
			if($product_price){
				$product_price = "$ ".$product_price;
			}
			$product_thumb = $row["thumb"];
			if(file_exists($product_thumb)){
				$has_image = "&#10003;";
			} else {
				$has_image = "&#x274c;";
			}
			$product_discount = $row["discount_rate"];
			if($product_discount){
				$product_discount = $product_discount." %";
			}
			$product_last_update = $row['last_update'];
			$product_category_id = $row['category_id'];
			if($product_category_id == "1"){
				$product_category = "Men's";
			} else if($product_category_id == "2") {
				$product_category = "Women's";
			} else if($product_category_id == "3") {
				$product_category = "Children's";
			} else if($product_category_id == "4") {
				$product_category = "Limited";
			}
			$publish_status_id = $row["published_status_id"];
			if($publish_status_id == "1"){
				$publish_status = "&#10003;";
			} else {
				$publish_status = "&#x274c;";
			}
			
			
			
			echo
				"<tr>"
					."<td>"
					.$product_id
					."</td>"
					
					."<td>"
					.$product_name
					."</td>"
					
					."<td>"
					.$product_category
					."</td>"
					
					."<td>"
					.$product_description_short
					."</td>"
					
					."<td>"
					.$product_price
					."</td>"
					
					."<td>"
					.$product_discount
					."</td>"
					
					."<td>"
					.$has_image
					."</td>"
					
					."<td>"
					.$product_last_update
					."</td>"
					
					."<td>"
					.$publish_status
					."</td>"
					
					
					."<td>"
					."<a href='edit_product.php?product_editing=".$product_id."'>edit</a>"
					."</td>"
			
				."</tr>"
			;
			
		    }
		} else {
		    echo "0 results";
		}
		

            
		
		
	
	?>
	
</table>
 

    <h2 class="h2">Users</h2>
        
        <table>
        
        <tr>
        	<th>Username</th><th>Name</th><th>Email</th>
        </tr>
        
        <tr>
        	<td>gstubz</td><td>Gary Stubman</td><td>gstubz@aol.com</td>
		</tr>
     
        <tr>
        	<td>vprice413</td><td>Vincent Price</td><td>vprice@price.com</td>
		</tr>
        
        <tr>
        	<td>gertrude</td><td>Gertrude Smuckers</td><td>gertrudesmuckers@prodigy.net</td>
		</tr>        
   	  </table>
        <form>
        
        	<input type="submit" name="add" class="admin-button" value="Add" />
            
            <input type="submit" name="delete" class="admin-button" value="Delete" />
        
        
        </form>



    
</section>		<!--end of main content-->


</main>	<!--end of wrapper-->

<?php include 'includes/footer.php' ?>

</body>

</html>
