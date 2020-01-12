<?php

require_once("Getter.class.php");

$getter = new Getter();
$timestamp = time();
$result = $getter->getDepartures(93, date("h:i A", $timestamp ));

echo var_dump($result->getDepartures());

?>