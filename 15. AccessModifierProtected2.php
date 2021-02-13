<?php
// Cannot access Protected Property or Method Outside Class or Object
// Protected Property or Class can be accessed within same class and
// Child Class can access Parent's or GrandParent's Protected Property or Method
// For accessing parent's protected property syntax are: 
// parent::propertyName  or ClassName::propertyName
class Father{
    protected $a;     // Protected Property 
    protected function displayParent(){   // protected function displayParent()
        echo "Parent Function $this->a";
    }  
}

class Son extends Father{
    
}

class GrandSon extends Son {
    public function displayGrandChild($x){
        $this->a = $x;      // Can access Grandparent class protected property in Grandchild class
        echo "Child Value is $this->a <br>";
        $this->displayParent(); // accessing Grandparent class Protected method
    } 
}
$obj = new GrandSon;
$obj->displayGrandChild(10);
?>