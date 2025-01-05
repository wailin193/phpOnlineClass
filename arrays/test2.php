<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $a = [5,10,15,20,25,30];
    $b = [99,98,97] ;
    // array_splice($a,2,3);
    array_splice($a,2,3,$b);
    print_r($a);

    // function myfun($v1,$v2){
    //     return $v1 ." ". $v2;
    // }
    // $arr = ["Monday", "Wednesday", "Friday"];
    // $ans = array_reduce($arr, "myfun", " ");
    // echo $ans;

    // function sum($v1,$v2){
    //    return $v1+ $v2;
    // }
    // $arr = [5,10,15,20];
    // $ans = array_reduce($arr, "sum", initial: 10);
    // echo $ans;

        // print_r($arr);
        // echo"<br>";

        // echo "sizeof : ".sizeof($arr)."<br>";
        // echo "count : ".count($arr,0)."<br>";
        // $keys = array_keys($arr);
        // print_r($keys);
        // echo"<br>";

        // $values = array_values($arr);
        // print_r($values);
        // echo"<br>";

        // array_pop($arr);
        // array_push($arr,25);
        // print_r($arr);
        // echo"<br>";

        // echo array_product($arr);

        // $ans = array_pad($arr,10,value: 2);
        // print_r($ans);

        // array_shift($arr);
        // print_r($arr);
        // echo"<br>";
        // array_unshift($arr,99);
        // print_r($arr);
        // echo"<br>";

        

        // $arr = ["Mg Mg"=>99,"Ag Ag"=>78,"Su Su"=>88];

    ?>
</body>
</html>