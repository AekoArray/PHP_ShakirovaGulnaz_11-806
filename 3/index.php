<?php
$array = array();
$arrayStr = array();
if (isset($_POST['button'])){
    $str = explode("\n", $_POST["string"]);
    foreach ($str as $string){
        array_push($array, $string);
        $arr = explode(" ", $string);
        shuffle($arr);
        array_push($arrayStr, $arr);
    }
    mix($arrayStr);
} else{
    include "form.html";
    return;
}
function mix($array){
    usort($array, function ($a, $b){
        return strcasecmp($a[1], $b[1]);
    });

    foreach ($array as $item){
        print implode(" ", $item) . "</br>";
    }
}




