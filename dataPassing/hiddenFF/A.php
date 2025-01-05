<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
    <div class="formcontainer">
        
    <form action="B.php" method="post" class="loginform">
        <div class="row">
            <label for="">Email</label>
            <input type="email" name="lemail" required >
        </div>
        <div class="row">
            <label for="">Password</label>
            <input type="password" name="lpassword" required >
        </div>
        <div class="btndiv">
            <input type="submit" value="Login" name="btnlogin" class="btn btnlogin">
            <input type="reset" value="Clear" name="btnclear" class="btn btnclear">
        </div>
    </form>
    </div>
</body>
</html>