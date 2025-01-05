<?php
    session_start();

    if(isset($_POST["lemail"]))
    {
    print_r($_POST);
    $e = $_POST['lemail'];
    $p = $_POST['lpassword'];

    $_SESSION['email'] = $e;
    $_SESSION['password'] = $p;
    }
?>

<a href="C.php">Go C</a>