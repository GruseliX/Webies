<?php 

$input = "- / 15 - 7 + 1 1 3 + 2 + 1 1";
$functionTable = array("+" => "add","-" => "sub", "*" => "mult", "/" => "div");
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

 // Die Ausgaben zwischen drin dienen zum Debugging
function process(){

    global $preprocessed,$functionTable, $pendingOperand, $operant, $operant_1, $operanten, $operatoren;

    foreach($preprocessed as $key => $value){
        echo "k v = ".$key . ' ' .$value . ' :: ';
        echo "v in fT = ".array_key_exists($value,$functionTable). " ::"; // Warum trit hier der Fehler auf???
        if(array_key_exists($value,$functionTable)){
            array_push($operatoren,$value);
            $pendingOperand = 0;
            echo "k v in if = ".$value. ' '. $key. ' ::';
        }else{
            $operant = $value;
            echo "v k in el = ".$value. ' '. $key. ' ::';
            echo "pO = ".$pendingOperand. ' ::';
            if($pendingOperand){
                echo " count Op = ".count($operanten). ' ::';
                while(count($operanten)>=1){
                    $operant_1 = array_pop($operanten);
                    echo "op_1 = ".$operant_1.' ::';
                    $operand = $functionTable[array_pop($operatoren)]."($operand_1,$operand)";
                    echo "op = ".$operant_1.' ::';
                }
            }
            array_push($operanten,$operand);
            $pendingOperand = 1;
        }
        // echo "<p>operatoren</p>";
        // var_dump($operatoren);
        // echo "<p>Operanten</p>";
        // var_dump($operanten);
        echo "<br>";
    }
    var_dump($operanten);
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
echo "<br>";
print_r($functionTable);


echo "<h1>Aufgabe 2</h1>";
echo process();



?>