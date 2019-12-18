<?php 

$input = "− / 15 − 7 + 1 1 3 + 2 + 1 1";
$functionTable = array("+" => "add($operant_1,$operant)","-" => "sub($operant_1,$operant)", "*" => "mult($operant_1,$operant)", "/" => "div($operant_1,$operant)");
$preprocessed = array("a","b");
$operatoren = array();
$operanten = array();
$operant;
$operant_1;
$pendingOperand = false;



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
 * Funktion welche die Aufteilung des uebergebenen Strings 
 * in dessen Einzelkomponenten uebernimmt 
 * und in einem Array zurueckliefert
 */
function preProcessed(&$input, &$preprocessed){
    $temp = explode(" ",$input);
    $preprocessed = getArray($temp);
}

/**
 * Hilfsfunktion zur uebergabe eines Arrays in eine Variable
 */
function getArray($array) {
    return $array;
}


/**
 * Funktion welche die Rechnung ausfuehren 
 */

function process(){

    global $preprocessed,$functionTable, $pendingOperand, $operant, $operant_1, $operanten, $operatoren;
    
    foreach($preprocessed as $item){
        if(in_array($value,$functionTable)){
            array_push($operatoren,$value);
            $pendingOperand = false;
        }
        else{
            $operant = $value;
            if($pendingOperand){
                while(count($operanten)>=1){
                    $operant_1 = array_pop($operanten);
                    $operand = $functionTable[array_pop($operatoren)];
                }
                array_push($operanten,$operand);
                $pendingOperand = true;
            }
        }
    }

    return array_pop($operanten);

}


// Ausgabe 


echo "<h1>Aufgabe 1</h1>";
echo "<p>ADD: add(1,2) = ". add(1,2)." </p>";//3
echo "<p>ADD: sub(4,3) = ".sub(4,3)." </p>" ;//1
echo "<p>ADD: mult(4,2) = ".mult(4,2)." </p> ";//8
echo "<p>ADD: div(10,2) = ".div(10,2)." </p>"; //5
echo "<br>";

preProcessed($input,$preprocessed);
echo "<h2>String in Arrayform</h2>";
print_r($preprocessed);
process($preprocessed);
print_r($preprocessed);

echo "<h1> Aufgabe 2</h1>";
echo process();



?>