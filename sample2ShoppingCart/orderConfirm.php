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
    <title>Order Confirm</title>
</head>
<body>

    <?php
        include('dbhandler.php');
        if(isset($_POST["btnOrder"])) {
            $name = $_POST["customerName"];
            $phone = $_POST["customerPhone"];
            $address = $_POST["customerAddress"];
            $remark = $_POST["customerRemark"];

            $cid = DBHandler::insertCustomer($name, $phone, $address, $remark);
            $oid = DBHandler::insertOrder($cid);
            $orders = $_SESSION["orders"];
            foreach($orders as $o) {
                $iid = $o["id"];
                $qty = $o["qty"];
                $oiid = DBHandler::insertOrderItem($oid, $iid, $qty);
            }
            unset($_SESSION["orders"]);
            header("Location:success.php");
        }
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 col-10 offset-1">
                <form action="orderConfirm.php" method="post" class="bg-light p-3">
                    <h3 class="text-primary text-center pb-4">Fill Customer Information</h3>
                    <div class="row mb-3">
                        <div class="col-4">
                            <label for="">Name</label>
                        </div>
                        <div class="col-8">
                            <input type="text" name="customerName" class="form-control" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-4">
                            <label for="">Phone</label>
                        </div>
                        <div class="col-8">
                            <input type="text" name="customerPhone" class="form-control" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-4">
                            <label for="">Address</label>
                        </div>
                        <div class="col-8">
                            <textarea name="customerAddress" id="" class="form-control" rows="10" required></textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-4">
                            <label for="">Remark</label>
                        </div>
                        <div class="col-8">
                            <textarea name="customerRemark" id="" class="form-control" rows="10"></textarea>
                        </div>
                    </div>

                    <div class="text-center">
                        <input type="submit" name="btnOrder" value="Order" class="btn btn-primary">
                        <input type="reset" name="btnClear" value="Clear" class="btn btn-warning">
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>
</html>