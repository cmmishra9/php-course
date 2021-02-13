<?php
class Student{
    public $roll;
    function __construct($enroll){
        echo "Para Construct Called <br>";
        $this->roll = $enroll;
        echo $this->roll;
    }
    function __destruct(){
        echo "<br> Object Destroyed";
    }
}
$stu = new Student(101);
?>