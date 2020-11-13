<?php
    
    function pr($arr){
        echo "<pre>";
        print_r($arr);
        echo "</pre>";
    }

    $arr = [];
    $degree = 0;
    
    for($i = 0; $i < 8; $i++){
        for($j = 0; $j < 8; $j++){
            $arr[$i][$j] = pow(2, $degree++);
        }
    }
    
    pr($arr);    
    
?>