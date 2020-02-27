<?php
$source = $_POST['textarea'];
//$source = "++++++++++[>+++++++>++++++++++>+++>+<<<<-]>++.>+.+++++++..+++.>++.<<+++++++++++++++.>.+++.------.--------.>+.>.";
$source = array_values(array_filter(preg_split('//', $source)));


$chain =array_values(array_filter(preg_split('//', $_POST['text'])));
$cell = 0;
$brackets = 0;
for($i=0; $i<count($source); ++$i) {
    switch($source[$i]) {
        case "+" :
            $chain[$cell]++;
            break;
        case "-" :
            $chain[$cell]--;
            break;
        case "." :
            print chr($chain[$cell]);
            break;
        case "," :
            $chain[$cell] = ord($chain[$cell]);
            break;
        case ">" :
            $cell++;
            if(!isset($chain[$cell])) {
                $chain[$cell] = 0;
            }
            break;
        case "<" :
            $cell--;
            if(!isset($chain[$cell])) {
                $chain[$cell] = 0;
            }
            break;
        case "[" :
            if(!$chain[$cell]) {
                $brackets = 1;
                while($brackets) {
                    $i++;
                    if($source[$i] == "[") {
                        $brackets++;
                    } else if($source[$i] == "]") {
                        $brackets--;
                    }
                }
            }
            break;
        case "]" :
            if($chain[$cell]) {
                $brackets = 1;
                while($brackets) {
                    $i--;
                    if($source[$i] == "]") {
                        $brackets++;
                    } else if($source[$i] == "[") {
                        $brackets--;
                    }
                }
            }
            break;
    }
}
