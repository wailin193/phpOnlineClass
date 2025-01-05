<?php
    if(isset($_POST["lemail"]))
    {
    print_r($_POST);
    $e = $_POST['lemail'];
    $p = $_POST['lpassword'];
?>

<form action="C.php" method="post">
    <input type="hidden" name="email" value="<?php echo $e; ?>">
    <input type="hidden" name="password" value="<?php echo $p; ?>">
    <input type="submit" value="Go To C">
</form>

<?php
    }
?>