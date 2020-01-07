<?php

class Graph{

    private $nodes = array(null);
    
    function __construct(){}


    function addNode($id){
        this.$nodes = array_push($nodes,$id);
    }

    function addEdge($startId, $endid, $cost, $line){
        $startNode = this.findNode($startId);
        $endNode = this.findNode($endId);
        $newEdge = new Edge($endnode, $cost, $line);
        if($startNode == null){
            throw new Exception($startId." is not an startnode" );
        }
        if($endnode == null){
            throw new Exception($endId." is not an endnode" );
        }
        $startnode.addEdge($newEdge);
        this.$notes.array_push($newEdge);
    }

    function findNode($id){
        //TODO fertigstellen
        return node;
    }

    function print(){
        //TODO fertigstellen
    }

    function getGraph(){
        //TODO fertigstellen
        return edge;
    }
}
?>