<?php 
    // $myanmar = 73;
    // $english = 88;
    // $math = 90;

    // $arr = compact("myanmar", "english", "math");

    // print_r($arr);

    // $arr = [11,22,44,33,55,33,44,33,55,66];
    // $arr = ["aa","bb","aa","cc","bb","aa"];
    // print_r(array_count_values($arr)); 


    $marks = array("Mg Mg"=>array("myan"=>55,"eng"=>66,"math"=>77),
    "Su Su"=>array("myan"=>44,"eng"=>88,"math"=>99),
    "Ag Ag"=>array("myan"=>66,"eng"=>55,"math"=>66),);

    print_r(array_column($marks,"math"));
?>