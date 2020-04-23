<?php
include_once "InFile.php";
include_once "InBrowser.php";

if (isset($_POST["string"])){
    $string = $_POST["string"];
    $logger = $_POST["logger"];
    $date = $_POST["date"];
    checkUpperLetters($string);
    if ($logger == "Browser"){
        if ($date == "Date and time"){
            $param = "d-m-y\TH:i:s";
        } else if ($date == "Only time"){
            $param = "TH:i:s";
        } else if ($date == "Off"){
            $param = "off";
        }
        $browser = new InBrowser($param);
        $browser->write($string);
    } else if ($logger == "File"){
        if (isset($_POST["filename"])){
            $filename = $_POST["filename"];
            $file = new InFile($filename);
            $file->write($string);
        }
    }
} else {
    include "form.html";
}
function checkUpperLetters($string){
    if (preg_match('/[A-ZА-Я]/', $string) === 1){
        echo "Строка ".$string." содержит заглавные буквы".'</br>';
    } else {
        echo "Строка ".$string." не содержит заглавные буквы".'</br>';
    }
}