<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<style type="text/css">
		.age{
			color: blue;
		}
	</style>
</head>
<body>
	<form method="post" action="">
		<table>
			<tr>
				<td>Birth Year</td>
				<td>
					<input type="" name="birthyear" required>
				</td>
				<td>
					<input type="submit" name="calage" value="Calculate Age">
				</td>
			</tr>
		</table>
		<?php 
		if (isset($_POST['birthyear'])) {
			$age = 2024 - $_POST['birthyear'];
		echo "<p class='age'>Your age is $age </p>";
		}
		 ?>
	</form>
</body>
</html>