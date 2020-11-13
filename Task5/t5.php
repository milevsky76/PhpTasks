<?php

    for($i = 2; $i <= 1000; $i++){
        for($j = 2; $j < $i; $j++){
            if ($i % $j == 0){
                continue(2);
            }
        }
        echo "$i ";
    }

?>