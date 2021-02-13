<?php
// Child Class inherit Parent's Constructor
class Father{
    function __construct(){
        echo "<br>Parent Constructor Called<br>";
    }
}
class Son extends Father{
    function __construct(){
		// Father::__construct();
        parent::__construct();   // calling Parent Class Constructor inside Child Class constructor
        echo "Child Constructor Called";
    }
}
$objS = new Son();
?>