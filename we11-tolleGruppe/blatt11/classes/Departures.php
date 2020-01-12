<?php

class Departures {

    private $departures;

    function __construct($departures){
        $this->departures = $departures;
    }

    public function getDepartures()
    {
        return $this->departures;
    }

    function getNext($line, $time){
        $departure = $this->nextDeparture($line, $time);
        if($departure !== null){
            return $departure;
        }
        return null;
    }

    function getDelay($line, $time) {
        return $this->calculateDurationUntilNextDeparture($line, $time);
    }

    private function calculateDurationUntilNextDeparture($line, $time) {
        $departureTime = $this->nextDeparture($line, $time)->getTime();
        $duration = $departureTime->diff($time);
        return $this->getDurationInMinute($duration);
    }

    private function nextDeparture($line, $time) {
        foreach ($this->departures as $departure) {
            if($this->isNextDeparture($line, $time, $departure)) {
                return $departure;
            }
        }
        return null;
    }

    private function isNextDeparture($line,$time,$departure) {
        return $departure->getLine() == $line && $departure->getTime() > $time;
    }

    private function getDurationInMinute($duration) {
        return $duration->format("%i");
    }
}


?>