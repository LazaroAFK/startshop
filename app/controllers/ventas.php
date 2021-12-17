<?php

// Carga inicial
class ventas extends controller{
    public function __construct(){
        $_SESSION['lista_venta'] = [];
        $this -> ventaModel = $this -> model('venta');
    }
    
    public function index(){
        $arreglo = $_SESSION['lista_venta'];
        console($arreglo);
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $escaner = $this -> ventaModel -> buscar($_POST['codigo']);
            console($escaner);
            $arreglo = array_push($escaner);
            console($arreglo);
            $_SESSION['lista_venta'] = $arreglo;
            console($arreglo);
        }

        $this -> view('ventas/index', $arreglo);
    }

    public function cobrar(){
        $_SESSION['lista_venta'] = [];
    }
}