<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Bill</title>
    <style>
        th {
            width: 11%;
        }

    </style>

    <script>
        //lacture 39
        let chgqty=(e)=> {
            let tre = e.parentNode.parentNode;
            let tdArr = tre.children;
            let updateID = tdArr[1].innerHTML;
            let qty = e.value;
            location.assign("?updateID="+updateID+"&qty="+qty);
        }
    </script>
</head>
<body>
    <a href="index.php" class="btn btn-primary">Continue Shopping</a>
    <!-- lacture 39 -->
    <?php
        if(isset($_SESSION["orders"])) {
            if(isset($_GET["action"])) {
                if($_GET["action"] == "removeAll") {
                    unset($_SESSION["orders"]);
                    header("location:index.php");
                }
            }

            if(isset($_GET["updateID"])) {
                $uid = $_GET["updateID"];
                $qty = $_GET["qty"];
                $arr = $_SESSION["orders"][$uid];
                $arr["qty"] = $qty;
                $_SESSION["orders"][$uid] = $arr;
            }

            if(isset($_GET["rid"])) {
                $rid = $_GET["rid"];
                unset($_SESSION["orders"][$rid]);
                if(count($_SESSION["orders"])==0) {
                    unset($_SESSION["orders"]);
                }
                // header("location:bill.php");
                // exit();
                echo "<script>location.assign('bill.php');</script>";
            }
    ?>

    <h3 class="text-primary text-center">List of Items in your cart!!!</h3>
    <table class="table table-light table-striped">
        <tr>
            <th>No.</th>
            <th>ID</th>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Total</th>
            <th></th>
        </tr>

        <?php
            $arr = $_SESSION["orders"];
            // print_r($arr);
            $no = 1;
            $alltotal = 0;
            foreach($arr as $item) {
                // print_r($item);
                $iid = $item["id"];
                $name = $item["name"];
                $image = $item["image"];
                $price = $item["price"];
                $qty = $item["qty"];
                $total = $qty*$price;
                $alltotal += $total;
                echo "<tr>";
                echo "<td>$no</td>";
                echo "<td>$iid</td>";
                echo "<td>$name</td>";
                echo "<td><img src='images/images/$image' class='img-fluid' /></td>";
                echo "<td>$price</td>";
                echo "<td><input type='number' value='$qty' min='1' id='qty' onchange='chgqty(this);' /></td>";
                echo "<td>$total</td>";
                echo "<td><a href='?rid=$iid' class='btn btn-danger'>Remove</a></td>";
                echo "</tr>";
                $no+=1;
            }
        ?>
        <tr class="table-primary">
            <!-- colspan ka column tway poung -->
            <td colspan="6">All Total</td> 
            <td><?php echo $alltotal; ?></td>
            <td><a href="?action=removeAll" class="btn btn-danger">Remove All</a></td>
        </tr>
    </table>

    <?php
        }
        else {
    ?>
        <h3 class="text-primary text-center">No Item in your cart!!!</h3>
    <?php
        }
    ?>

    <div class="text-end px-5">
        <a href="orderConfirm.php" class="btn btn-success">Order Confirm</a>
    </div>
    
</body>
</html>