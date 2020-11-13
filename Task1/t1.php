<?php

    $quantityOdd = 0;
    
    for($number = 100; $number >= 50; $number--){
        if(IsOdd($number)){
            echo "$number <br>";
            $quantityOdd++;
        }
    }
    
    echo "Всего $quantityOdd нечётных чисел";
    
    function IsOdd($number){
        if ($number % 2 != 0){
            return true;
        } else {
            return false;
        }
    }

?>