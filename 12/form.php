<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="form2.php" method="post">
    <input type="text" name="text" value="
<?php
    if (isset($_COOKIE["text"])){
        print $_COOKIE["text"];
    }
    if (isset($_SESSION['text'])){
        print $_SESSION['text'];
    }
    ?>
">
    <input type="submit" name="button" value="submit">
</form>
</body>
</html>