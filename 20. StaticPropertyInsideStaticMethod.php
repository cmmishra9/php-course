<?php
class Father{
    // Non-static Property
    // public $a = 10; 
    public static $a= 10;
    public static function disp(){
        // Non-Static Property cant be accesed inside static Method
        // echo $this->a;  
        echo self::$a;
    }
} 
Father::disp();
?>