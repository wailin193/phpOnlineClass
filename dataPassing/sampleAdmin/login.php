<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="fromcontainer">
        <form action="login.php" method="post" class="loginform">
            <?php
                if(isset($_POST["lemail"]))
                {
                    $e = $_POST["lemail"];
                    $p = $_POST["lpassword"];
                    if($e == "john@gmail.com" && $p == "john123")
                    {
                        $_SESSION["adminID"]="001";
                        $_SESSION["adminEmail"]=$e;
                        header("Location:index.php");
                    }
                    else if($e=="mgmg@gmail.com" && $p=="mgmg123")
                    {
                        $_SESSION["adminID"]="002";
                        $_SESSION["adminEmail"]=$e;
                        header("Location:index.php");
                    }
                    else{
                        echo "<h2>Try Again!</h2>";
                    }
                }
            ?>
            <div class="row">
                <label for="">Email</label>
                <input type="email" name="lemail" required>
            </div>
            <div class="row">
                <label for="">Password</label>
                <input type="password" name="lpassword" required>
            </div>
            <div class="btndiv">
                <input type="submit" value="Login" name="btnlogin" class="btn btnlogin">
                <input type="reset" value="Clear" name="btnclear" class="btn btnclear">
            </div>
        </form>
    </div>
</body>
</html>