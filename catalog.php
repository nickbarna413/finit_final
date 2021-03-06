<?php include 'includes/head.php' ?>
<?php include 'php/config.inc.php'; ?>
 
<body id="cart"> 
 
<?php include 'includes/header.php' ?>

<main class="global-width group section">

<aside class="col span_2_of_12 filter-menu">

	<h1 class="h1">
    
    <?php 
		if (isset($_GET['name'])) {
			echo $_GET["name"];
		} else {
			echo "all";
		}
	?>
    
    </h1>
    
    <h3 class="h3">Filter By:</h3>
        
    <h4 class="h4">Color</h4>
    
    <form class="color-form">
    
    	<dl class="section group">
    	
        	<dt><input type="checkbox" name="red" /></dt>
            
            <dd><img src="img/redSquare.gif" alt="red" /><span>Red</span></dd>

        	<dt><input type="checkbox" name="blue" /></dt>
            
            <dd><img src="img/blueSqaure.gif" alt="blue" /><span>Blue</span></dd>
            
        	<dt><input type="checkbox" name="green" /></dt>
            
            <dd><img src="img/greenSquare.gif" alt="green" /><span>Green</span></dd>
            
            <dt><input type="checkbox" name="yellow" /></dt>
            
            <dd><img src="img/yellowSquare.gif" alt="yellow" /><span>Yellow</span></dd>            
            
            <dt><input type="checkbox" name="orange" /></dt>
            
            <dd><img src="img/orangeSquare.gif" alt="orange" /><span>Orange</span></dd>            
            
            <dt><input type="checkbox" name="white" /></dt>
            
            <dd><img src="img/whiteSquare.gif" alt="white" /><span>White</span></dd>            
                 
        
        </dl>
    
    </form>
    
	<h4 class="h4">Size</h4>
    
    <form>
    
    	<dl class="section group">
    	
        	<dt><input type="checkbox" name="small" id="small" /></dt>
            
            <dd><label for="small">5-6</label></dd>

        	<dt><input type="checkbox" name="medium" id="medium" /></dt>
            
            <dd><label for="medium">7-9</label></dd>
            
        	<dt><input type="checkbox" name="large" id="large" /></dt>
            
            <dd><label for="large">10-14</label></dd>
            
            <dt><input type="checkbox" name="xl" id="xl" /></dt>
            
            <dd><label for="xl">15 +</label></dd>
            
     
                 
        
        </dl>
    
    </form>
        
    <h4 class="h4">Pattern</h4>

    <form>
    
    	<dl class="section group">
    	
        	<dt><input type="checkbox" name="solid" id="solid" /></dt>
            
            <dd><label for="solid">Solid</label></dd>

        	<dt><input type="checkbox" name="pattern" id="pattern" /></dt>
            
            <dd><label for="pattern">Pattern</label></dd>
            
        	<dt><input type="checkbox" name="holiday" id="holiday" /></dt>
            
            <dd><label for="holiday">Holiday</label></dd>
            
            <dt><input type="checkbox" name="theme" id="theme" /></dt>
            
            <dd><label for="theme">Theme</label></dd>
            
     
                 
        
        </dl>
    
    </form>

</aside>		<!--aside-->

<section class="col span_10_of_12 main-content">

