<?php
// Cannot access Protected Property or Method Outside Class or Object
// Protected Property or Class can be accessed within same class and
// Child Class can access Parent's or GrandParent's Protected Property or Method
// For accessing parent's protected property syntax are: 
// parent::propertyName  or ClassName::propertyName
class Father{
    protected $a;     // Protected Property 
    public function displayParent(){   // protected function displayParent()
        echo "Parent Function $this->a";
    }  
}
$objF = new Father;
$objF->a = 10;      // Error: accessing Protected property with object
$objF->displayParent(); // accessing public method with object

// class Son extends Father{
//     public function displayChild($x){
//         $this->a = $x;      // Can access parent class protected property in child class
//         echo "Child Value is $this->a <br>";
//         $this->displayParent(); // accessing parent class public method
//     }   
// }
// $obj = new Son;
// $obj->displayChild(10);
?>