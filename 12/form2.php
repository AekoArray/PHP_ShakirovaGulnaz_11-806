<?php
if(isset($_POST["text"])){
    $str = $_POST['text'];
} else{
    include "form.php";
    return;
}
function generator($str){
    $count = 0;
    for ($i = 0; $i < strlen($str); $i++){
        if($str[$i] == "h"){
            yield"4";
            $count++;
        } elseif ($str[$i] == "e" ){
            yield "3";
            $count++;
        } elseif ($str[$i] == "o" ){
            yield "0";
            $count++;
        } else {
            yield $str[$i];
        }
    }
    echo "    Всего изменений:".$count;
}
function change($str){
    echo "Измененное слово:";
    foreach (generator($str) as $newi){
        echo $newi;
    }
}
change($str);


