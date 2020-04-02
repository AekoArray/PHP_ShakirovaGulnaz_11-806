<?php
$ini = parse_ini_file("index.ini", INI_SCANNER_TYPED);
$file = fopen("file.txt", 'r');
$array = array();
while(!feof($file)){
    array_push($array, fgets($file));
}

for ($i = 0; $i < count($array); $i++){
    $str = $array[$i];
    $string = explode(' ', $str);
    if ($string[0] == $ini["first_rule"]["symbol"]){
        if ($ini["first_rule"]["upper"]){
            foreach ($string as $item){
                $item = strtoupper($item);
                echo $item." ";
            }
        } else{
            foreach ($string as $item){
                $item = strtolower($item);
                echo $item." ";
            }
        }
        echo "</br>";
    } else if ($string[0] == $ini["second_rule"]["symbol"]) {
        if ($ini["second_rule"]["direction"] == '+') {
            foreach ($string as $item) {
                for ($j = 0; $j < strlen($item); $j++) {
                    if (is_numeric($item[$j])) {
                        if ($item[$j] == '9') {
                            $item[$j] = '0';
                        } else {
                            $item[$j] = (int)$item[$j] + 1;
                        }
                    }
                    echo $item[$j];
                }
                echo " ";
            }
        } else {
            foreach ($string as $item) {
                for ($j = 0; $j < strlen($item); $j++) {
                if (is_numeric($item[$j])) {
                    if ($item[$j] == '0') {
                        $item[$j] = '9';
                    } else {
                        $item[$j] = (int)$item[$j] - 1;
                    }
                }
                echo $item[$j] ;
            }
                echo " ";
        }
    }
        echo "</br>";
    } else if ($string[0] == $ini["third_rule"]["symbol"]){
        $string = implode(' ', $string);
        echo str_replace($ini["third_rule"]["delete"], '', $string);
        echo "</br>";
    } else {
        $string = implode(' ', $string);
        echo $string;
        echo "</br>";
    }
}
