<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $year = 4;
        switch ($year) {
            case 1:echo"First Year<br>";break;
            case 2:echo "Second Year<br>";break;
            case 3:echo "Third Year<br>";break;
            case 4:echo "Final Year<br>";break;
            default:echo "Wrong Input<br>";
        }
        echo "Finish!!!";
    ?>
</body>
</html>