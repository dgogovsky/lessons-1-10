<?php

function inverse(string $str, string $substr){
   
    if (substr_count($str,$substr)<>2){
        echo 'Не соответствует условию;';
    }
    if (substr_count($str,$substr)==2){
        $c=strrpos($str, $substr);
        $substr=strrev($substr);
        $str=substr_replace($str, $substr, $c, strlen($substr));
       echo " Ваша строка ".$str; 
    }
}
$str1='abcdbce';
$substr1='bc';

$str2=inverse($str1, $substr1);    
echo "</br>";
