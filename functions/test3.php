<?php
    // function mkDouble(&$n)
    // {
    //     $n = $n * 2;
    //     echo "Value of n is $n<br>";
    // }
    // $num = 10;
    // mkDouble($num);
    // echo "Value of num is $num <br>";

    function swap(&$n1,&$n2)
    {
        $temp = $n1;
        $n1 = $n2;
        $n2 = $temp;
    }
    $num1 = 33;
     $num2 = 11;
     swap($num1,$num2);

     echo "NUM1 is $num1 <br> Num2 is $num2";
?>