<?php
    if(isset($_POST["lemail"]))
    {
    print_r($_POST);
    $e = $_POST['lemail'];
    $p = $_POST['lpassword'];

    setcookie("email",$e,time()+3600);
    setcookie("password",$e,time()+ 3600);
    }
?>

<a href="C.php">Go C</a>