<?php

class Node{

    private $nodeId = 0;
    private $edges = array(null);

    /**
     * Constructor Node
     * Creates an instance of a Node element with an next higher int as an Index
     * @param none
     * @return none
     */
    function __construct($id){
        this.$nodeID = $id;
        //this.$nodeID = Graph.lastNode().getId() + 1 ;
    }

    /**
     * function addEdge
     * Adds the given instance of an edge on the list of outgoing edges.
     * And for debuging, prints the hole outgoing edges list.   
     * @param $edge : An additional instance of an edge object. 
     * That belongs to the this Node object as an outgoing edge.  
     * @return none
     */
    function addEdge($edge){
        array_push($edges,$edge);
        print_r(this.$edges); 
    }

    /**
     * function getEdge
     * Returns the outgoing edge wich belongs to the given node object and this object.
     * @param $node : an instance of Node, requestet for  
     * @return edge  : Edge between this object an the requested one.
     */
    function getEdge($node){
        $ret = null;
        foreach ($edges as $v){
            if($v.getEndnode() === $node){
                $ret = node;
            }
        }
        if($ret == null){
            throw new Exception("No edge between Node ".$node.getId()." and this Node ".this.getId()."." );
        }
        return $ret;
    }

    /**
     * function getId
     * Returns the outgoing edges list.
     * @param none 
     * @return nodeId : this Id
     */
    function getId(){
        return $nodeId;
    }
    
    /**
     * function getEdges
     * Returns the outgoing edges list.
     * @param none 
     * @return edges [array] : outgoing edges list of this node
     */
    function getEdges(){
        return $edges;
    }
}
?>