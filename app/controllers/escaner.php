<?php

// Carga inicial
class escaner extends controller{
    public function __construct(){
        $this -> productoModel = $this -> model('escaner');
    }
    
    public function index(){
        $this -> view('escaner', $productos);
    }
}