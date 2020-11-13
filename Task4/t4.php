<?php

    include "calendar.php";
    
    $daysInMonth = 31;
    $firstDayMonth = "понедельник";
        
    $month = GeneratingMonth($daysInMonth, $firstDayMonth);
    
    $weekLater = true;
    
    foreach ($month as $key => $value) {
        switch ($value) {
            case "понедельник":
            case "четверг":
                $month[$key] = "$value: Курс PHP";
                echo "$month[$key], ";
                break;
                
            case "вторник":
                $month[$key] = "$value: подготовка ДЗ";
                echo "$month[$key], ";
                break;
                
            case "среда":
                $month[$key] = "$value: бассейн";
                echo "$month[$key], ";
                break;
                
            case "пятница":
                echo "$month[$key], ";
                break;
                
            case "суббота":
                if($weekLater){
                    $month[$key] = "$value: рыбалка";
                }
                $weekLater = !$weekLater;
                echo "$month[$key], ";
                break;
                
            case "воскресенье":
                if($key >= 1 && $key <= 14){
                $month[$key] = "$value: дача";
                }
                if($key >= 15 && $key <= 21){
                    $month[$key] = "$value: шашлык с друзьями";
                }
                if($key >= 22 && $key <= 28){
                    $month[$key] = "$value: диплом";
                }
                echo "$month[$key]<br>";
                break;
        }
    }
?>