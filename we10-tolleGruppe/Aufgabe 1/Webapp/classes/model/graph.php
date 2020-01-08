<?php

require_once("node.php");
require_once("edge.php");

class Graph {
    private $nodes;

    function __construct() {
        $this->nodes = array();
    }

    public function getNodes()
    {
        return $this->nodes;
    }

    function addNode($id) {
        array_push($this->nodes, new Node($id));
    }

    function addEdge($startId, $endId, $cost, $line) {
        $startNode = $this->findNode($startId);
        $endNode = $this->findNode($endId);
        if($startNode != null && $endNode != null) {
            $edge = new Edge($endNode, $cost, $line);
            $startNode->addEdge($edge);
        }
    }

    function findNode($id) {
        foreach ($this->nodes as $node) {
            if($node->getId() === $id){
                return $node;
            }
        }
        return null;
    }

    function printf() {
        foreach ($this->nodes as $node) {
            echo $node->getId() . "-->";
            foreach ($node->getEdges() as $edge) {
                echo $edge->getEndNode()->getId() . " ";
            }
            echo "<br>";
        }
    }
}
?>















