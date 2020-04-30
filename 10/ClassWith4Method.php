<?php

use exceptions\BlueException;
use exceptions\GreenException;
use exceptions\OrangeException;
use exceptions\RedException;
use exceptions\YellowException;

require_once('exceptoins/BlueException.php');
require_once('exceptoins/GreenException.php');
require_once('exceptoins/OrangeException.php');
require_once('exceptoins/RedException.php');
require_once('exceptoins/YellowException.php');

class ClassWith4Method
{

    function method1(){
    $rand = rand(1,2);
    if($rand == 1){
        throw new BlueException("This is Blue exception!");
    }
    if ($rand == 2){
        throw new GreenException("This is Green exception!");
    }
    }
    function method2(){
        $rand = rand(1,2);
        if($rand == 1){
            throw new GreenException("This is Green exception!");
        }
        if ($rand == 2){
            throw new OrangeException("This is Orange exception!");
        }
    }
    function method3(){
        $rand = rand(1,2);
        if($rand == 1){
            throw new OrangeException("This is Orange exception!");
        }
        if ($rand == 2){
            throw new RedException("This is Red exception!");
        }
    }
    function method4(){
        $rand = rand(1,2);
        if($rand == 1){
            throw new RedException("This is Red exception!");
        }
        if ($rand == 2){
            throw new YellowException("This is Yellow exception!");
        }
    }

}