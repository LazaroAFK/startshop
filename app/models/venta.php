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

        return $registros;
    }

    public function crearTicket($total){
        // Consulta
        $this -> db -> query("INSERT INTO ticket(id_usuario, fecha, total, iva) VALUES(:id_usuario, :fecha, :total, :total * 0.16)");

        $this -> db -> bind(':id_usuario', $_SESSION['usuario_id']);
        $this -> db -> bind(':fecha', date("m/d/Y"));
        $this -> db -> bind(':total', $total);
        // Ejecución
        $registros = $this -> db -> execute();

        $this -> db -> query("SELECT max(id) as id FROM ticket");

        $result = $this -> db -> unico();

        return $result -> id;
    }

    public function agregarProductoTicket($ticket_id, $id_producto){
        // Consulta
        $this -> db -> query("INSERT INTO venta(id_producto, id_ticket) VALUES(:id_producto, :id_ticket)");

        $this -> db -> bind(':id_ticket', $id_ticket);
        $this -> db -> bind(':id_producto', $id_producto);
        // Ejecución
        $this -> db -> execute();
    }

    public function ticket($id){
        // Consulta
        $this -> db -> query("SELECT id_usuario, fecha, total, iva FROM
        ticket a, venta b WHERE a.id = b.id_ticket AND a.id = :id");

        $this -> db -> bind(':id', $id);
        // Ejecución
        $registros = $this -> db -> unico();

        return $registros;
    }

    public function productosPorTicket($id){
        // Consulta
        $this -> db -> query("SELECT nombre, precio, codigo FROM productos a, venta b WHERE a.id = b.id_producto AND b.id_ticket = :id");

        $this -> db -> bind(':id', $id);
        // Ejecución
        $registros = $this -> db -> multiple();

        return $registros;
    }
}