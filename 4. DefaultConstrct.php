<?php
class Student{
	public $roll;
    function __construct(){
        echo "Constructor Called <br>";
		$this->roll = 101;
		echo $this->roll;
    }
}

$stu = new Student;
?>