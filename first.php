<?php

echo "hello", "my name is <br>";
echo "hello" . "world <br>";



$myName = "soumil<br>";
$myEnroll = 7070;
$myMarks = 9.97;
$myMarks = 9.99;
$grade = false;
$mySubjeccts = array("html , css, js", "php mysql");
define("test", 50);
$a = 10;
// $a++;
$b = 9;
// $b--;
$c = ($a + $b)  * 2; /*  in this part first calculate () part after last part */
$d = $a + $b  * 2;   /*  in this part first calculate  last part */





echo test . "<br>";
echo $myName;
echo $myEnroll . "<br>";
echo $myMarks . "<br>";
echo $mySubjeccts[0] . "<br>"; //

var_dump($grade);
var_dump($myMarks);

// echo $a . "<br>";
// echo $b . "<br>";
echo $c . "<br>";
echo $d . "<br>";


$ab = 10;
$ac = 10;


echo $ab == $ac ; 
echo $ab === $ac ;
echo $ab >= $ac ;


if($ab==$ac){
    echo "right". "<br>";
}
if($ab==$ac){
    echo "right". "<br>";
}
else {
    echo "not";
}


if($ab == $ac && $ac == $ab){
    echo "true". "<br>";
}

$persent = 50;
if($persent >=50 && $persent <= 80){
    echo "you are at 50 to 80";
}elseif($persent == 50){
    echo "you are at 50";
}else{
    echo " you are lesser than 50";
}