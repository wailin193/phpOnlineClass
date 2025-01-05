<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $arr = [3=>5,6=>10,15,20];
        print_r($arr);

        foreach ($arr as $k => $v) {
            echo "$k : $v<br>";
        }
    ?>
</body>
</html>