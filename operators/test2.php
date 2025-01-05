<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sum of Digits</title>
    <link rel="stylesheet" href="mystyle.css">
</head>
<body>
    <form method="post" action="" class="myform">
        <div class="row">
            <label for="">Enter Four Digits Number</label>
            <input type="number" min="1000" max="9999" class="datainput" name="inputnumber" required>
        </div>
        <div class="btndiv">
            <input type="submit" value="Sum of Digits" class="btn">
        </div>
        <h1 class="answer">
    <?php
    /*
        2345 = 2 + 3 + 4 + 5
    */
    if(isset($_POST["inputnumber"])){
        $n=$_POST["inputnumber"];
        $fd = (int)($n / 1000);
        $sd = (int)($n % 1000 /100);
        $td = (int)($n %100 /10);
        $fud = $n % 10;
        $sum = $fd + $sd + $td + $fud;
        echo "Sum of Digits for ".$n." = ".$sum;
    }
    ?>
    </h1>
    </form>
    
</body>
</html>