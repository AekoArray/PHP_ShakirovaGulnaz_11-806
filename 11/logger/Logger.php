<?php

namespace logger;

use DateTime;

class Logger implements LoggerInterface
{

    public function emergency($message, array $context = array())
    {

    }

    public function alert($message, array $context = array())
    {
        $this->log("alert", $message, $context);
    }

    public function critical($message, array $context = array())
    {
        $this->log("critical", $message, $context);
    }

    public function error($message, array $context = array())
    {
        $this->log("error", $message, $context);
    }

    public function warning($message, array $context = array())
    {
        $this->log("warning", $message, $context);
    }

    public function notice($message, array $context = array())
    {
        $this->log("notice", $message, $context);
    }

    public function info($message, array $context = array())
    {
        $this->log("info", $message, $context);
    }

    public function debug($message, array $context = array())
    {
        $this->log("debug", $message, $context);
    }

    public function log($level, $message, array $context = array())
    {
        $date = new DateTime('now');
        $date = $date->format('H:i:s');
        $data = [
            'type' => $level,
            'time' => $date,
            'context' => $context
        ];
        $json = json_encode($data, JSON_PRETTY_PRINT);
        $file = fopen("file.txt", 'w');
        fwrite($file, $json);
    }
}