<section class="group section row">
	<?php
			
			
		if(isset($_GET['name'])) {
			$category_name = $_GET['name'];
        
			$query = "SELECT
				    product.id AS product_id,
				    product.name AS product_name,
				    product.description AS product_description,
				    product.price AS product_price,
				    product.discount_rate AS product_discount_rate,
				    product.image AS product_image,
				    product.thumb AS product_thumb,
				    category.name AS product_category,
				    published_status.description AS product_published_status,
				    product_review.customer_rating AS product_rating
				FROM
				    ".$db_name.".product product,
				    ".$db_name.".category category,
				    ".$db_name.".published_status published_status,
				    ".$db_name.".product_review product_review
				WHERE
				    product.id = product_review.product_id AND
				    product.category_id = category.id AND
				    product.published_status_id = published_status.id AND
				    category.name = '".mysqli_real_escape_string($mysqli,$category_name)."' AND
				    published_status.description = 'published'";
		} else {
			$query = "SELECT
				    product.id AS product_id,
				    product.name AS product_name,
				    product.description AS product_description,
				    product.price AS product_price,
				    product.discount_rate AS product_discount_rate,
				    product.image AS product_image,
				    product.thumb AS product_thumb,
				    category.name AS product_category,
				    published_status.description AS product_published_status,
				    product_review.customer_rating AS product_rating
				FROM
				    ".$db_name.".product product,
				    ".$db_name.".category category,
				    ".$db_name.".published_status published_status,
				    ".$db_name.".product_review product_review
				WHERE
				    product.id = product_review.product_id AND
				    product.category_id = category.id AND
				    product.published_status_id = published_status.id AND
				    published_status.description = 'published'";
		}
    
		$result = mysqli_query($mysqli, $query);
		
	    
             
		$c = 1; // counter
		$n = 4; //
		
		$lightbox_id = 1;
            
		while($row = mysqli_fetch_array($result)) {
		    
			$product_id = $row['product_id'];
			$product_name = $row["product_name"];
			$product_price = $row["product_price"];
			$product_thumb = $row["product_thumb"];
			$product_discount = $row["product_discount_rate"];
			$product_description = $row["product_description"];
			$product_rating = $row['product_rating'];
		
			if ($product_rating) {
			    // &#9733;
			    
			    $num_stars = $product_rating;
			    $product_rating = "";
			    for($i = 0; $i < $num_stars; $i ++) {
				$product_rating = $product_rating."&#9733;";
			    }
			    
			} else {
				$product_rating = "";
			}
            
			echo '<article class="col span_1_of_4">';
			echo "<img  data-featherlight=\"#productBox"  . $row['product_id'] . "\"  src='"  . $row['product_thumb'] . "' alt='"  . $row['product_name'] . "' />";
			echo "<h2 class='h2' data-featherlight=\"#productBox" . $row['product_id'] . "\">" . $row['product_name'] . "</h2>";
			echo "<span class=\"price\">$" . $row['product_price'] . "/3</span>";
			echo "<div>
				 ".$product_rating."
			      
			      </div>";
              
              
			echo "</article>";
	      
	      
        
			if($c % $n == 0 && $c != 0) {
			  // New table row
			  echo '</div><div class="gridRow">';
			  
			  }
			  $c++;
		} 
            
        	?>  
</section>

</section>
    
</main>


<?php include 'includes/footer.php' ?>


<?php

$result = mysqli_query($mysqli, $query);
while($row = mysqli_fetch_array($result)) {
	
	$product_id = $row['product_id'];
	$product_name = $row["product_name"];
	$product_price = $row["product_price"];
	$product_thumb = $row["product_thumb"];
	$product_discount = $row["product_discount_rate"];
	$product_description = $row["product_description"];
	$product_rating = $row['product_rating'];
    
 	 echo "<article class=\"lightbox\" id=\"productBox"  . $product_id . "\">";
      	
		echo "<h2 class='h2'>" . $product_name . "</h2>";
	  	
		echo "<img src=\"" . $product_thumb . "\" alt=\"Socks\" />";
		
		echo "<ul>";
		
			echo "<li class=\"price\">$" . $product_price . "/3</li>";
			
			echo "<li class=\"alignLeft\">" . $product_description . "</li>";
			
			echo "<li class=\"alignLeft\"><em>sku: </em> " . $product_id . "</li>";
			

		
		echo "</ul>";
					
			
			echo "<a href=\"save_to_cart.php?ProductID=".$product_id."\" class='admin-button embiggen cart-submit' />Add to Cart</a>";
			

	  
	  echo "</article>"; 
	  
} 

?>
<!--light boxes
<article class="lightbox" id="productBox1">
	<h2>The Classic</h2>
	<img src="img/theClassic.png" alt="Socks" />
	<ul>
		<li class="price">$20.99/3</li>
		<li class="alignLeft">This pair of socks is everything you can ask for, classic design, comfort and low price!</li>
		<li class="alignLeft"><em>sku: </em> a322d600532</li>
	</ul>
	<form action="cart.php">
		<input type="submit" name="cartSubmit" class="cartSubmit" value="Add to Cart" />
	</form>
</article>
<article class="lightbox" id="productBox2">
	<h2>The Cornicopia</h2>
	<img src="img/theCornicopia.png" alt="Socks" />
	<ul>
		<li class="price">$20.99/3</li>
		<li class="alignLeft">It's almost time for thanksgiving, and what better to have than a pair of thanksgiving socks!</li>
		<li class="alignLeft"><em>sku: </em> a362d402532</li>
	</ul>
	<form action="cart.php">
		<input type="submit" name="cartSubmit" class="cartSubmit" value="Add to Cart" />
	</form>
