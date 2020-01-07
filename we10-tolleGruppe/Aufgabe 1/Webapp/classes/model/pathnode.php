<?php

class PathNode{

    private $id = 0;
    private $cost = 0;
    private $line = null;

    function __construct($id, $cost, $line){
        this.$id = $id;
        this.$cost = $cost;
        this.$line = $line;
    }

    /**
     * getId
     * @return id
     */
    function getId(){
        return this.$id;
    }

    /**
     * getCost
     * @return cost
     */
    function getCost(){
        return this.$cost;
    }

    /**
     * getLine
     * @return line
     */
    function getLine(){
        return this.$line;
    }
}
?>