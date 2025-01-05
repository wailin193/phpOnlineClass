<?php
    session_start();
    if(isset($_GET["action"]))
    {
        if($_GET["action"]=="logout")
        {
            unset($_SESSION["adminID"]);
            unset($_SESSION["adminEmail"]);
        }
    }

    if(!isset($_SESSION["adminID"]))
    {
        header("Location:login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $id = $_SESSION["adminID"];
        $e = $_SESSION["adminEmail"];
        echo "<h2>$id</h2>"."<br>"."<h3>$e</h3>";
    ?>
    <div>
        <a href="login.php?action=logout"><span class="text_primary">Logout</span></a>
    </div>
</body>
</html>