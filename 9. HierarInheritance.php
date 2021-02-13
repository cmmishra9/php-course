<?php
// Hierarchical Inheritance 
class Father {
    public $a;
    public $b;
    function getValue($x, $y){
        $this->a = $x;
        $this->b = $y;
    }
} 
class Son extends Father {
    function add(){
        return $this->a + $this->b;
    }
    function display(){
        echo "Value of A: $this->a <br>";
        echo "Value of B: $this->b <br>";
        echo "Addition: " . $this->add() . "<br>";
        // echo "Addition: $this->add()" This is Wrong Statement
    }
} 
class Daughter extends Father {
    function multi(){
        return $this->a * $this->b;
    }
    function disp(){
        echo "Value of A: $this->a <br>";
        echo "Value of B: $this->b <br>";
        echo "Multiplication: " . $this->multi() . "<br>";
        // echo "Multiplication: $this->multi()" This is Wrong Statement
    }
}
$objs = new Son;        // creating Son Class Object objs
$objd = new Daughter;     // creating Daughter Class Object objd
$objs->getValue(40, 50);   // Calling Father Class Function by Son's objs
$objs->display();           // Calling Son's Own Function 
$objd->getValue(10, 20); // Calling Father Class Function by Daughter's objd
$objd->disp();        // Calling Daughter's own function
?>