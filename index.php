<?php

// 1-
// #function nl2br
echo nl2br("hello\nworld");
echo "<hr>";

// 2-

// using pre tag 

echo "<pre>";
print_r($_SERVER);
echo "</pre>";
echo "<hr>";


// 3-three function 

//  1.(odr) retern the ascii code for firsl letter

echo ord("hello");  
echo "<hr>";

//2.(str_repeat)Repeats a string a specified number of times
echo str_repeat("<pre>php</pre> " ,4);
echo "<hr>";

// 3.(strrve)reverse a string

echo strrev("hello");  
echo "<hr>";



// 4-
$array = [12, 45, 10, 25]; 

$sum = array_sum($array);
echo nl2br("Sum: $sum \n");

$avg = $sum / count($array);
echo nl2br("Average: $avg\n") ;
// sort desc
rsort($array);
print_r($array);

echo "<hr>";

// 5-

$array = ["Sara" => 31, "John" => 41, "Alaa" => 39, "Ramy" => 40];
// asc by value
asort($array);
echo nl2br("\n \n \n \nasc  by Value:  ");
print_r($array);


// b) asc by key
ksort($array);
echo nl2br( "\nasc  by Key: ");
print_r($array);

// c) desc by value
arsort($array);
echo nl2br( "\n desc by Value: ");
print_r($array);
;

// d) desc by key
krsort($array);
echo nl2br( "\ndesc by Key:");
print_r($array);


?>