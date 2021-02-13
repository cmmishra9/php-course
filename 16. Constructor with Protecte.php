<?php
class Father{
    public $a;
    protected function __construct($x){
        echo "<br>Parent Constructor Called<br>";
        $this->a = $x;
        echo $this->a;
    }
}
class Son extends Father{
    public $b;
    function __construct($x, $y){
        parent::__construct($x);  // calling Parent Class Constructor inside Child Class constructor
        echo "<br>Child Constructor Called<br>";
        $this->b = $y;
        echo $this->b;
    }
}
$objS = new Son(10, 20);
?>