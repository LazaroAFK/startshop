<?php

// Carga inicial
class ventas extends controller{
    public function __construct(){
        $this -> ventaModel = $this -> model('venta');
    }

    function _remove_empty_internal($value) {
        return !empty($value) || $value === 0;
    }
    
    public function index(){
        $arreglo = $_SESSION['lista_venta'];
        console($arreglo);
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $escaner = $this -> ventaModel -> buscar($_POST['codigo']);
            console($escaner);
            array_push($arreglo, $escaner);
            console($arreglo);
            $_SESSION['lista_venta'] = array_filter($arreglo, '_remove_empty_internal');
            console($arreglo);
        }

        $this -> view('ventas/index', array_filter($arreglo, '_remove_empty_internal'));
    }

    public function eliminar($nula, $i){
        $arreglo = $_SESSION['lista_venta'];
        $nuevo_arreglo = [];
        foreach($arreglo as $dato){
            if($dato != $arreglo[$i]){
                array_push($nuevo_arreglo, $dato);
            }
        }
        $_SESSION['lista_venta'] = $nuevo_arreglo;
        $this -> view('ventas/index', array_filter($nuevo_arreglo, '_remove_empty_internal'));
    }

    public function cobrar(){
        $_SESSION['lista_venta'] = [];
    }
}