<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="mystyle.css">
</head>
<body>
    <form method="post" action="" class="myform">
        <div class="row">
            <label for="">Enter a number</label>
            <input type="number" class="datainput" name="userno" required>
        </div>
        <div class="btndiv">
            <input type="submit" value="Check" class="btn">
        </div>
        <?php
            if(isset($_POST["userno"])){
                $no = $_POST["userno"];
                echo $no%2 == 0?'<h1 class="pass">Even</h1>':'<h1 class="fail">Odd</h1>';
            }
        ?>
    </form>
</body>
</html>