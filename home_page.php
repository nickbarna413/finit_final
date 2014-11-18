<?php include 'php/config.inc.php'; ?>

<?php

// Check connection
if ( mysqli_connect_errno() ) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    $result = mysqli_query($mysqli,"SELECT * FROM product WHERE id = '3'");


    mysqli_close($mysqli);
?> 
<!DOCTYPE html>

<head>

	<meta charset="utf-8">

	<title>Finit Home</title>
	<meta name="description" content="This is the Responsive Grid System, a quick, easy and flexible way to create a responsive web site.">
	<meta name="keywords" content="responsive, grid, system, web design">

	<link rel="shortcut icon" href="/favicon.ico">

	<!-- Responsive and mobile friendly stuff -->
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/html5reset.css" media="all">
	<link rel="stylesheet" href="css/responsivegridsystem.css" media="all">
	<link rel="stylesheet" href="css/col.css" media="all">
	<link rel="stylesheet" href="css/2cols.css" media="all">
	<link rel="stylesheet" href="css/3cols.css" media="all">
	<link rel="stylesheet" href="css/4cols.css" media="all">
	<link rel="stylesheet" href="css/5cols.css" media="all">
	<link rel="stylesheet" href="css/6cols.css" media="all">
	<link rel="stylesheet" href="css/7cols.css" media="all">
	<link rel="stylesheet" href="css/8cols.css" media="all">
	<link rel="stylesheet" href="css/9cols.css" media="all">
	<link rel="stylesheet" href="css/10cols.css" media="all">
	<link rel="stylesheet" href="css/11cols.css" media="all">
	<link rel="stylesheet" href="css/12cols.css" media="all">
	<link rel="stylesheet" type="text/css" href="css/stylesHome.css">


	<!-- Responsive Stylesheets-->
    <link rel="stylesheet" media="only screen and (max-width: 1280px) and (min-width: 1025px)" href="css/1280.css">
	<link rel="stylesheet" media="only screen and (max-width: 1024px) and (min-width: 769px)" href="css/1024.css">
	<link rel="stylesheet" media="only screen and (max-width: 768px) and (min-width: 481px)" href="css/768.css">
	<link rel="stylesheet" media="only screen and (max-width: 480px)" href="css/480.css">
	
	<!-- All JavaScript at the bottom, except for Modernizr which enables HTML5 elements and feature detects -->
	<script src="js/modernizr-2.5.3-min.js"></script>
    
    <!--google fonts-->
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=PT+Serif:400,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Oswald:400,700' rel='stylesheet' type='text/css'>

</head>

<body>

<header>
	
    <a class="mobile-logo" href="/"><img src="img/logo_mobile.png" alt="Finit Clothing" /></a> 
	
    <section class="contrast fixed">
    
		<section class="section group global-width">

        
        	<form action="search.php" method="get" class="col span_5_of_12 search">
                
                    <input  class="text-input" type="text" name="search_results" placeholder="Search" />
                    
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


        <nav class="global-width main-nav">
        
            <ul class="group section">
                
                <li class="col span_1_of_7 left"><a href="catalog.php?name=Men%27s">Mens</a></li>
                <li class="col span_1_of_7 left"><a href="catalog.php?name=Women%27s">Womens</a></li>
                <li class="col span_1_of_7 left"><a href="catalog.php?name=Child%27s">Childrens</a></li>
                <li class="col span_1_of_7 center"><a class="image-replace white-logo center" href="home_page.php">Finit Clothing</a></li>
                <li class="col span_1_of_7 right"><a href="catalog.php?name=Limited">Limited</a></li>
                <li class="col span_1_of_7 right"><a href="support.php">Support</a></li>
                <li class="col span_1_of_7 right"><a href="contact.php">Contact</a></li>
                
            </ul>
        
        </nav>    
        
        <article class="group section"><span class="block-text fancy-em">The Newest Sock Trends</span> <span class="block-text normal-em">At The Best Prices Around</span><br>
        <span class="block-text small-em">- Save Up To -</span> <span class="block-text mega-em">50%</span></article>            
        
</header>

<main class="global-width">
	
    <section class="section group">
    
    	<article class="col span_4_of_12">
        
        	<div class="image-nav">		<!--these are only for background image responsiveness-->
        	
            	<a href="catalog.php?name=Men%27s"  class="mens-image image-replace">Men's Socks</a>
		
        	</div>
        
        </article>
        
        <article class="col span_4_of_12">

        	<div class="image-nav">		<!--these are only for background image responsiveness-->
            
            	<a href="catalog.php?name=Women%27s" class="womens-image image-replace">Women's Socks</a>
 
 			</div>
                       
      </article>
         
         <article class="col span_4_of_12">
 
         	<div class="image-nav">		<!--these are only for background image responsiveness-->
                       
            	<a href="catalog.php?name=Child%27s" class="childrens-image image-replace">Children's Socks</a>
 			
            </div>
                    
         </article>
    
   </section><!--end of body nav-->
   
   <section class="section group">
    
        <article class="col span_4_of_12">
            
			<img class="body-image" src="img/fallSale.jpg" alt="Fall sale 20% select lines" />	
            
        </article>
        
        <article class="col span_8_of_12">
        
        	<section class="section group">
            
            <img class="col span_1_of_2 limited-ad" src="img/limitedAd.gif" alt="Special socks for a short time only" /><img class="col span_1_of_2 limited-ad-small" src="img/limitedAd-Small.gif" alt="Special socks for a short time only" />

 			<div class="col span_1_of_2 featured-ad">
			
			<?php 
            
                while($row = mysqli_fetch_array($result)) {
      
                    echo "<h3 class=\"h3\">" . $row['name'] . "</h3>";
                    
                    echo "<img class=\"liquid-image\" src='" . $row['thumb'] . "' alt=\"Grandmas Wallpaper\" />";
         
                    echo "<div class=\"featured-price\">$" . $row['price'] . "</div>";
                
                }
                
          ?>
        	</div>

			</section>

      </article>
      
     
    
  </section>
  
  <section class="section">
  
  	<article class="col span_12_of_12 shipping">
    
		<span><em class="em">FREE</em> Shipping*</span>
   
    </article>
    
  </section>		<!--end of free shipping box-->
  
  	<nav class="section group ribbons">
    
    	<ul>
        
        	<li class="col span_4_of_12"><a href="http://www.facebook.com"><img src="img/facebookRibbon.png" alt="facebook" /></a></li>
            <li class="col span_4_of_12"><a href="http://www.twitter.com"><img src="img/twitterRibbon.png" alt="Twitter" /></a></li>
            <li class="col span_4_of_12"><a href="http://www.pinterest.com"><img src="img/pinterestRibon.png" alt="Pinterest" /></a></li>
         
        </ul>
    
    </nav>		<!--end of social nav-->
    
</main>


<?php include 'includes/footer.php' ?>



	<!-- JavaScript at the bottom for fast page loading -->



<!-- More Scripts-->
<script src="js/responsivegridsystem.js"></script>

	<script src="http://code.jquery.com/jquery.min.js"></script>
	<script src="http://jsliang.com/eqHeight.coffee/jquery.eqheight.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		$(".row").eqHeight();
	});
	</script>

</body>
</html>