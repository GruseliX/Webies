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

    $haltS0 =  new Node(0);
    // var_dump($haltS0);
    // echo "<br><br>";
    $haltS1 =  new Node(1);
    $haltS2 =  new Node(2);
    $haltS3 =  new Node(3);

    $line0 = new Line(0,"Uni Ulm",2);
    // var_dump($line0);
    // echo "<br><br>";
    $line1 = new Line(1,"Boefingen",1);

    $edge0 = new Edge($haltS0, 1, $line0); 
    // var_dump($edge0);
    // echo "<br><br>";
    $edge1 = new Edge($haltS1, 2, $line0);
    $edge2 = new Edge($haltS2, 3, $line0);
    $edge3 = new Edge($haltS3, 4, $line0);

   
    
    
    for($i = 0; $i <= 4; $i++){
        $graph -> addNode($i);
        
    }

    $haltS0 -> addEdge($edge1);
    $haltS1 -> addEdge($edge2);
    $haltS2 -> addEdge($edge3);
    $haltS3 -> addEdge($edge0);
    
    
    
    $graph -> myPrint();
?>



</html>