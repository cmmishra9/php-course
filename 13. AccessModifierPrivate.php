<?php
// Private Property or Method can be accessed only within same class
// Private Property cannot be access outside class or with object
// In Inheritance, Child Class cannot access Parent's Private Property or Method
class Father{
    private $a;     // Private Property 
    public function displayParent(){   // private function displayParent()
        echo "Parent Function $this->a";    // can access private property here within same class
    }  
}
$objF = new Father;
$objF->a = 10;      // Error: accessing Private property with object
$objF->displayParent(); // accessing public method with object

// class Son extends Father{
//     public function displayChild($x){
//         $this->a = $x;      // Cant access parent class private property in child class
//         echo "Child Value is $this->a <br>";
//         $this->displayParent(); // accessing parent class public method
//     }   
// }
// $obj = new Son;
// $obj->displayChild(10);
?>