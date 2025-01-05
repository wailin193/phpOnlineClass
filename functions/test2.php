<?php
    function avg(...$arr)
    {
        // print_r($arr);
        if(count($arr)>0){
        return array_sum($arr)/count($arr);
        }
    }

    echo avg(2,5,6,70);
?>