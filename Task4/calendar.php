<?php

    function GeneratingMonth ($daysInMonth, $firstDayMonth){
        $daysOfWeek = ["понедельник", "вторник", "среда", "четверг", "пятница", "суббота", "воскресенье"];
        $dayIndex;
        
        foreach ($daysOfWeek as $key => $value) {
            if(mb_strtolower($firstDayMonth) == "$value"){
                $dayIndex = $key;
                break;
            }
        }
        
        for($i = 1; $i <= $daysInMonth; $i++){
            $month[$i] = $daysOfWeek[$dayIndex++];
            
            if($dayIndex > count($daysOfWeek) - 1){
                $dayIndex = 0;
            }
        }
        
        return $month;     
    }

?>