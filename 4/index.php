<?php
if (isset($_POST['button'])){
    $strings = $_POST["string"];
} else {
    include "form.html";
    return;
}
//массив строк
$strings = explode("\n", $strings);
$sum = sum($strings);
$weight = weights($strings);
$probability = probabilities($weight, $sum);

$json = ["sum" => $sum,
    "data" =>[]];
for ($i = 0; $i < count($strings) - 1; $i++){
    array_push($json["data"], ["text" => $strings[$i], "weight" => $weight[$i], "probability" => $probability[$i]]);
}
print_r(json_encode($json, JSON_UNESCAPED_UNICODE)."</br>");
print_r(json_encode(checkGenerator($strings, $weight), JSON_UNESCAPED_UNICODE));


function weights($arr){
    $weight = array();
    foreach ($arr as $str) {
        $str = explode(" ", $str);
        array_push($weight, (int) $str[count($str) - 1]);
    }
    return $weight;
}

function probabilities($arr, $sum){
    $probabilities = array();
    foreach ($arr as $num) {
        $num = $num/$sum;
        array_push($probabilities, $num);
    }
    return $probabilities;
}

function sum($arr){
    $sum = 0;
    foreach ($arr as $str) {
        $str = explode(" ", $str);
        $sum = $sum + (int) $str[count($str) - 1];
    }
    return $sum;
}

function generator($str, $weight){
    $allStrings = array();
    $allSum = 0;
    for ($i = 0; $i < count($weight); $i++){
        $allSum = $allSum + $weight[$i];
        for ($j = 0; $j < $weight[$i]; $j++){
            array_push($allStrings, $str[$i]);
        }
    }
    $random = array_rand($allStrings, 1);
    yield $allStrings[$random];
}

function checkGenerator($str, $weight){
    $checkArr = array();
    $item = 0;
    $count = array_fill(0,count($str),0);
    while ($item < 10000) {
        $randomStr = generator($str, $weight);
        foreach ($randomStr as $value){
            $i = array_search($value, $str);
            $count[$i]++;
        }
        $item++;
    }
    for ($i = 0; $i < count($str); $i++){
        array_push($checkArr, ["text" => $str[$i], "count" => $count[$i], "calculated_probability" => $count[$i]/10000]);
    }
    return $checkArr;
}

