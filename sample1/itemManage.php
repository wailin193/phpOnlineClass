<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <title>Item Management</title>
    <style>
        th{
            width: 10%;
        }
        .sth{
            width: 5%;
        }
        .lth{
            width: 60%;
        }
    </style>
</head>
<body>
    <div class="container">
    <?php
        include "dbhandler.php";
        if(isset($_GET["action"]))
        {
            $iid = $_GET["iid"];
            if($_GET["action"]=="delete")
            {
                //delete
                $iimg = $_GET["iimg"];
                $iname = $_GET["iname"];

    ?>
            <script>
                if(confirm("Do you want to delete?<?php echo $iname; ?>"))
            {
                // alert("Oki");
                <?php 
                if(DBHandler::deleteItem($iid))
                {
                    unlink("images/$iimg");
                    $msg = "Successfully Deleted!";
                }
                ?>
                location.assign("itemManage.php?msg=<?php echo $msg ?>");
            }
            </script>
    <?php
            }
            else{
                //update
            }
        }
    ?>
        <form action="upload.php" method="post" enctype="multipart/form-data">
        <?php
            if(isset($_GET["msg"]))
            {
                echo "<h3 class='text-center text-danger>".$_GET['msg']."</h3>";
            }
        ?>
            <h3 class="text-primary text-center my-3">Insert Item</h3>
            <div class="row mb-3">
                <div class="col-md-3 offset-md-2 col-12">
                    <label for="" class="fw-bold mb-md-0 mb-3">Item Name</label>
                </div>
                <div class="col-md-5 col-12">
                    <input type="text" name="itemname" class="form-control" required autofocus>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 offset-md-2 col-12">
                    <label for="" class="fw-bold mb-md-0 mb-3">Item Description</label>
                </div>
                <div class="col-md-5 col-12">
                    <textarea name="itemdescription" id="" rows="7" class="form-control"></textarea>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 offset-md-2 col-12">
                    <label for="" class="fw-bold mb-md-0 mb-3">Item Price</label>
                </div>
                <div class="col-md-5 col-12">
                <input type="number" name="itemprice" class="form-control" min="100" max="999999" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-3 offset-md-2 col-12">
                    <label for="" class="fw-bold mb-md-0 mb-3">Item Image</label>
                </div>
                <div class="col-md-5 col-12">
                <input type="file" name="itemimage" class="form-control" required>
                </div>
            </div>

            <div class="text-center">
                <input type="submit" value="Insert Item" class = "btn btn-primary" name="btnitem">
                <input type="reset" value="Clear" class="btn btn-warning">
            </div>
        </form>

        <h3 class="text-primary mt-5 text-center">List of Items</h3>
        <table class="table table-light table-striped my-3">
            <tr>
                <th class="sth">No</th>
                <th class="sth">Item Id</th>
                <th class="mth">Name</th>
                <th class="mth">Image</th>
                <th class="sth">Price</th>
                <th class="lth">Description</th>
                <th class="sth"></th>
            </tr>
            <?php

                $items = DBHandler::getAllItems();
                $no=1;
                foreach($items as $item)
                {
                    $iid = $item['iid'];
                    $name = $item['iname'];
                    $image = $item['iimage'];
                    $price = $item['iprice'];
                    $des = $item['idescription'];

                    echo "<tr>";
                    echo "<td>$no</td>";
                    echo "<td>".$iid."</td>";
                    echo "<td>".$name."</td>";
                    echo "<td><img src='images/".$image."' class='img-fluid'></td>";
                    echo "<td>".$price."</td>";
                    echo "<td>".$des."</td>";
                    echo "<td>";
                    echo "<a href='?action=update&iid=$iid'><i class='bi bi-pencil-square text-warning'></i></a>";
                    echo "<a href='?action=delete&iid=$iid&iimg=$image&iname=$name'><i class='bi bi-trash3-fill text-danger'></i></a>";
                    echo "</td>";
                    echo "</tr>";
                    $no++;
                }
            ?>
        </table>
    </div>
</body>
</html>