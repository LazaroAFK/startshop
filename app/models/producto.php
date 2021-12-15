<?php

class producto{

    private $db;

    public function __construct(){
        $this -> db = new base();
    }

    public function listarProductos($limite, $pagina){

        $offset = ($pagina - 1) * $limite;

        $this -> db -> query('SELECT COUNT(*) AS numero_registros FROM productos');
        $numero_registros = $this -> db -> unico() -> numero_registros;

        $paginas = ceil($numero_registros / $limite);

        // Consulta
        $this -> db -> query("SELECT a.id as id, nombre, precio, codigo, precio_proveedor, a.id_proveedor as id_proveedor, id_inventario, if(isnull(cantidad), 0, SUM(cantidad)) as cantidad FROM productos a LEFT JOIN compra b ON a.id = b.id_producto LIMIT $offset, $limite");

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
        $this -> db -> query('SELECT id, nombre, precio, codigo, precio_proveedor, id_proveedor, id_inventario, cantidad FROM productos a, inventario b WHERE a.id_inventario = b.id');

        # Ejecución
        $registros['productos'] = $this -> db -> multiple();

        return $registros;
    }

    public function agregar($data){
        // Insertar
        $this -> db -> query('INSERT INTO productos(nombre, precio, codigo, precio_proveedor, id_proveedor, id_inventario, imagen) VALUES(:nombre, :precio, :codigo, :precio_proveedor, :id_proveedor, :id_inventario, :imagen)');
        // Hacer la vinculación
        $this -> db -> bind(':nombre', $data['nombre']);
        $this -> db -> bind(':precio', $data['precio']);
        $this -> db -> bind(':codigo', $data['codigo']);
        $this -> db -> bind(':precio_proveedor', $data['precio_proveedor']);
        $this -> db -> bind(':id_proveedor', $data['id_proveedor']);
        $this -> db -> bind(':id_inventario', $data['id_inventario']);
        $this -> db -> bind(':imagen', '');
        // Hacer la consulta execute
        try{
            $this -> db -> execute();
            return true;
        }catch(Exception $e){
            console($e);
            return false;
        }
    }

    public function editar($id){
        // Consulta
        $this -> db -> query('SELECT id, nombre, codigo, precio, precio_proveedor, id_proveedor, id_inventario FROM productos WHERE id = :id');
        // Vinculación
        $this -> db -> bind(':id', $id);
        // Ejecución

        return $this -> db -> unico();
    }

    public function actualizar($data){
        // Consulta
        $this -> db -> query('UPDATE productos SET nombre = :nombre, codigo = :codigo, precio = :precio, precio_proveedor = :precio_proveedor, id_proveedor = :id_proveedor, id_inventario = :id_inventario, imagen = :imagen WHERE id = :id');
        // Vinculación
        $this -> db -> bind(':id', $data['id']);
        $this -> db -> bind(':nombre', $data['nombre']);
        $this -> db -> bind(':precio', $data['precio']);
        $this -> db -> bind(':codigo', $data['codigo']);
        $this -> db -> bind(':precio_proveedor', $data['precio_proveedor']);
        $this -> db -> bind(':id_proveedor', $data['id_proveedor']);
        $this -> db -> bind(':id_inventario', $data['id_inventario']);
        $this -> db -> bind(':imagen', '');
        // Ejecución

        try{
            $this -> db -> execute();
            return true;
        }catch(Exception $e){
            console($e);
            return false;
        }
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

    public function encontrarproductoPorCodigo($codigo){
        // Consulta
        $this -> db -> query('SELECT id FROM productos WHERE codigo = :codigo');
        // Vinculación
        $this -> db -> bind(':codigo', $codigo);
        // Ejecución
        $this -> db -> unico();

        return ($this -> db -> conteoReg() > 0);
    }

}