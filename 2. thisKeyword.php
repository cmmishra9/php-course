<?php
class Mobile{
    var $model;     // Properties
    function showModel(){
        echo "Model Number is: $this->model <br>";
    }
}

$samsung = new Mobile;
$samsung->model="A8+";
$samsung->showModel();

?>