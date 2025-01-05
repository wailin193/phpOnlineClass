<?php
    print_r($_POST);

    $e = $_POST["lemail"];
    $p = $_POST["lpassword"];
?>

<a href="C.php?email=<?php echo $e; ?>&pass=<?php echo $p; ?>">GO TO C</a>