<?php

    include "calendar.php";
    
    $daysInMonth = 31;
    $firstDayMonth = "понедельник";
        
    $month = GeneratingMonth($daysInMonth, $firstDayMonth);
    
    echo "<pre>";
    print_r($month);
    echo "</pre>";

?>