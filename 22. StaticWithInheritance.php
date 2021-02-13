<?php
class Father{
    public static $a= 20;
} 
 class Son extends Father{
    function disp(){
        echo Father::$a; // self::$a
    }
 }
 $obj = new Son;
 $obj->disp();
?>