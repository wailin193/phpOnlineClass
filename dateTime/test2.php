<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        footer{
            background-color: black;
            color: white;
            text-align: center;
            padding: 1px 0px;
        }
    </style>
</head>
<body>
    <section>
        Content
    </section>

    <footer>
        <p>
            $copy; by ABC Company.
        </p>
        <p>
            2000 - 
            <?php
                echo date("Y");
            ?>
        </p>
        <p>
            All Right Reserved.
        </p>
    </footer>
</body>
</html>