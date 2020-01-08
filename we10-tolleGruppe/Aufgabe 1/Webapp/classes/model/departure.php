<?php
class Departure {
    private $line;
    private $display;
    private $time;

    function __construct($line, $display, $time) {
        $this->line = $line;
        $this->display = $display;
        $time->time = $time;
    }

    public function getLine()
    {
        return $this->line;
    }

    public function getDisplay()
    {
        return $this->display;
    }

    public function getTime()
    {
        return $this->time;
    }
}
?>