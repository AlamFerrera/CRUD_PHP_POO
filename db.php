<?php

class Conexion{
    public $lv_conexion;

    function __construct()
    {
        //echo "construct";
    }
    
    public function connect(){
        $this->lv_conexion = mysqli_connect(
            'localhost',
            'root',
            '',
            'php_crud'
        );
    }
    
    public function disconnect(){
        mysqli_close($this->lv_conexion);
    }
}