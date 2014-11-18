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

    	<h2 class="h2">Checkout</h2>
        
        <table>
        
        	<tr>
            
            	<th class="tableHeader">Item</th>
                
                <th class="tableHeader">Description</th>
                
                <th class="tableHeader">Qty</th>
                
                <th class="tableHeader">Price</th>
            
            </tr>
            
            <tr>
            
            <?php 
			
			while($row = mysqli_fetch_array($result)) {
  
				echo "<td><img src='" . $row['productimage'] . "' alt=\"Grandmas Wallpaper\" /></td>";
				
				echo "<td>" . $row['name'] . "</td>";
				
				echo "<td>1</td>";
				
				echo "<td>$" . $row['price'] . ".99</td>";

			}
      		?>
            
             </tr>
             
            <tr class="order-total">
            
               <td></td><td></td><td></td><td>$314.86</td>
            
            </tr>             
        
        </table>


     	<h2 class="h2">Shipping Information</h2>
        
            <form class="group text-left">
    
                <fieldset>
                
                    <dl>
                
                        <dt><label for="name">Name:</label></dt>
                        
                        <dd><input type="text" name="name" id="name" /></dd>
                        
                        <dt><label for="email">Email:</label></dt>
                        
                        <dd><input type="text" name="email" id="email" /></dd>
                        
                        <dt><label for="coAddress">Address:</label></dt>
                        
                        <dd><input type="text" name="coAddress" id="coAddress" /></dd>          
            
                        <dt><label for="coCity">City:</label></dt>
                        
                        <dd><input type="text" name="coCity" id="coCity" /></dd>   
                        
                         <dt><label for="coState">State:</label></dt>
                        
                        <dd><input type="text" name="coState" id="coState" /></dd>   
                    
                    </dl>
        
                
                </fieldset>
    	
        </form>

     	<h2 class="h2">Billing Information</h2>
        
        <form class="group text-left">
    
            <fieldset>
                
                <dl>
            
                    <dt><label for="creditType">Card Type:</label></dt>
                    
                    <dd><input type="text" name="creditType" id="creditType" /></dd>
                    
                    <dt><label for="creditName">Card Name:</label></dt>
                    
                    <dd><input type="text" name="creditName" id="creditName" /></dd>
                    
                    <dt><label for="creditNumber">Card Number:</label></dt>
                    
                    <dd><input type="text" name="creditNumber" id="creditNumber" /></dd>          
        
                    <dt><label for="creditExp">Expiration Date:</label></dt>
                    
                    <dd><input type="text" name="creditExp" id="creditExp" /></dd> 
        
                    <dt><label for="creditSec">Security Code:</label></dt>
                    
                    <dd><input type="text" name="creditSec" id="creditSec" /></dd> 
                
                    <dt><label for="cardNumber">or use a saved card:</label></dt>
                    
                    <dd class="embiggen"><input type="checkbox" name="cardNumber" id="cardNumber">****-****-****-5644</dd>
                
                </dl>

    		 </fieldset>
    
    	</form>

		<form action="thanks.php" class="group">
        
        	<input type="submit" class="admin-button" name="cartSubmit" value="Check Out" />
       
        </form>
           
</section>		<!--end of main content-->


</main>	<!--end of wrapper-->

<?php include 'includes/footer.php' ?>



</body>

</html>
