<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<?php 
	if (isset($_POST['loginemail'])) {
		$uemail = $_POST['loginemail'];
		$upw = $_POST['loginpassword'];
		echo "<h1>Your email is $uemail.</h1>";
		echo "<h1>Your password is $upw.</h1>";
	}
 ?>
</body>
</html>