<header>
	
 
	
    <section class="contrast fixed">
    
		<section class="section group global-width">

        
        	<form action="search.php" method="get" class="col span_5_of_12 search">
                
                    <input  class="text-input" type="text" name="search_results" placeholder="Search" data-validation="alphanumeric" />
                    
                    <input id="search-submit" type="image"  alt="Submit" src="img/searchButton.png" name="search"  />
                
                </form>
                


                <nav class="hor-nav col span_5_of_12 floatright">
                
                    <ul> 
                    
                        <li><a class="image-replace facebook-icon" href="http://www.facebook.com">Facebook</a></li>
                        <li><a class="image-replace twitter-icon" href="http://www.twitter.com/">Twitter</a></li>
                        <li><a class="image-replace rss-icon" href="http://www.google.com/">RSS</a></li>
                        <li><a class="image-replace linkedin-icon" href="http://www.linkedin.com/">Linked in</a></li>
                        <li><a class="image-replace pinterest-icon" href="http://www.pinterest.com/">Pinterest</a></li>
                
                    </ul>
                               
                </nav>
                                
                <article class="col span_2_of_12 right welcome">
                
                <?php 
                    if (isset($_SESSION['user_id']) ) {
                        echo '<span>Welcome, <a href="client.php">'.$_SESSION["username"].'</a></span>';
                    }
                    else{
                        echo '<span>Welcome, <a href="home_page.php">Guest</a></span>
                              <br />
                              <span><a href="login.php">Login</a>/<a href="register.php">Register</a>';
                    }  
                ?>
                
                
                </article>		<!--end of login box-->

    	</section>		<!--end of top bar wrap-->
    
    </section>		<!--end of top bar-->
    
    <nav class="main-nav section group">
    
    	<ul class="global-width">
        
        	<li class="left col span_1_of_8"><a class=" black-logo image-replace" href="home_page.php">Finit Clothing</a></li>
        	<li class="col span_1_of_8 center"><a href="catalog.php?name=Men%27s">Men</a></li>
            <li class="col span_1_of_8"><a href="catalog.php?name=Women%27s">Women</a></li>
            <li class="col span_1_of_8"><a href="catalog.php?name=Youth%27s">Youth</a></li>
            <li class="col span_1_of_8"><a href="catalog.php?name=Limited">Limited</a></li>
            <li class="col span_1_of_8"><a href="support.php">Support</a></li>
            <li class="col span_1_of_8"><a href="contact.php">Contact</a></li>
            <li class="col span_1_of_8"><a class="image-replace cart-icon" href="cart.php">Cart</a></li>

    	</ul>
        
    </nav>		<!--end of main nav-->	

</header>