<?php
    function sum($n1, $n2=0)
    {
        $ans = $n1+$n2;
        // echo "Answer is $ans <br>";
        return $ans;
    }

    // sum(2,5);
    // sum(33,6);

    // $funName = "sum";
    // $funName(4,5);

    // echo sum(4, 5);

    $result = sum(4, 5);
    echo "Answer is $result <br>";

    $avg =  $result/2;
    echo "Average is $avg <br>";

?>