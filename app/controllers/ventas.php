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
        for($j = 0; $j < count($arreglo); $j++){
            if($j != $i){
                array_push($nuevo_arreglo, $arreglo[$j]);
            }
        }
        $_SESSION['lista_venta'] = $nuevo_arreglo;
        $this -> view('ventas/index', $nuevo_arreglo);
    }

    public function ticket($nula, $ticket_id = 0){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $arreglo = $_SESSION['lista_venta'];
            $total = 0; 
            foreach($arreglo as $produto){
              $total += $produto -> precio;
            }
            $ticket_id = $this -> ventaModel -> crearTicket($total);
            foreach($arreglo as $produto){
                $this -> ventaModel -> agregarProductoTicket($ticket_id, $produto -> id);
            }
            $_SESSION['lista_venta'] = [];
        }
        $ticket['ticket'] = $this -> ventaModel -> ticket($ticket_id);
        $productos['productos'] = $this -> ventaModel -> productosPorTicket($ticket -> id);
        $arreglo = array_merge($ticket, $productos);
        $this -> view('ventas/ticket/' . $ticket_id, $arreglo);
    }
}