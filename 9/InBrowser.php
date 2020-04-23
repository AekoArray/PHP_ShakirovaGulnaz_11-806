<?php
include_once "Logger.php";

class InBrowser extends Logger{

    private $param;

    public function __construct($param)
    {
        $this->param = $param;
    }

    public function write($string)
    {
        $date = new DateTime('now', new DateTimeZone("Europe/Moscow"));

        if ($this->param == "off"){
            print ($string);
        } else{
            $date = $date->format($this->param);
            print ($date . " " . $string);
        }

    }
}