<?php

if (isset($_POST['button'])){
    $str = $_POST["string"];
    echo $str;
} else{
    include "form.html";
    return;
}
if (isset($_POST["ping"])){
    exec("ping ".$str, $arr);
    var_dump($arr);
    $ping = implode(" ", $arr);
        for ($i = strripos($ping, "[") + 1; $i < strripos($ping, "]") - 1; $i++) {
echo "<b>".$ping[$i]."</b>";
    }
        echo "</br>";
    for ($i = strripos($ping, "(") + 1; $i < strripos($ping, "%") - 1; $i++) {
        $str = $str.$ping[$i];
    }
    echo 100-(int)$str;
    echo "%";
} else if(isset($_POST["tracert"])){
    exec("tracert ".$str, $arr);
        foreach ($arr as $value){
            if (preg_match("&[0-9]{1,3}[.][0-9]{1,3}[.][0-9]{1,3}[.][0-9]{1,3}&", $value)){
                echo $value." ";
            }
        }
} else {
    echo "Выберите ping или tracert";
}