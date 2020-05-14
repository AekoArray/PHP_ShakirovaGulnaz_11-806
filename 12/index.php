<?php
session_start();
if (isset($_POST['text'])){
    $text = $_POST['text'];
    $_SESSION['text'] = $text;
    if (!isset($_COOKIE["text"])){
        setcookie("text", $text, time()+3600);
        $_COOKIE["text"] = $text;
    }
    header("Location: http://localhost:63342/12/form2.php?text=$text");
}else{
    include("form.php");
}