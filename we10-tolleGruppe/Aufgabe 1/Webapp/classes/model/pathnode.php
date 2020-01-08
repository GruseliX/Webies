<?php
class PathNode {
    private $id;
    private $cost;
    private $line;

    function __construct($id, $cost, $line) {
        $this->id = $id;
        $this->cost = $cost;
        $this->line = $line;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getCost()
    {
        return $this->cost;
    }

    public function getLine()
    {
        return $this->line;
    }
}
?>