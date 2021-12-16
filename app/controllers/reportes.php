<?php

class reportes extends controller{
    
    public function __construct(){
        // $this -> reporteModel = $this -> model('reporte');
    }

    public function index(){
        $this -> view('/construccion');
    }
}