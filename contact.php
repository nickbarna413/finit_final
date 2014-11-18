<?php include 'includes/head.php' ?>

<body id="contact">

<?php include 'includes/header.php' ?>



<main class="global-width group section">

<section class="main-content col span_2_of_3">
    
    <h1 class="h1">Contact</h1>
    
    <p>Are you looking to contact us directly? Use the form below and let us know what you need! If you are in need of other support, check the support page for many answered questions and support methods. </p>

    <form action='sendEmail.php' method="POST" class="text-left">
    
    	<fieldset>
    	
            <dl class="group">
        
                <dt><label for="name">Name:</label></dt>
                
                <dd><input type="text" name="name" /></dd>
                
                <dt><label for="email">Email:</label></dt>
                
                <dd><input type="email" name="email" /></dd>
                
                <dt><label for="comments">Comments:</label></dt>
                
                <dd><textarea rows=7 name="comments"></textarea></dd>            
            
            </dl>
            
            <input type="submit" name="submit" class="admin-button" value="Submit" />
        
        </fieldset>
        
    </form>
    
    <div class="success">
        <h2 class="h2">Got it! We will get back to you soon.</h2>
    </div>
    
    <div class="location-map">
        <h2 class="h2">Come pay us a visit</h2>
        <iframe width="500" height="350" frameborder="0" style="border:0" 
        src="https://www.google.com/maps/embed/v1/place?q=4000%20Central%20Florida%20Boulevard%2C%20Orlando%2C%20FL%2C%20United%20States&key=AIzaSyC69sb6vH5yoJr4lmB4dsIbz_16xHpN4R8">
        </iframe>
    </div>

    <div class="contact_legal_div">
        <h2 class="h2">RETURN POLICY</h2>
        <p>Your original sales receipt is necessary for ALL refunds and exchanges. Please keep it in a safe place. A copy of your recipt is emailed to you upon purchase. Unopened socks are eligible for exchange within the first 30 days of 
        purchase, and must include original packaging. Postage marks must indicate shipment within this time period. </p>
        <p>We accept refunds of eligible items within 15 days of the original purchase date. The following items are non-refundable and non-exchangeable: opened items, items without proof of purchase, and damaged or neglected items. Gift Items can be purchased with an extended return policy. All refunds will be in the same form as your original purchase, with the
        exception of refunds over $50.00; which will be mailed from our corporate office in the form of a check. Refund checks will be mailed within 30 days of the merchandise return. FINIT Socks Inc LLC reserves the right to deny any return or 
        modify its return and exchange policy at any time.</p>
        <h2 class="h2">TAX POLICY</h2>
        <p>If socks are subject to sales tax in the state to which the order is shipped, tax is calculated on the total selling price of each individual item. In accordance with state tax laws, the total selling price of an item will 
        generally include item-level shipping and handling charges (none ever!), item-level discounts (some sometimes!), gifting charges, and an allocation of order-level discounts. The amount of tax charged on your order will depend 
        upon many factors including type of item purchased (cotton, wool,etc), and destination of the shipment. Factors can change between the time you place an order and the time of credit card charge authorization, which could affect 
        the calculation of sales taxes. The amount appearing on your order as Estimated Tax may differ from the sales taxes ultimately charged.</p>
        <h2 class="h2">SHIPPING INFORMATION</h2>
        <p>We believe in America, We believe in the american dream, we believe in liberty, and justice for all. We believe in FREEdom. FREEdom for your feet to express themselves in as wild and fun a way as possible, FREEdom for you to
        yell from the highest building and propose on your knees in a puddle, FREEdom to wear the most comfortable socks a man(or woman) could imagine. As such, we believe that our shipping should be completely FREE. That's right, FREE 
        shipping throughout the United States.</p>
        <h2 class="h2">SECURITY POLICY</h2>
        <p>we make it a priority to take our users’ security and privacy concerns seriously. We strive to ensure that user data is kept securely, and that we collect only as much personal data as is required to provide our services to 
        users in an efficient and effective manner. FINIT utilizes some of the most advanced technology for Internet security available today. When you access our site using industry standard Secure Socket Layer (SSL) technology, your 
        information is protected using both server authentication and data encryption, ensuring that your data is safe, secure, and available only to registered Users in your organization. We use physical, procedural, and technical safeguards to preserve the integrity and security of your information.</p>
    </div>


</section>		<!--end of main content-->

<aside class="col span_1_of_3 aside">

	<article>
    
    	<h2 class="h2" class="h2 class="h2"">Contact Info</h2>
    
    	<p>If you can’t find an answer to your question, contact us!</p>
        
        <img src="img/stars.png" alt="stars" />
        
        <p>Send us an email: info@finit.com</p>
        
        <dl>
        
        	<dt>Call us:</dt>
			<dd>321-543-0751 (7am-9pm)</dd>

			<dt>Fax us:</dt>
			<dd>321-543-0752</dd>

			<dt>Good old-fashion letter:</dt>
			<dd>4000 Central Florida Blvd
Orlando, FL 32816</dd>
        
        
        </dl>
    
    </article>

</aside>		<!--end of side bar-->

</main>	<!--end of wrapper-->

<?php include 'includes/footer.php' ?>

<script>
$(document).ready(function() {
    $("#success").hide();
    $("#contactSubmit").click(function sendInfo(evt) {
        evt.preventDefault();
        var Regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var email = $('#email').val();
        var comment = $('#comments').val();
        if( email == '' ){
            $('#contactForm').append('<h3>Oops! You did not enter an E-mail Address.</h3>');
        }
        else if( !Regex.test(email)){
            $('#contactForm').append("<h3>Please enter a valid E-mail Address.</h3>");
        }
        else if(comment == ""){
            $('#contactForm').append("<h3>Oops! You forgot to leave me a comment!");
        }
        else{
            //console.log(email +"  "+ comment);
            $.post("sendEmail.php",{email:email,comment:comment},function(){
                $("#contactForm").hide();
                $("#success").show();
            });
        }
    });
});
</script>

</body>

</html>
