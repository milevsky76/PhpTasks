<?php
    
    require_once "palindrome.php";
    
    $phrasalArray = ["Тут как тут", "Коту тащат уток", "15.01.2002 10:51", "Я разуму уму заря", "Искать такси", "Дивен мне вид"];
    
    foreach($phrasalArray as $value) { 
        if(IsPalindrome($value)){
            echo "$value - является палиндромом<br>";
        } else{
            echo "$value - не является палиндромом<br>";
        }
    }   

?>