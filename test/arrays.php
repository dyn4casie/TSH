<?php

//for arrays

$array_example = []; //an empty array

$array_example_2 = ["mike"]:

$array_example_3 = ["mike",3,"orange",true];

//index - position of an element(item) in an array
//position starts from 0

print $array_example_3[0]; //prints out mike
print $array_example_3[3]; //prints out true

print count(array_example_3); // prints out 4

$imaginary_array = [];

print $array_example_3[count($array_example_3) - 1];

print $array_example_3[0]; //

//if an array has 4 elements, then the highest index will be 3

$array_example_4 = array();

$array_example_4[0] = "seyi";
$array_example_4[1] = "doyin";
$array_example_4[2] = "dotun";

print $array_example_4; // ["seyi", "doyin", "dotun"]


?>