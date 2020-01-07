<?php

class PathNode{

    private $id = 0;
    private $cost = 0;
    private $line = null;

    function __construct($id, $cost, $line){
        $this -> $id = $id;
        $this -> $cost = $cost;
        $this -> $line = $line;
    }

    /**
     * getId
     * @return id
     */
    function getId(){
        return $id;
    }

    /**
     * getCost
     * @return cost
     */
    function getCost(){
        return $cost;
    }

    /**
     * getLine
     * @return line
     */
    function getLine(){
        return $line;
    }
}
?>