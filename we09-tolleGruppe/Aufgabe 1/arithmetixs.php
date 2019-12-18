<?php 

$input = "− / 15 − 7 + 1 1 3 + 2 + 1 1";
$functionTable = array("+" => "add","-" => "sub", "*" => "mult", "/" => "div");
$preprocessed = array("a","b");

// Funktion zur zwei Parameter Addition 
function add($a,$b) {
    return $a + $b;
}

// Funktion zur zwei Parameter Subtraktion
function sub($a,$b) {
    return $a - $b;
}

// Funktion zur zwei Parameter Multiplikation 
function mult($a,$b) {
    return $a * $b;
}

// Funktion zur zwei Parameter Division 
function div($a,$b) {
    return $a / $b;
}

/**
 * 
 */
function inProcessed(&$input, &$functionTable, &$preprocessed){
    $temp = explode(" ",$input);
    $preprocessed = getArray($temp);

}

function getArray($array) {
    return $array;
}


// echo add(1,2); //3
// echo sub(4,3); //1
// echo mult(4,2); //8
// echo div(10,2); //5
// echo "<br>";
inProcessed($input,$functionTable,$preprocessed);
print_r($preprocessed);
?>