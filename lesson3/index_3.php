<?php

//функция для реверса второго включения подстроки
function inverse(string $str, string $substr) {     
    if (substr_count($str, $substr) <> 2) {
       throw new Exception();
    }
    if (substr_count($str, $substr) == 2) {
        $c = strrpos($str, $substr);
        $substr = strrev($substr);
        $str = substr_replace($str, $substr, $c, strlen($substr));
        echo " Ваша строка " . $str;
    }
}

//тестировать здесь
try {
$str1 = 'abcdbce';
$substr1 = 'bc';
$str2 = inverse($str1, $substr1);
} catch (Exception $e){
    echo 'Не соответствует условию ', $e->getMessage(), "\n";
} 
//конец теста
echo "</br>";

function arrkeysort(array $arrayforsort, $orderby) {   //функция для сортировки двумерного массива по ключу
    $arrayforsort;
    $sortArray = array();

    foreach ($arrayforsort as $elements) {
        foreach ($elements as $key => $value) {
            if (!isset($sortArray[$key])) {
                $sortArray[$key] = array();
            }
            $sortArray[$key][] = $value;
        }
    }
    
    if (!array_multisort($sortArray[$orderby], SORT_ASC, $arrayforsort)) {
        throw new Exception();
    } else {
        array_multisort($sortArray[$orderby], SORT_ASC, $arrayforsort);
    }
    var_dump($arrayforsort);
}

//тестировать здесь
try {
    $arrtest = [[a => 2, b => 12, c => 15], [a => 32, b => 2, c => 10], [a => 3, b => 1]];
    arrkeysort($arrtest, a);
} catch (Exception $e) {
    echo 'Ошибка, убедитесь что такой ключ есть в массиве ', $e->getMessage(), "\n";
} 
//конец теста

