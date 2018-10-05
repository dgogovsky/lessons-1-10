<?php

function inverse(string $str, string $substr){     //функция для реверса второго включения подстроки
   
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
//тестировать здесь
$str1='abcdbce';
$substr1='bc';
$str2=inverse($str1, $substr1);    
//конец теста
echo "</br>";

function arrkeysort (array $arrayforsort,$orderby){   //функция для сортировки двумерного массива по ключу
$arrayforsort; 
$sortArray = array(); 

foreach($arrayforsort as $elements){ 
    foreach($elements as $key=>$value){ 
        if(!isset($sortArray[$key])){ 
            $sortArray[$key] = array(); 
        } 
        $sortArray[$key][] = $value; 
    } 
} 
//множественная сортировка по ключу работает только если ключ не нулевой
array_multisort($sortArray[$orderby],SORT_ASC,$arrayforsort); 
var_dump($arrayforsort); 
}
//тестировать здесь
$arrtest = [[a=>2,b=>12,c=>15],[a=>32,b=>2,c=>10],[a=>3,b=>1]];
arrkeysort($arrtest, с);
//конец теста