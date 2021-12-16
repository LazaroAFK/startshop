<?php

// Carga inicial
class escaner extends controller{
    public function __construct(){
        $this -> escanerModel = $this -> model('scan');
    }
    
    public function index(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $escaner = $this -> escanerModel -> buscar();
        }
        $this -> view('escaner', $escaner);
    }
}