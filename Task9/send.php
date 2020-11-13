<?php

    require_once "CView.php";

    $view = new CView();
    
    switch($_REQUEST["type"]){
        //Ajax календаря
        case "uny":{
            $view->ViewUntilNewYear();
            break;
        }
        //Ajax городов
        case "add":{
            if($_REQUEST["area"]){
                $view->ViewSelectCities();
            }       
            break;
        }
        //Ajax данных
        default:{
            $view->ViewValidationData();
        }
    }
?>