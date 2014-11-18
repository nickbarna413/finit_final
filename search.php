<?php include 'php/config.inc.php'; ?>

<?php include 'includes/head.php' ?>

<body id="edit">


<?php include 'includes/header.php' ?>


<main class="global-width section group main-content">

<h1 class="h1">Search Results</h1>

<?php 

$result = mysqli_query($mysqli,"SELECT * FROM products WHERE name LIKE '%$_GET[search_results]%'");


 while($ser = mysqli_fetch_array($result)) {
	echo "<article class=\"search-results\">";
	echo "<h2 class=\"h2\">$ser[name]</h2>";
	echo "<p>$ser[description]</p>";
	echo "<span>$" . $ser['price'] . ".99</span>";
	echo "</article>";
}

?>

</main>	<!--end of wrapper-->

<?php include 'includes/footer.php' ?>



</body>

</html>
