<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_POST["btnitem"]))
        {
            include "dbhandler.php";
            $name = $_POST["itemname"];
            $description = $_POST["itemdescription"];
            $price = $_POST["itemprice"];

            // echo "$name , $description, $price";

            //file upload
            $location = "images/".$_FILES["itemimage"]["name"];
            $success = 1;
            $type=strtolower($_FILES["itemimage"]["type"]);
            if($_FILES["itemimage"]["error"])
            {
                echo "Error Found in Uploading...";
                $success=0;
            }
            else if($_FILES["itemimage"]["size"]>10*1024*1024)
            {
                echo "File Size is too Large!";
                $success = 0;
            }
            else if($type!="image/png" && $type!="image/jpg" && $type!="image/jpeg")
            {
                echo "Only Image is Allowed!";
                $success=0;
            }
            if($success)
            {
                if(move_uploaded_file($_FILES["itemimage"]["tmp_name"],$location))
                {
                    $id = insertItem($name,$description,$price,$_FILES["itemimage"]["name"]);
                    echo "<h1 class='header'>Successfully Uploaded! Current Item Id is $id</h1>";
                    echo "<img src='".$location."' alt='".$_FILES["itemimage"]["name"]."'>";
                }
            }
            // else{
            //     echo "File Uploading Error.";
            // }
        }
        ?>
</body>
</html>