<?php

require_once ("model/Graph.class.php");
require_once ("model/Node.class.php");
require_once ("model/Departure.class.php");
require_once ("model/Line.class.php");
require_once ("Departures.php");

class Getter {

    const STOP = "stop/";
    const DATA = "data/";
    const DEPARTURE_START = "/departure/?start=";

    private $basicLink = "morgal.informatik.uni-ulm.de:8000/line/";

    function __construct() {
    }

    function getGraph() {
        $data = $this->requestData($this->basicLink.self::DATA);
        $graph = $this->createNodes($data);
        return $this->createEdges($graph, $data);
    }

    function getStopList() {
        $stopData = $this->requestData($this->basicLink.self::STOP);
        return $stopData["stops"];
    }

    function getDepartures($id, $time) {
        $url = $this->createUrlForDeparture($id,$time);
        $data = $this->requestData($url);
        return $this->getDeparturesByData($data);
    }

    private function createUrlForDeparture($id, $time) {
        $departureTime = $time->format("H:i");
        return $this->basicLink.self::STOP.$id.self::DEPARTURE_START.$departureTime;
    }

    private function getDeparturesByData($data) {
        $result = array();
        foreach ($data as $item) {
            $time = new DateTime($item["time"]);
            $departure = new Departure($item["line"], $item["display"], $time);
            array_push($result, $departure);
        }
        return new Departures($result);
    }

    private function requestData($url) {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        return json_decode($response,true);
    }

    private function createNodes($data) {
        $result = new Graph();
        foreach ($data["stops"] as $index=>$name) {
            $result->addNode($index);
        }
        return $result;
    }

    private function createEdges($graph, $data) {
        foreach ($data["lines"] as $line) {
            $previousNode = null;
            foreach ($line["trip"] as $stop) {
                if($previousNode !== null) {
                    $line1 = new Line($line["id"], $line["display"], $line["heading"]);
                    $graph->addEdge($previousNode, $stop["stop"], $stop["time"], $line1);
                }
                $previousNode = $stop["stop"];
            }
        }
        return $graph;
    }
}

?>