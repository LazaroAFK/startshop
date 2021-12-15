<?php

class grafica{

    private $db;
    public function __construct(){
        $this -> db = new base();
    }

    public function productos(){
        // Consulta
        $this -> db -> query('SELECT a.id as id, nombre, SUM(if(isnull(cantidad), 0, cantidad)) as cantidad FROM productos a LEFT JOIN compra b ON a.id = b.id_producto GROUP BY a.id, nombre');

        # Ejecución
        $registros['productos'] = $this -> db -> multiple();

        return $registros;
    }

    public function proveedores(){
        // Consulta
        $this -> db -> query('SELECT SUM(total) as total, SUM(iva) as iva, nombre FROM compra a LEFT JOIN proveedores b ON a.id_proveedor = b.id GROUP BY nombre');

        # Ejecución
        $registros['proveedores'] = $this -> db -> multiple();

        return $registros;
    }
}