<?php
require_once("model/graph.php");
require_once("model/node.php");
require_once("model/edge.php");
require_once("model/pathnode.php");

function dfsearch($graph, $startId, $endId) {
    $path = dfsearchRec($graph, $graph->findNode($startId), $graph->findNode($endId), array());
    return convertToPathNodes($path);
}

function dfsearchRec($graph, $currentNode, $endNode, $visitedNodes) {
    $visitedNodes = markVisitedNode($visitedNodes, $currentNode);
    if($currentNode === $endNode) {
        return foundedPath($endNode);
    }
    return visitNeighbors($graph, $currentNode, $endNode, $visitedNodes);
}

function markVisitedNode($visited, $node) {
    array_push($visited, $node);
    return $visited;
}

function foundedPath($endNode) {
    $result = array();
    array_push($result, $endNode);
    return $result;
}

function isVisited($visitedNodes, $node) {
    return in_array($node, $visitedNodes, true);
}

function visitNeighbors($graph, $currentNode, $endNode, $visitedNodes ){
    foreach ($currentNode->getEdges() as $edge) {
        if(isVisited($visitedNodes, $edge->getEndNode())){
            continue;
        }
        $recResult = visitNeighbor($graph, $edge->getEndNode(), $endNode, $visitedNodes);
        if($recResult !== -1) {
            return addNodeToTheTop($currentNode, $recResult);
        }
    }
    return -1;
}

function visitNeighbor($graph, $neighbor, $endNode, $visitedNodes) {
    return  dfsearchRec($graph, $neighbor, $endNode, $visitedNodes);
}

function addNodeToTheTop($node, $array){
    array_unshift($array, $node);
    return $array;
}

function convertToPathNodes($path) {
    if($path == -1){
        return -1;
    }
    else {
        $result = array();
        for ($i=0; $i<count($path)-1; $i++) {
            $edge = $path[$i]->getEdge($path[$i+1]);
            $pathNode = new PathNode($path[$i]->getId(), $edge->getCost(), $edge->getLine());
            array_push($result, $pathNode);
        }
        return $result;
    }
}
?>










