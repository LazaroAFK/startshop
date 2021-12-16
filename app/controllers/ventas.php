<?php

// Carga inicial
class ventas extends controller{
    public function __construct(){
        $_SESSION['lista_venta'] = [];
        $this -> productoModel = $this -> model('venta');
    }
    
    public function index(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $escaner = $this -> escanerModel -> buscar($_POST['codigo']);
            $_SESSION['lista_venta'] = array_merge($_SESSION['lista_venta'], $escaner['producto']);
        }

        $this -> view('ventas/index', $_SESSION['lista_venta']);
    }

    public function cobrar(){
        $_SESSION['usuario_id'] = [];
    }
}