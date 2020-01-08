<html>
<?php
    include_once 'node.php';
    include_once 'edge.php';
    include_once 'graph.php';
    include_once 'line.php';
    include_once 'departure.php';
    include_once 'pathnode.php';
?>

<?php 
    $graph = new Graph();
    

    for($i = 0; $i <= 4; $i++){
        $graph -> addNode($i);
    }

    $haltS0 = $graph -> findNode(0);
    $haltS1 = $graph -> findNode(1);
    $haltS2 = $graph -> findNode(2);
    $haltS3 = $graph -> findNode(3);

    $line0 = new Line(0,"Uni Ulm",2);
    // var_dump($line0);
    // echo "<br><br>";
    $line1 = new Line(1,"Boefingen",1);

    

    // $haltS0 -> addEdge($edge1);
    // $haltS1 -> addEdge($edge2);
    // $haltS2 -> addEdge($edge3);
    // $haltS3 -> addEdge($edge0);
    
    
    $graph -> addEdge($halt3, $haltS0, 1, $line0);
    $graph -> addEdge($halt0, $haltS1, 2, $line1);
    $graph -> addEdge($halt1, $haltS2, 3, $line1);
    $graph -> addEdge($halt2, $haltS3, 4, $line0);
    

    $graph -> myPrint();
?>



</html>