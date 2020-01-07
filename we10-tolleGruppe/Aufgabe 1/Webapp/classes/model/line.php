<?php

class Line{

    private $id = 0;
    private $display = "";
    private $heading = 0;

    function __construct($id, $dislay, $heading){
        $this -> $id = $id;
        $this -> $display = $display;
        $this -> $heading = $heading;
    }

    /**
         * getId
         * @return id
         */
    function getId(){
        return $id;
    }

    /**
         * getDisplay
         * @return display
         */
    function getDisplay(){
        return $dislay;
    }

    /**
         * getHeading
         * @return heading
         */
    function getHeading(){
        return $heading;
    }
}
?>