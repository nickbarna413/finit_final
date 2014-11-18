<?php include 'php/config.inc.php'; ?>

<?php include 'includes/head.php' ?>

<body id="search">


<?php include 'includes/header.php' ?>


<main class="global-width section group main-content">

<h1 class="h1">Search Results</h1>

<?php 


if(preg_match("/^[A-Za-z]+/", $_GET['search_results'])) { 
	


$result = mysqli_query($mysqli,"SELECT * FROM product WHERE name LIKE '%$_GET[search_results]%'");


 while($ser = mysqli_fetch_array($result)) {
	echo "<article class=\"search-results\">";
	echo "<a href='product.php?name=" . $ser['name'] . "&desc=" . $ser['description'] . "&price=" . $ser['price'] . "&thumb=" . $ser['thumb'] . "'><h2 class=\"h2\">" . $ser['name'] . "</h2></a>";
	echo "<img src='" . $ser['thumb'] . "' alt='" . $ser['name'] . "' />"; 
	echo "<p>" . $ser['description'] . "</p>";
	echo "<span class='h3'>" . $ser['price'] . "</span>";
	echo "</article>";
	}
	
} else if (!$_GET['search_results']) {
	print "<h2 class='h2'>You didn't search for anything...</h2>";

} else {
	print "<h2 class='h2 red'>You're doing evil things and should be ashamed</h2>";
	
}
?>

</main>	<!--end of wrapper-->

<?php include 'includes/footer.php' ?>



</body>

</html>
