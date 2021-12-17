<?php

// Carga inicial
class ventas extends controller{
    public function __construct(){
        $this -> ventaModel = $this -> model('venta');
    }
    
    public function index(){
        $arreglo = $_SESSION['lista_venta'];
        console($arreglo);
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $escaner = $this -> ventaModel -> buscar($_POST['codigo']);
            if(!empty($escaner)){
                console($escaner);
                array_push($arreglo, $escaner);
                console($arreglo);
                $_SESSION['lista_venta'] = $arreglo;
                console($arreglo);
            }
        }

        $this -> view('ventas/index', $arreglo);
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
        $this -> view('ventas/index', $nuevo_arreglo);
    }

    public function cobrar(){
        $_SESSION['lista_venta'] = [];
    }
}