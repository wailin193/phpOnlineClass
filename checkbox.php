<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Hobbies</label>
        <input type="checkbox" name="hobbies[]" value="Reading">Reading
        <input type="checkbox" name="hobbies[]" value="Music">Music
        <input type="checkbox" name="hobbies[]" value="Travelling">Travelling
        <input type="submit" name="btn">
        <?php
            if(isset($_POST["hobbies"])){
                $arr = $_POST["hobbies"];
                print_r($arr);
            }
        ?>
    </form>
</body>
</html>