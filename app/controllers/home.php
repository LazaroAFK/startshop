<?php

// Carga inicial
class home extends controller{
    public function __construct(){
        $this -> productoGrafica = $this -> model('grafica');
    }

    public function index($nula = ''){
        $productos = $this -> productoGrafica -> productos($limite, $pagina);
        $proveedores = $this -> productoGrafica -> proveedores($limite, $pagina);

        $this -> view('index', array_merge($productos, $proveedores));
    }
}