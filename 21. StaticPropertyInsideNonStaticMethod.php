<?php
class Father{
    public static $a= 10;
    public function disp(){
        // accessing static property inside non-static method  
        echo self::$a; 
    }
} 
$obj = new Father;
$obj->disp();
?>