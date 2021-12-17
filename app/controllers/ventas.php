<?php

// Carga inicial
class ventas extends controller{
    public function __construct(){
        // $_SESSION['lista_venta'] = [];
        $this -> ventaModel = $this -> model('venta');
    }
    
    public function index(){
        $escaner = [];
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $escaner = $this -> ventaModel -> buscar($_POST['codigo']);
            // $escaner = array_merge($_SESSION['lista_venta'], $escaner);
            // $_SESSION['lista_venta'] = $escaner
        }

        $this -> view('ventas/index', $escaner);
    }

    public function cobrar(){
        // $_SESSION['lista_venta'] = [];
    }
}