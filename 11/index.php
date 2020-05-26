<?php

spl_autoload_register();

use logger\Logger;

$Logger = new Logger();
$type = "text";
$content = ["Hi", "json"];
$Logger->log($type, "Message", $content);
$Logger->alert("alert", ["Hi", "alert"]);
$Logger->critical("critical", ["Hi", "critical"]);

