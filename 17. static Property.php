<?php
class Father{
    public static $a = 10;
    public function disp(){
        echo self::$a;
    }
}
// accessing static property outside class
Father::$a=20;
$obj = new Father;
$obj->disp();
?>