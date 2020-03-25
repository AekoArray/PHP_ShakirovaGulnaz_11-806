<?php

if (isset($_POST['button'])){
    $str = $_POST["string"];
    checkLength($str);
    check2symbolsOfAllCategory($str);
    check3symbols($str);
} else{
    include "form.html";
    return;
}
function checkLength($str){
    if (!preg_match('/.{10}/', $str)){
        echo "Пароль меньше 10 символов</br>";
    }
}
function check2symbolsOfAllCategory($str){
    if (!preg_match('/(.*[a-z].*){2,}/', $str)){
        echo "Пароль должен иметь хотя бы две строчные буквы</br>";
    }
    if (!preg_match('/(.*[A-Z].*){2,}/', $str)){
        echo "Пароль должен иметь хотя бы две прописные буквы</br>";
    }
    if (!preg_match('/(.*[0-9].*){2,}/', $str)){
        echo "Пароль должен иметь хотя бы две цифры</br>";
    }
    if (!preg_match('/(.*[%$#_*].*){2,}/', $str)){
        echo "Пароль должен иметь хотя бы два символа %$#_*</br>";
    }
}
function check3symbols($str){
    if (preg_match('/(.*[a-z]{4,}.*)/', $str)){
        echo "Пароль содержит более 3 строчные буквы подряд</br>";
    }
    if (preg_match('/(.*[A-Z]{4,}.*)/', $str)){
        echo "Пароль содержит более 3 прописные буквы подряд</br>";
    }
    if (preg_match('/(.*[0-9]{4,}.*)/', $str)){
        echo "Пароль содержит более 3 цифр подряд</br>";
    }
    if (preg_match('/(.*[%$#_*]{4,}.*)/', $str)){
        echo "Пароль содержит более 3 символа %$#_* подряд </br>";
    }
}
