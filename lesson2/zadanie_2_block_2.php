<?php


class FunctionPow {
    public $x; //возводимое
    public $n;  //степень
    
    public function __construct($x = 0, $n =0) {
        $this->x = $x;
        $this->n = $n;
       }
    public function Power($x,$n) {
        $res=$x;
       if ($n>=1){for ($i=1; $i<$n; $i++){
           $res*=$x;}
        return $this->res=$res;}
    if ($n==0){
    return 1;}
    if ($n<0){
    return $this->Power(1/$x,-$n);} 
    }
}

$result = new FunctionPow;


print "Функция возведения в степень результат ".$result->Power(2,-2)."</br> ";

class FunctionMin {
    public $arr_min= [];
    public function __construct($arr_min= []){
    $this->arr_min = $arr_min;}
public function MinMassive($arr_min){
     arsort($arr_min);
     return array_pop($arr_min);
    
}
}
    $proverka = new FunctionMin;
    
    print "Мин ".$proverka->MinMassive([2,2,-2,3,4,-23])."</br> ";

// работает с использованием предыдущих классов*
class Formula1 {
    public $a1;
    public $b1;
    public $c1;
    public $d1=array();
   
public function __construct($a1=0,$b1=0,$c1=0, $d1=[]) {
    $this->a1=$a1;
    $this->b1=$b1;
    $this->c1=$c1;
    $this->d1=$d1;
}
public function Formula($a1,$b1,$c1, Array $d1){
    $step = new FunctionPow;
    $minmass=new FunctionMin;
    $function = $a1*($step->Power($b1, $b1, $c1))+ $step->Power(($step->Power(($a1/$c1),($a1/$c1),$b1)%3),($step->Power(($a1/$c1),($a1/$c1),$b1)%3), ($minmass->MinMassive($d1)));
    return $function;
}
}
$test_fun_1 = new Formula1;

print "Итог функция 1: ".$test_fun_1->Formula(11,13,17,[11,13,17])."</br> ";
    
//реализующий расчет по формуле f2=((a+b)^c*(a/c)^min(a,b,c))

class Formula_2 {

public $a2;
public $b2;
public $c2;
public $d2=array();

  
public function __construct($a2=0,$b2=0,$c2=0, $d2=[]) {
    $this->a2=$a2;
    $this->b2=$b2;
    $this->c2=$c2;
    $this->d2=$d2;
} 
public function Formula2($a2,$b2,$c2, Array $d2){
    $step2 = new FunctionPow;
    $minmass2 = new FunctionMin;
    $function2 = $step2->Power(($a2+$b2), ($a2+$b2), $c2)*$step2->Power(($a2/$c2),($a2/$c2),($minmass2->MinMassive($d2)));
    return $function2;
}
}
$test_fun_2 = new Formula_2;

print "Итог функция 2: ".$test_fun_2->Formula2(1,2,3,[1,2,3])."</br> "; 


// вспомогательный класс ф1 ф2
class f1f2 {

public $a;
public $b;
public $c;
public $d;

public function __construct($a=0,$b=0,$c=0, $d=[]){

 $this->a=$a;
 $this->b=$b;
 $this->c=$c;
 $this->d=$d;
}

public function F1F2($a,$b,$c, Array $d) {

	
	$f1 = new Formula1;
	$f2 = new Formula_2;
	return print "Результат f1: ".$f1->Formula($a,$b,$c,$d)."</br> "."Результат f2: ".$f2->Formula2($a,$b,$c, $d)."</br> "; 
}
}

$test_3 = new f1f2;
$test_3->F1F2(1,2,3,[1,2,3]);
//конец кода 


//класс вывод в таблицу с количеством столбцов = columns
class Printtable {
 public $input_arr = array();
 public $columns;
 public function __construct($input_arr=[], $columns=1){

 $this->input_arr = $input_arr;
 $this->columns = $columns;
  }
 public function getValue(Array $input_arr, $columns){
	
	 echo "<table border='1'><tr>";
              
foreach (array_chunk($input_arr, $columns) as $part) {
    
    echo '<tr>';
    
    foreach ($part as $item) {
        echo '<td>'. $item .'</td>';
    }    
    
    echo '</tr>';

 }
}
}


$test_array=new Printtable;
$test_array->getValue([1,2,3,4,5,6,7,8,9,10,11,12],6);



