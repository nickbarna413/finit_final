<?php include 'includes/head.php' ?>

<body id="client">

<?php include 'includes/header.php' ?>


<main class="global-width section group">

<aside class="col span_1_of_5">

	<h1 class="h1">User Profile</h1>

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

<section class="col span_4_of_5 main-content">

		<article class="user-article">

            <h2 class="h2">User Information</h2>
            
            <dl>
            
                <dt>First Name:</dt><dd><span>John</span></dd>
                
                <dt>Last Name:</dt><dd><span>Doe</span></dd>
                
                <dt>Address:</dt><dd><span>123 John Street</span><span>Orlando</span><span>Florida</span><span>32816</span></dd>
                
                <dt>Email Address:</dt><dd><span>johndoesattheend@gmail.com</span></dd>
                
                <dt>Password:</dt><dd><span>************************************************************</span></dd>
            
            
            </dl>
        
        </article>

		<article class="user-article">

            <h2 class="h2">Billing Information</h2>
            
            <span class="h3">Card One</span>
            <dl>
            
                <dt>Card Type:</dt><dd><span>Visa</span></dd>
                
                <dt>Card Name:</dt><dd><span>John Q Doe</span></dd>
                
                <dt>Card Number:</dt><dd><span>****-****-****-5644</span></dd>
    
            
            
            </dl>
            
         </article>
         
         <article class="user-article">
    
            <h2 class="h2">My Orders</h2>
            
            <span class="h3">Currrent Orders</span>
            
            <p>You do not have any current orders.</p>

		</article>
        
        <article class="user-article">
        
            <h2 class="h2">Cancel Account</h2>
            
            <p>If you would like to cancel your account, click the button below. </p>
            
            <form action="cancel.php">
            
                <input type="submit" class="admin-button" value="CANCEL" />
            
            </form>

	</article>

</section>		<!--end of main content-->


</main>	<!--end of wrapper-->

<?php include 'includes/footer.php' ?>



</body>

</html>
