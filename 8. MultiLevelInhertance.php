<?php
// MultiLevel Inheritance 
class Father {
    public $a;
    public $b;
    function getValue($x, $y){
        $this->a = $x;
        $this->b = $y;
    }
}
class Son extends Father {
    public $c = 30;
    public $sum;
    function add(){      
        $this->sum = $this->a + $this->b + $this->c;
        return $this->sum;
    }
} 
class GrandSon extends Son {
    function display(){
        echo "Value of A: $this->a <br>"; // Grandson accessing Father's variable
        echo "Value of B: $this->b <br>"; // Grandson accessing Father's variable
        echo "Value of C: $this->c <br>"; // Grandson accessing Son's variable
        echo "Value of Sum: $this->sum <br>"; // Grandson accessing Son's variable
    }
}
$obj = new GrandSon;     // creating Son Class Object obj
$obj->getValue(10, 20);   // Calling Father Class Function by Son's obj
$obj->add();   // Calling Father Class Function by Son's obj
$obj->display();        // Calling Son's own function
?>