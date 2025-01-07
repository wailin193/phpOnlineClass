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
    <?php
        if(isset($_POST["btnitem"]))
        {
            include "dbhandler.php";
            if($_POST["btnitem"]=="Insert Item")
            {
                //insert item
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
                        $id = DBHandler::insertItem($name,$description,$price,$_FILES["itemimage"]["name"]);
                        $msg = "Successfully Uploaded! Current Item Id is $id";
                        header("Location:itemManage.php?msg=$msg");
                        exit();
                        // echo "<img src='".$location."' alt='".$_FILES["itemimage"]["name"]."'>";
                    }
                    else{
                        echo "Error Found in Uploading...";
                    }
                }
            }
            else{
                //update item
                $name = $_POST["itemname"];
                $description = $_POST["itemdescription"];
                $price = $_POST["itemprice"];

                // print_r($_FILES["itemimage"]);

                //file upload
                if(isset($_FILES["itemimage"]) && !$_FILES["itemimage"]["error"])
                {
                    //with image
                    $location = "images/".$_FILES["itemimage"]["name"];
                    if(file_exists($location))
                    {
                        //already exit
                        $iid= $_SESSION["uiid"];
                        $image= $_SESSION["uimage"];
                        $msg= "<script>alert('Image is already exit!');</script>";
                        header("Location:itemManage.php?msg=$msg&action=update&iid=$iid&iimg=$image&iname=$name&iprice=$price&ides=$description");
                        // exit();
                    }
                    else{
                        //with new image
                        unlink("images/".$_SESSION["uimg"]);
                        unset($_SESSION["uimg"]);
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
                                $row = DBHandler::updateItem($_SESSION["uiid"],$name,$description,$price,$_FILES["itemimage"]["name"]);
                                if($row>0)
                                {
                                    unset($_SESSION["uiid"]);
                                    $msg = "Successfully Updated!";
                                    header("Location:itemManage.php?msg=$msg");
                                    exit();
                                }
                                else{
                                    unset($_SESSION["uiid"]);
                                    $msg = "Successfully Updated!";
                                    header("Location:itemManage.php?msg=$msg");
                                    exit();
                                }
                            }
                            else{
                                echo "Error Found in Uploading...";
                            }
                        }
                    }
                }
                else{
                    //no image
                    $row = DBHandler::updateItemNoImage($_SESSION["uiid"],$name,$description,$price);
                    if($row>0)
                    {
                        unset($_SESSION["uiid"]);
                        $msg = "Successfully Updated!";
                        header("Location:itemManage.php?msg=$msg");
                        exit();
                    }
                    else{
                        unset($_SESSION["uiid"]);
                        $msg = "Successfully Fail!";
                        header("Location:itemManage.php?msg=$msg");
                        exit();
                    }
                }
            }
        }
        ?>
</body>
</html>