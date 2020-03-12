<?php
echo "Извините за ужасный код :с"."</br>";
$array = array();
if (isset($_POST['button'])){
    $str = explode("\n", $_POST["string"]);
    foreach ($str as $string){
        array_push($array, $string);
        $arr = explode(" ", $string);
        shuffle($arr);
        $arr = implode(" ", $arr);
        array_push($array, $arr);
    }
    mix($array);
} else{
    include "form.html";
    return;
}
function mix($array)
{
    for ($i = 0; $i <= count($array) - 1; $i++) {
                if (($i + 1) == count($array)){
                    $el = explode(" ", $array[$j]);
                    $el2 = explode(" ",  $array[$i]);
        } else {
            $j = $i + 1;
                    $el = explode(" ", $array[$i]);
                    $el2 = explode(" ",  $array[$j]);
        }
                $newarr = array();
                array_push($newarr, $el[1]);
                array_push($newarr, $el2[1]);
                if (array_key_first($newarr) != 0){
                                $buf = $array[$j];
                                $array[$j] = $array[$i];
                                $array[$i] = $buf;
                }
    }
            foreach ($array as $item) {
            echo $item . "</br>";
        }
}




