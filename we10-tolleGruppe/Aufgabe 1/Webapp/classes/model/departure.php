<?php

class Departure{

    private $line = 0;
    private $display = "";
    private $time = null;

    function __construct($line, $display, $time){
        this.$line = $line;
        this.$display = $display;
        this.$time = $time;
    }

    /**
     * getLine
     * @return line
     */
    function getLine(){
        return this.$line;
    }

    /**
     * getDisplay
     * @return display
     */
    function getDisplay(){
        return this.$display;
    }

    /**
     * getTime
     * @return time
     */
    function getTime(){
        return this.$time;
    }
}
?>