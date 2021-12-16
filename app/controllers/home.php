<?php

// Carga inicial
class home extends controller{
    public function __construct(){
        $this -> productoGrafica = $this -> model('grafica');
    }

    public function index($nula = ''){
        if($_SESSION['usuario_tipo'] == 'Cajero'){
            redirigir('/ventas');
        }else if($_SESSION['usuario_tipo'] == 'Invitado'){ 
            redirigir('/escaner');
        }
        $productos = $this -> productoGrafica -> productos($limite, $pagina);
        $proveedores = $this -> productoGrafica -> proveedores($limite, $pagina);

        $this -> view('index', array_merge($productos, $proveedores));
    }
}