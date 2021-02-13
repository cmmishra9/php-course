<?php
class Student{
    public $roll;
    function __construct($enroll){
        echo "Para Construct Called <br>";
        $this->roll = $enroll;
        echo $this->roll;
    }
}
$stu = new Student(101);
?>