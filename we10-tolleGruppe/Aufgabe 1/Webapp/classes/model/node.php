<?php
class Node {
    private $id;
    private $edges;

    function __construct($id) {
        $this->id = $id;
        $this->edges = array();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getEdges()
    {
        return $this->edges;
    }

    function addEdge($edge) {
        array_push($this->edges, $edge);
    }

    function getEdge($endNode) {
        foreach ($this->getEdges() as $edge) {
            if ($edge->getEndNode() === $endNode) {
                return $edge;
            }
        }
        return null;
    }

}
?>