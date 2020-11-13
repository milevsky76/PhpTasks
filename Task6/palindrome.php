<?php

    function IsPalindrome($str){
        //Удаляем не нужные символы
        $strFormat = str_replace([" ", ",", ".", ":", "!", "?"], "", $str);
        
        //Приводим строку к нижнему регистру
        $strLower = mb_strtolower($strFormat);
        
        //Записываем строку в обратном порядке
        $strReverse = mb_strrev($strLower);
        
        if($strReverse == $strLower){
            return true;
        } else{
            return false;
        }
    }
    
    function mb_strrev($str){
        $res = "";
        
        for ($i = mb_strlen($str); $i >= 0; $i--) {
            $res .= mb_substr($str, $i, 1);
            
        }
        
        return $res;
    }

?>