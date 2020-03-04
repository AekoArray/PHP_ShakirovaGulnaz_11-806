<?php
$str = $_POST['text'];
function change($string){
    $arr =str_split($string);
    $count = 0;
    foreach ($arr as &$i){
        if($i == "h"){
            $i = "4";
            $count++;
        } elseif ($i == "e" ){
            $i = "3";
            $count++;
        } elseif ($i == "o" ){
            $i = "0";
            $count++;
        }
    }
    echo "Исходная строка: ".implode($arr);
    echo " Всего замен: ".$count;
}
change($str);
