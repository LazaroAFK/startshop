<?php

class venta{

    private $db;
    public function __construct(){
        $this -> db = new base();
    }

    public function buscar($code){
        // Consulta
        $this -> db -> query("SELECT a.id as id, nombre, precio, codigo, precio_proveedor, a.id_proveedor as id_proveedor, id_inventario, SUM(if(isnull(cantidad), 0, cantidad)) as cantidad FROM productos a LEFT JOIN compra b ON a.id = b.id_producto WHERE codigo = :codigo GROUP BY a.id, nombre, precio, codigo, precio_proveedor, a.id_proveedor, id_inventario");

        $this -> db -> bind(':codigo', $code);
        // Ejecución
        $registros = $this -> db -> unico();

        return [$registros];
    }
}