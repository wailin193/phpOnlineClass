<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<?php 
	// const PI = 3.142;
	// // PI = 4.5;
	// echo PI;

	define("PI",3.142);
	$area = PI*2*2;
	echo $area."<br>";

	echo "Line NO.".__LINE__."<br>";
	echo "In".__FILE__."<br>";
 ?>
</body>
</html>