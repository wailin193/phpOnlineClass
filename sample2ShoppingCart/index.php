<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <!-- <script src="app.js"></script> -->
    <style type="text/css">
        #search {
            width: 80%;
            margin-left: 10%;
            text-align: right;
            /* margin: 1%; */
        }

        .searchi {
            background-color: crimson;
            color: whitesmoke;
            padding: 0.7rem;
        }

        #search input {
            height: 2rem;
            width: 13rem;
            border: 1px solid rgb(209, 204, 204);
        }

        #header {
            text-align: center;
        }

        .outer {
            display: flex;
        }
    
        #foodContainer {
            width: 100%;
            margin: auto;
            display: flex;
            flex-wrap: wrap;
        }

        .fooddiv {
            /* width: 20%; */
            width: 20%;
            margin: 2%;
            text-align: center;
            background-color: whitesmoke;
            padding: 8px 5px;
            box-shadow: 8px 8px 8px wheat;
            border-radius: 10px;
        }

        .fooddiv img {
            width: 90%;
            height: auto;
            border-radius: 50%;
        }

        .fooddiv h2 {
            text-transform: lowercase;
            color: rgb(3, 76, 78);
        }
    </style>
    <script>
        let foods, arr;
        let show=()=> {
            for(i=0;i<foods.length;i++) {
                let d = document.createElement("div");
                d.classList.add("fooddiv", "p-3");

                let image = document.createElement("img");
                image.src = "images/images/"+foods[i].img;

                let h2 = document.createElement("h4");
                h2.innerHTML = foods[i].name;
                h2.classList.add("text-white", "my-3", "py-2", "text-capitalize", "bg-dark")

                let p = document.createElement("p");
                p.innerHTML=foods[i].price+" kyats";
                p.classList.add("fw-bold");

                let pdes = document.createElement("p");
                pdes.innerHTML=foods[i].des;

                let txt = document.createTextNode("Add to Cart");
                let a = document.createElement("a");
                // a.href='?oiid='+foods[i].id;
                a.href='index.php?oiid='+foods[i].id+'&name='+foods[i].name+'&price='+foods[i].price+'&image='+foods[i].img;
                a.classList.add("btn", "btn-primary");
                // a.innerHTML = "Order Now";
                a.appendChild(txt);

                d.appendChild(h2);
                d.appendChild(image);
                d.appendChild(p);
                d.appendChild(pdes);
                d.appendChild(a);

                foodContainer.appendChild(d);
            }
        }

        let filterFood=(e)=> {
            let txt = e.value;
            foods = arr.filter((item,index,array)=> {
                let name = item.name.toLowerCase(); //ucword pr yin malo 2ku lone tone sayar malo
                txt = txt.toLowerCase();
                let d = item.des.toLowerCase();
                if(name.includes(txt) || d.includes(txt) || item.price==txt) {
                    return true;
                }
            });

            foodContainer.innerHTML = "";
            show();
        }
    </script>
</head>
<body onload="show();">

    <div id="search" class="py-3">
        <i class="fa-solid fa-magnifying-glass searchi"></i><input type="text" onkeyup="filterFood(this);" />
        <a class="btn btn-primary position-relative" href="bill.php">
            <i class="bi bi-cart-fill"></i>
            <span class="position-absolute badge top-0 start-100 btn btn-danger translate-middle rounded-pill" id="itemCount">0</span>
        </a>
    </div>

    <?php
        if(isset($_SESSION["orders"])) {
            $noOfItems = count($_SESSION["orders"]);
    ?>
        <script>
            itemCount.innerHTML = <?php echo $noOfItems; ?>;
        </script>
    <?php
        }
        if(isset($_GET["oiid"])) {
            $iid = $_GET["oiid"];
            $iname = $_GET["name"];
            $iprice = $_GET["price"];
            $iimage = $_GET["image"];
            $_SESSION["orders"][$iid] = ["id"=>$iid, "name"=>$iname, "price"=>$iprice, "image"=>$iimage, "qty"=>1];
            // print_r($_SESSION["orders"]);
            $noOfItems = count($_SESSION["orders"]);
    ?>
        <script>
            itemCount.innerHTML = <?php echo $noOfItems; ?>;
        </script>
    <?php
        }
    ?>
    
    <h2 id="header">Available Myanmar Traditional Foods</h2>
    <div class="outer">        
        <div id="foodContainer">
            <!-- <div class="fooddiv">
                <img src="../images/t1.jpg" alt="">
                <h2>Toy Name 1</h2>
                <p>Price : 1000</p>
            </div>

            <div class="fooddiv">
                <img src="../images/t2.jpg" alt="">
                <h2>Toy Name 2</h2>
                <p>Price : 1000</p>
            </div>

            <div class="fooddiv">
                <img src="../images/t3.jpg" alt="">
                <h2>Toy Name 3</h2>
                <p>Price : 1000</p>
            </div>

            <div class="fooddiv">
                <img src="../images/t4.jpg" alt="">
                <h2>Toy Name 4</h2>
                <p>Price : 1000</p>
            </div> -->
        </div>
    </div>

    <?php
        include 'dbhandler.php';
        $items = DBHandler::getAllItems();
    ?>
        <script>
            itemsArr = [];
        </script>
    <?php
        foreach($items as $item) {
            $id = $item["iid"];
            $name = $item["iname"];
            // $name = ucwords($item["iname"]); //apaw mr .toLowerCase nae pyoung htr win ucword ma lo
            $des = $item["idescription"];
            $price = $item["iprice"];
            $img = $item["iimage"];
    ?>
        <script>
            itemsArr.push({"img":'<?php echo $img;?>',"name":'<?php echo $name;?>',"price":'<?php echo $price;?>',"id":'<?php echo $id;?>',"des":'<?php echo $des;?>'});            
        </script>
    <?php
        }
    ?>
    <script>
        foods = itemsArr;
        arr = itemsArr;
        // show();
    </script>
</body>
</html>