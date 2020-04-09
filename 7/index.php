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
        for ($i = strripos($ping, "[") + 1; $i < strripos($ping, "}" - 1); $i++) {

    }
} else if(isset($_POST["tracert"])){

} else {
    echo "Выберите ping или tracert";
}