<?php
    class Father {
        public $sci = 101;
    }
    interface Mother{
        const math = 102;
        public function disp();
    }
    interface Uncle{

    }
    class Son extends Father implements Mother, Uncle  {
        public function disp() {
            echo $this->sci;
            echo Mother::math;
        }
    }
    $obj = new Son;
    $obj->disp();
?>