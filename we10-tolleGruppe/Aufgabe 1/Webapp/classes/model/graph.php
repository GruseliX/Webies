<?php

class Graph{

    private $nodes = array();
    
    function __construct(){}

    /**
     * addNode
     * Adds a specific Node to the graph.
     * @param id the ID of the new node 
     */
    function addNode($id){
        if ($nodes[$id] == NULL){
            $newNode = new Node($id);
            $nodes[] = $newNode;
            //array_push($nodes,$nNode); // tut leider so nicht...
        }
        else{
            throw new Exception("The Node with the ID ".$id." exists alredy." );
        }
    }

    /**
     * addEdge
     * Adds a specific Edge between tow nodtes to the graph.
     * @param startId   : id of the startnode
     * @param endId     : id of the endnode
     * @param cost      : the cost of this new edge
     * @param line      : the line that drives on this edge
     */
    function addEdge($startId, $endId, $cost, $line){
        $startNode = $this -> findNode($startId);
        $endNode = $this -> findNode($endId);
        $newEdge = new Edge($endNode, $cost, $line);
        if($startNode == null){
            throw new Exception($startId." is not an startnode" );
        }
        if($endnode == null){
            throw new Exception($endId." is not an endnode" );
        }
        $startnode -> addEdge($newEdge);
        array_push($notes,$newEdge);
    }

    /**
     * findNode
     * Serches for a specific node in the graph
     * @param id the ID of the searched node 
     */
    function findNode($id){
        $node = null;
        $node = $nodes[$id];
        if($node == null){
            throw new Exception("A node with that id ".$id. "is not contained in this graph." ); 
            return;
        }
        return $node;
    }

    /**
     * print
     * Prints the praph with all its nodes and their edges  
     */
    function myPrint(){
        echo "<br>";
        var_dump($nodes);
        echo "<h3>Print</h3>";
        echo "<p>";

        foreach($nodes ? $nodes : [] as $val){
            echo "test";
        }
        foreach((array)$nodes as $val){
            echo "Test";
            $edges  ->  $val = getEdges();
            
            echo $val." ";
            foreach((array)$val -> $edges as $v){
                echo "-> ";
                echo "".$v -> getEndNode() -> getId();
            }
            echo "<br>";
        }
        echo "</p>";
    }

    /**
     * getGraph
     * Returns the whole graph 
     * @return this [Graph] returns the whole graph 
     */
    function getGraph(){
        return $this;
    }
}
?>