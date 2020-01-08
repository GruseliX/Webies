<?php

class Departure{

    private $line = 0;
    private $display = "";
    private $time = null;

    function __construct($line, $display, $time){
        $this -> line = $line;
        $this -> display = $display;
        $this -> time = $time;
    }

    /**
     * getLine
     * @return line
     */
    function getLine(){
        return $line;
    }

    /**
     * getDisplay
     * @return display
     */
    function getDisplay(){
        return $display;
    }

    /**
     * getTime
     * @return time
     */
    function getTime(){
        return $time;
    }
}
?>