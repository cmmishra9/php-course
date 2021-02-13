<?php
// Public Property or Method Can be accessed from anywhere
class Father{
    // var $a
    // $a
    public $a;
    // function displayParent()
    public function displayParent(){
        echo "Parent Function $this->a";
    }  
}
$objF = new Father;
$objF->a = 10;      // accessing public property with object
$objF->displayParent(); // accessing public method with object

// class Son extends Father{
//     public function displayChild($x){
//         $this->a = $x;      // acessing parent class public property
//         echo "Child Value is $this->a <br>";
//         $this->displayParent(); // accessing parent class public method
//     }   
// }
// $obj = new Son;
// $obj->displayChild(10);
?>