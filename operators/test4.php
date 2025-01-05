<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="mystyle.css">
</head>
<body>
    <form action="" method="post" class="myform">
        <div class="row">
            <label for="">Name</label>
            <input type="text" name="username" class="datainput">
        </div>
        <div class="btndiv">
            <input type="submit" value="Check" class="btn">
        </div>
        <?php
            // $name = $_POST["username"]??"Unknown";
            // echo "<h1>".$name."</h1>";

            // echo 5 <=> 4;
        ?>
    </form>
</body>
</html>