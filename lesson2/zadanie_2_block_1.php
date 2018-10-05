<?php
//начало блока с расчетом количества простых чисел  
$a=10;
$b=83;

function PrimeNumber($num) // функция, которая возвращает true, если число простое, false - если составное; аргумент - число
{   
    if ($num == 1) {
        return false;
    }
    if ($num == 2) {
        return true;
    }
        
    for($i=2; $i*$i<=$num; $i++) { 
            if ($num % $i == 0) {
            return false;
        }
    }
	return true;	
}

$count = 0; //сюда будут накапливаться true значения
for ($i=$a; $i<=$b; $i++) {
    if (PrimeNumber($i)) {
        $count++;
    }
}

print('Количество простых чисел между '.$a.' и '.$b.' равно: '.$count.' ');
//конец блока с расчетом количества простых чисел
echo "</br>";
//блок с трапециями
$S_ogranichitel=1400; //условие для трапеций
$lengs_1 = array();
    $lengs_1['a']=11;
    $lengs_1['b']=13;
    $lengs_1['c']=17;
    $lengs_1['s']=($lengs_1['a']+$lengs_1['b'])/2*$lengs_1['c'];
$lengs_2 = array();
    $lengs_2['a']=19;
    $lengs_2['b']=23;
    $lengs_2['c']=1;
    $lengs_2['s']=($lengs_2['a']+$lengs_2['b'])/2*$lengs_2['c'];
$lengs_3 = array();
    $lengs_3['a']=1;
    $lengs_3['b']=1;
    $lengs_3['c']=3;
    $lengs_3['s']=($lengs_3['a']+$lengs_3['b'])/2*$lengs_3['c'];
//для расчетов с трапециями соберем все площади в массив и отсортируем по возрастанию
$S_1=$lengs_1['s'];
$S_2=$lengs_2['s'];
$S_3=$lengs_3['s'];
$array_S=[$S_1,$S_2,$S_3];
//сортировка по возрастанию площадей для алгоритма
sort($array_S);
print_r($array_S); //чтобы визульно было понятно какое должно быть максимальным

    do  {
        if(max($array_S)<$S_ogranichitel){} 
        else {array_pop($array_S);}
        } 
    while (max($array_S)>$S_ogranichitel);

print('Максимальная площадь, меньшая '.$S_ogranichitel.' равна: '.end($array_S).' //');
//конец блока с трапециями

echo "</br>";

//начало блока по возведению в степень
function Power($x,$mn,$n) //функция возведения в степень, x-само число, mn = x нужен для корректного умножения, n - степень
{
if ($n>=1){for ($i=1; $i<$n; $i++){$x*=$mn;}
        return $x;}
    if ($n==0){
    return 1;}
    if ($n<0){
    return Power(1/$x, 1/$mn, -$n);}
}
//тест возведения в степень
$chislo=2;
$stepen=-3;
$itog=0;

$itog=Power($chislo,$chislo,$stepen);

print(' Число '.$chislo.' в степени '.$stepen.' = '.$itog.' //');
//конец блока по возв. в степень

echo "</br>";

//расчет минимального элемента в массиве
function MinMassive(Array $arr_min) //функция для расчета минимального, аргумент сам массив
{   
    arsort($arr_min);
     return array_pop($arr_min);
}
$test_arr_min = [1, 10, 14, 22, -1];
print_r($test_arr_min);
$testmin_1= MinMassive($test_arr_min);
print(' Минимальный элемент массива: '.$testmin_1.' //');
//конец блока по минимальному элементу в массиве

echo "</br>";

//блок по формуле f=(a*b^c+(((a/c)^b)%3)^min(a,b,c))

function Formula($a1,$b1,$c1, Array $d1)       // функция для расчета по формуле f=(a*b^c+(((a/c)^b)%3)^min(a,b,c)), аргументы: основания трапеции, высота
        { 
    $function = $a1*(Power($b1, $b1, $c1))+ Power((Power(($a1/$c1),($a1/$c1),$b1)%3),(Power(($a1/$c1),($a1/$c1),$b1)%3), (MinMassive($d1)));
    return $function;
}
$function_test1=Formula($lengs_1['a'],$lengs_1['b'],$lengs_1['c'], Array ($lengs_1['a'],$lengs_1['b'],$lengs_1['c']));
$function_test2=Formula($lengs_2['a'],$lengs_2['b'],$lengs_2['c'], Array ($lengs_2['a'],$lengs_2['b'],$lengs_2['c']));  
$function_test3=Formula($lengs_3['a'],$lengs_3['b'],$lengs_3['c'], Array ($lengs_3['a'],$lengs_3['b'],$lengs_3['c'])); 
print(' //Результат для трапеции 1: '.$function_test1.' //');
print(' //Результат для трапеции 2: '.$function_test2.' //');
print(' //Результат для трапеции 3: '.$function_test3.' //');
//конец блока по формуле
echo "</br>";
//блок по нечетным площадям трапеции
$l_1=&$lengs_1['s'];
$l_2=&$lengs_2['s'];
$l_3=&$lengs_3['s'];
$links=[$l_1,$l_2,$l_3];
$array_znach=[]; //массив, в который будут записаны значения

foreach ($links as $check){
    PrimeNumber($check);
    if ($check%2==0){
        print_r(' Четное число '.$check);
       $array_znach[]= 'Четное';
       }
    if ($check%2!==0){
        print_r(' Нечетное '.$check);
        $array_znach[]= 'Нечетное';
    }}
//конец блока по нечетным площадям трапеций
  echo "</br>";
 //печать результатов в таблицу
$input_arr = array('a','b','c','s','f','Нечетное',$lengs_1['a'],$lengs_1['b'],$lengs_1['c'],$lengs_1['s'],$function_test1,$array_znach[0],
    $lengs_2['a'],$lengs_2['b'],$lengs_2['c'],$lengs_2['s'],$function_test2,$array_znach[1],
    $lengs_3['a'],$lengs_3['b'],$lengs_3['c'],$lengs_3['s'],$function_test3,$array_znach[2]);
$columns=6; //количество столцов

echo "<table border='1'><tr>";
              
foreach (array_chunk($input_arr, $columns) as $part) {
    
    echo '<tr>';
    
    foreach ($part as $item) {
        echo '<td>' . $item . '</td>';
    }    
    
    echo '</tr>';
}
//конец блока по выводу в таблицу
echo "</br>";