</article>
<article class="lightbox" id="productBox3"><h2>Grandmas Wallpaper</h2><img src="img/grandmasWallpaper.png" alt="Socks" /><ul><li class="price">$23.99/3</li><li class="alignLeft">Ah, your childhood at old grandma's house. Rabbit ears, roast beef, and of course grandma's wallpaper</li><li class="alignLeft"><em>sku: </em> a382h50535</li></ul><form action="cart.php"><input type="submit" name="cartSubmit" class="cartSubmit" value="Add to Cart" /></form></article><article class="lightbox" id="productBox4"><h2>The Ruby Slippers</h2><img src="img/theRubySlippers.png" alt="Socks" /><ul><li class="price">$16.99/3</li><li class="alignLeft">Look out, it's the Witch from that movie! Just kidding, have some socks!</li><li class="alignLeft"><em>sku: </em> c538d608732</li></ul><form action="cart.php"><input type="submit" name="cartSubmit" class="cartSubmit" value="Add to Cart" /></form></article><article class="lightbox" id="productBox5"><h2>The Rules For Stud Poker</h2><img src="img/theRulesForStudPoker.png" alt="Socks" /><ul><li class="price">$13.99/3</li><li class="alignLeft">You'll be "dealing poker games" with these handsome socks! Just like your favorite pack of cards</li><li class="alignLeft"><em>sku: </em> a562d623565</li></ul><form action="cart.php"><input type="submit" name="cartSubmit" class="cartSubmit" value="Add to Cart" /></form></article><article class="lightbox" id="productBox6"><h2>The Toy Gun</h2><img src="img/theToyGun.png" alt="Socks" /><ul><li class="price">$13.99/3</li><li class="alignLeft">Relive your childhood playing with your favorite cap guns with these socks! included orange safety caps.</li><li class="alignLeft"><em>sku: </em> g132b23523</li></ul><form action="cart.php"><input type="submit" name="cartSubmit" class="cartSubmit" value="Add to Cart" /></form></article><article class="lightbox" id="productBox7"><h2>AH! Real Socks</h2><img src="img/ahRealSocks.png" alt="Socks" /><ul><li class="price">$22.99/3</li><li class="alignLeft">Bring back those 90s Nickelodeon memories with these almost-genuine real monsters socks!</li><li class="alignLeft"><em>sku: </em> d346s34534</li></ul><form action="cart.php"><input type="submit" name="cartSubmit" class="cartSubmit" value="Add to Cart" /></form></article><article class="lightbox" id="productBox8"><h2>Come On Get Happy</h2><img src="img/comeOnGetHappy.png" alt="Socks" /><ul><li class="price">$15.99/3</li><li class="alignLeft">There'll be a song that you're singing when you buy these bad boys. Hop on the bus and get down with the groovy music. </li><li class="alignLeft"><em>sku: </em> pf346j345346</li></ul><form action="cart.php"><input type="submit" name="cartSubmit" class="cartSubmit" value="Add to Cart" /></form></article><article class="lightbox" id="productBox9"><h2>The REO Speedwagon</h2><img src="img/theREOSpeedwagon.png" alt="Socks" /><ul><li class="price">$20.99/3</li><li class="alignLeft">Grab your acid-washed jeans, spike up that mullet, hit that van and put these socks on for good luck. You'll hearing from a friend who heard that you've got great socks!</li><li class="alignLeft"><em>sku: </em> r4232d234234</li></ul><form action="cart.php"><input type="submit" name="cartSubmit" class="cartSubmit" value="Add to Cart" /></form></article><article class="lightbox" id="productBox10"><h2>The Purist</h2><img src="img/thePurist.png" alt="Socks" /><ul><li class="price">$16.99/3</li><li class="alignLeft">As far as wacky socks are concerned, these are standard issue. Buy these for those boring days at the office</li><li class="alignLeft"><em>sku: </em> ed23rm34534</li></ul><form action="cart.php"><input type="submit" name="cartSubmit" class="cartSubmit" value="Add to Cart" /></form></article>
end of lightboxes-->

	<!-- JavaScript at the bottom for fast page loading -->



<!-- More Scripts-->
<script src="js/responsivegridsystem.js"></script>

    <script src="//code.jquery.com/jquery-latest.js"></script>
	<script src="http://jsliang.com/eqHeight.coffee/jquery.eqheight.js"></script>

<script src="//rawgithub.com/noelboss/featherlight/master/release/featherlight.min.js" type="text/javascript" charset="utf-8"></script>

	<script type="text/javascript">
	$(document).ready(function() {
		$(".row").eqHeight();
	});
	</script>

</body>
</html>