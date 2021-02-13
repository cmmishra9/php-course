<?php
// Single Inheritance 
class Father {
    public $a;
    public $b;
    function getValue($x, $y){
        $this->a = $x;
        $this->b = $y;
    }
}
class Son extends Father {
    function display(){
        echo "Value of A: $this->a <br>"; // son accessing Father's variable
        echo "Value of B: $this->b";      // son accessing Father's variable
    }
}
$obj = new Son;     // creating Son Class Object obj
$obj->getValue(10, 20);   // Calling Father Class Function by Son's obj  
$obj->display();        // Calling Son's own function

?>

