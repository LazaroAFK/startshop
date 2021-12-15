<?php

class producto{

    private $db;

    public function __construct(){
        $this -> db = new base();
    }

    public function listarproductos($limite, $pagina){

        $offset = ($pagina - 1) * $limite;

        $this -> db -> query('SELECT COUNT(*) AS numero_registros FROM productos');
        $numero_registros = $this -> db -> unico() -> numero_registros;

        $paginas = ceil($numero_registros / $limite);

        // Consulta
        $this -> db -> query("SELECT id, producto_rfc, producto_nombre, producto_direccion, producto_telefono, producto_email, producto_fotografia FROM productos LIMIT $offset, $limite");

        // Ejecución
        $registros['productos'] = $this -> db -> multiple();

        $data = [
            'limite' => $limite,
            'pagina' => $pagina,
            'paginas' => $paginas,
            'pagina_previa' => ($pagina - 1),
            'pagina_siguiente' => ($pagina + 1),
            'numero_registros' => $numero_registros
        ];

        return array_merge($data, $registros);
    }

    public function listarTodosproductos(){
        // Consulta
        $this -> db -> query('SELECT id, producto_rfc, producto_nombre, producto_direccion, producto_telefono, producto_email, producto_fotografia FROM productos');

        # Ejecución
        $registros['productos'] = $this -> db -> multiple();

        return $registros;
    }

    public function agregar($data){
        // Insertar
        $this -> db -> query('INSERT INTO productos(producto_rfc, producto_nombre, producto_direccion, producto_email, producto_telefono, producto_fotografia) VALUES(:producto_rfc, :producto_nombre, :producto_direccion, :producto_email, :producto_telefono, :producto_fotografia)');
        // Hacer la vinculación
        $this -> db -> bind(':producto_rfc', $data['producto_rfc']);
        $this -> db -> bind(':producto_nombre', $data['producto_nombre']);
        $this -> db -> bind(':producto_email', $data['producto_email']);
        $this -> db -> bind(':producto_direccion', $data['producto_direccion']);
        $this -> db -> bind(':producto_telefono', $data['producto_telefono']);
        $this -> db -> bind(':producto_fotografia', $data['producto_fotografia']);
        // Hacer la consulta execute
        try{
            $this -> db -> execute();
            return true;
        }catch(Exception $e){
            return false;
        }
    }

    public function editar($id){
        // Consulta
        $this -> db -> query('SELECT id, producto_rfc, producto_nombre, producto_direccion, producto_email, producto_telefono, producto_fotografia FROM productos WHERE id = :id');
        // Vinculación
        $this -> db -> bind(':id', $id);
        // Ejecución

        return $this -> db -> unico();
    }

    public function eliminar($id){
        $this -> db -> query('DELETE FROM productos WHERE id = :id');

        $this -> db -> bind(':id', $id);

        try{
            $this -> db -> execute();
            return true;
        }catch(Exception $e){
            return false;
        }
    }

    public function encontrarproductoPorRFC($producto_rfc){
        // Consulta
        $this -> db -> query('SELECT id FROM productos WHERE producto_rfc = :producto_rfc');
        // Vinculación
        $this -> db -> bind(':producto_rfc', $producto_rfc);
        // Ejecución
        $this -> db -> unico();

        return ($this -> db -> conteoReg() > 0);
    }

    // Buscar producto para servicio web

    public function buscarproducto($id){
        $this -> db -> query('SELECT id, producto_nombre FROM productos WHERE id = :id');
        // Vinculación
        $this -> db -> bind(':id', $id);
        // Ejecución
        return $this -> db -> unico();
    }

    public function buscarproductoSOAP($id){
        $this -> db -> query('SELECT producto_nombre, producto_direccion, producto_email FROM productos WHERE id = :id');
        // Vinculación
        $this -> db -> bind(':id', $id);
        // Ejecución
        $producto = $this -> db -> unico();
        return [
            'nombre' => $producto -> producto_nombre,
            'direccion' => $producto -> producto_direccion,
            'correo' => $producto -> producto_email
        ];
    }

    // Servicio web -- SOAP
}