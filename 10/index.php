<?php


use exceptions\BlueException;
use exceptions\GreenException;
use exceptions\OrangeException;
use exceptions\RedException;
use exceptions\YellowException;

spl_autoload_register();

$class = new ClassWith4Method();
try {
    $class->method1();
    $class->method2();
    $class->method3();
    $class->method4();
} catch (BlueException $blueException){
    echo "<p style='color: blue'>".$blueException->getMessage()."</p>";
}
catch (GreenException $greenException){
    echo  "<p style='color: green'>".$greenException->getMessage()."</p>";
}
catch (OrangeException $orangeException){
    echo "<p style='color: orange'>".$orangeException->getMessage()."</p>";
}
catch (RedException $redException){
    echo "<p style='color: red'>".$redException->getMessage()."</p>";
}
catch (YellowException $yellowException){
    echo "<p style='color: yellow'>".$yellowException->getMessage()."</p>";
}