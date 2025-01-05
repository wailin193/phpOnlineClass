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
            <label for="">Myanmar Mark</label>
            <input type="number" min="0" max="100" name="myan" required class="datainput">
        </div>
        <div class="row">
            <label for="">English Mark</label>
            <input type="number" min="0" max="100" name="eng" required class="datainput">
        </div>
        <div class="row">
            <label for="">Mathematic Mark</label>
            <input type="number" min="0" max="100" name="math" required class="datainput">
        </div>
        <div class="btndiv">
            <input type="submit" value="Pass/Fail" class="btn">
        </div>
        <?php
            if(isset($_POST["myan"]))
            {
                $myan = $_POST["myan"];
                $eng = $_POST["eng"];
                $math = $_POST["math"];
                
                echo $myan >= 40 && $eng >= 40 && $math >= 40
                ? "<h1 class='pass'>You Pass The Exam!</h1>"
                : "<h1 class='fail'>You Fail The Exam!</h1>";

                // if($myan >= 40 && $eng >= 40 && $math >= 40)
                // {
                //     echo "<h1 class='pass'>You Pass The Exam!</h1>";
                // }else{
                //     echo "<h1 class='fail'>You Fail The Exam!</h1>";
                // }
            }
        ?>
    </form>
</body>
</html>