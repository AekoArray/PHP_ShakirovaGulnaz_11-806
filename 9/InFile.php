<?php
include_once "Logger.php";

class InFile extends Logger{
    private $file;

    public function __construct($file)
    {
        $this->file = fopen($file, 'w');
    }

    public function write($string)
    {
        fwrite($this->file, $string);
    }

    function __destruct()
    {
        fclose($this->file);
    }
}