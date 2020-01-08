<?php
class Line {
    private $id;
    private $display;
    private $heading;

    function __construct($id, $display, $heading) {
        $this->id = $id;
        $this->display = $display;
        $this->heading = $heading;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDisplay()
    {
        return $this->display;
    }

    public function getHeading()
    {
        return $this->heading;
    }

}
?>