<?php

header('Content-type: text/html; charset=cp-1251');

if (isset($_POST['button'])){
    $str = $_POST["string"];
    $str = escapeshellcmd($str);
} else{
    include "form.html";
    return;
}
if (isset($_POST["ping"])){
    exec("ping ".$str, $arr);
    $ping = implode(" ", $arr);
    if (stristr($ping, "[") == false){
        return print "wrong string";
    }
    echo "IP address: ";
        for ($i = strripos($ping, "[") + 1; $i < strripos($ping, "]") - 1; $i++) {
echo "<b>".$ping[$i]."</b>";
    }
        echo "</br>";
    for ($i = strripos($ping, "(") + 1; $i < strripos($ping, "%") - 1; $i++) {
        $str = $str.$ping[$i];
    }
    echo 100-(int)$str;
    echo "% successful requests";
} else if(isset($_POST["tracert"])){
    exec("tracert ".$str, $arr);
    $tracert = implode(" ", $arr);
    if (stristr($tracert, "[") == false){
        return print "Wrong string";
    }
    echo "IP address: ";
    for ($i = strripos($tracert, "[") + 1; $i < strripos($tracert, "]") - 1; $i++) {
        echo "<b>".$tracert[$i]."</b>";
    }
    echo "</br>";
    echo "IP addresses:"."</br>";
    $sr = array();
            preg_match_all("/[0-9]{1,3}[.][0-9]{1,3}[.][0-9]{1,3}[.][0-9]{1,3}/", $tracert, $sr);
    foreach ($sr as $value) {
        foreach ($value as $item) {
            print "<b>" . $item . "<b><br>";
        }
    }
} else {
    echo "Выберите ping или tracert";
}