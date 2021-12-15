<?php

// Carga inicial
class ventas extends controller{
    public function __construct(){
        $this -> productoModel = $this -> model('venta');
    }
    
    public function index(){
        $this -> view('ventas/index', $productos);
    }
}