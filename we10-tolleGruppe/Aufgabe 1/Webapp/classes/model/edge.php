<?php
require_once("node.php");

class Edge {
    private $endNode;
    private $cost;
    private $line;

    function __construct($endNode, $cost, $line) {
        $this->endNode = $endNode;
        $this->cost = $cost;
        $this->line = $line;
    }

    public function getEndNode()
    {
        return $this->endNode;
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