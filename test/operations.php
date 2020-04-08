<?php
#better way of writing conditional statements
if($first_name == "") {
    $errorArray = "First_name cannot be blank";
}else {
    
}
#if first_name is equal to empty("")? it should print errorArray, if not it should do nothing ""
$first_name == "" ? $errorArray = "First_name cannot be blank" : "";