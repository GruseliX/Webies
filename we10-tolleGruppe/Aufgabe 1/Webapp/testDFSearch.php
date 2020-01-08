<?php
error_reporting(E_ALL);

require_once("classes/model/graph.php");
require_once("classes/model/node.php");
require_once("classes/model/edge.php");
require_once("classes/DFSearch.php");

echo "Graph: <br>" ;
$graph = initGraph();
$graph->printf();

echo "<br> From 1 to 7 <br>";
$path = dfsearch($graph, 1, 7);
printPath($path);

echo "<br> From 8 to 1 <br>";
$noPath = dfsearch($graph, 8, 1);
printPath($noPath);


function initGraph() {
    $graph = new Graph();

    for ($i = 1; $i < 9; $i++) {
        $graph->addNode($i);
    }

    $graph->addEdge(1,2,1,1);
    $graph->addEdge(1,3,1,1);
    $graph->addEdge(2,5,1,1);
    $graph->addEdge(3,4,1,1);
    $graph->addEdge(3,6,1,1);
    $graph->addEdge(4,7,1,1);
    $graph->addEdge(4,8,1,1);
    $graph->addEdge(4,2,1,1);
    $graph->addEdge(5,6,1,1);
    $graph->addEdge(6,7,1,1);
    $graph->addEdge(6,2,1,1);
    $graph->addEdge(7,8,1,1);
    $graph->addEdge(7,5,1,1);
    $graph->addEdge(8,3,1,1);

    return $graph;
}

function printPath($path) {
    if($path != -1) {
        foreach ($path as $pathNode) {
            echo "Node " . $pathNode->getId() . "<br>";
        }
    }
    else {
        echo "No path";
    }
}
