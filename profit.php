<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="profitStyle.css">
</head>
<body>
    <form action="" method="post" class="profitform">
        <div class="row">
            <label for="">Type</label>
            <div class="userselect">
                <select name="type" id="">
                    <option value="no">--Choose Type--</option>
                    <option value="clothe">Clothe</option>
                    <option value="shoe">Shoe</option>
                </select> 
                <span class="err">
                    <?php
                        if(isset($_POST['type']))
                        {
                            if($_POST['type']== 'no'){
                                echo 'Choose One';
                            }
                        }
                    ?>
                </span>
            </div>

        </div>
        <div class="row">
            <label for="">Price</label>
            <input type="number" min="1" name="price" required class="userselect">
        </div>
        <div class="btnrow">
            <input type="submit" value="Calculate Profit" name="btnSubmit" class="btn btnSubmit">
            <input type="reset" value="Clear" name="btnClear" class="btn btnClear">
        </div>
        <?php
        if(isset($_POST["btnSubmit"])){
            $type = $_POST['type'];
            $price = $_POST['price'];

            if($type!= 'no'){
                // echo $type.':'.$price;
                
                $profit = 0;
                if($type == 'clothe')
                {
                    // Clothe
                    if($price<20){
                        $profit = $price*10/100;
                    }
                    else if($price<= 50){
                        $profit = $price*15/100;
                    }
                    else{
                        $profit = $price*20/100;
                    }
                }
                else{
                    // Shoe
                    if($price < 5 || $price > 30)
                    {
                        $profit = $price*5/100;
                    }else{
                        $profit = $price*10/100;
                    }
                }
                echo 'Profit is ' . $profit;
            }
        }
        ?>
    </form>
</body>
</html>