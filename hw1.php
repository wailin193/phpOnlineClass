<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>BMI Calculator</title>
	<style type="text/css">
		.answer{
			color: green;
		}
	</style>
</head>
<body>
	<form method="post" action="">
		<table>
			<tr>
				<td>Weight</td>
				<td>
					<input type="" name="weightlb">
				</td>
				<td>lb</td>
			</tr>
			<tr>
				<td>Height</td>
				<td>
					<input type="" name="heightinches">
				</td>
				<td>inches</td>
			</tr>
			<tr>
				<td>
					<input type="submit" name="calculatebmi" value="Calculate">
				</td>
			</tr>
		</table>

		<?php 
			if (isset($_POST['heightinches'])) {
				$weight = $_POST['weightlb'] * 0.454;
			$height = $_POST['heightinches'] * 0.0254;
			$bmi = $weight / ($height*$height);

			echo "<h3 class='answer'>The BMI is $bmi</h3>";
			}
		 ?>
	</form>
</body>
</html>