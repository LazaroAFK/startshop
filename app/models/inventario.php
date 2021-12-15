<?php

class inventario{

    private $db;

    public function __construct(){
        $this -> db = new base();
    }

    public function listarinventarios($limite, $pagina){

        $offset = ($pagina - 1) * $limite;

        $this -> db -> query('SELECT COUNT(*) AS numero_registros FROM compra');
        $numero_registros = $this -> db -> unico() -> numero_registros;

        $paginas = ceil($numero_registros / $limite);

        // Consulta
        $this -> db -> query("SELECT id, fecha, lote, total, iva, cantidad, id_producto, id_proveedor FROM compra LIMIT $offset, $limite");

        // Ejecución
        $registros['inventarios'] = $this -> db -> multiple();

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

    public function listarTodosinventarios(){
        // Consulta
        $this -> db -> query('SELECT id, fecha, lote, total, iva, cantidad, id_producto, id_proveedor FROM compra WHERE id = b.id');

        # Ejecución
        $registros['inventarios'] = $this -> db -> multiple();

        return $registros;
    }

    public function agregar($data){
        // Insertar
        $this -> db -> query('INSERT INTO compra(fecha, lote, total, iva, cantidad, id_producto, id_proveedor) VALUES(:fecha, :lote, :total, :total * 0.16, :cantidad, :id_producto, :id_proveedor)');
        // Hacer la vinculación
        $this -> db -> bind(':fecha', $data['fecha']);
        $this -> db -> bind(':lote', $data['lote']);
        $this -> db -> bind(':total', $data['total']);
        $this -> db -> bind(':cantidad', $data['cantidad']);
        $this -> db -> bind(':id_producto', $data['id_producto']);
        $this -> db -> bind(':id_proveedor', $data['id_proveedor']);
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
        $this -> db -> query('SELECT id, fecha, lote, total, cantidad, id_producto, id_proveedor FROM compra WHERE id = :id');
        // Vinculación
        $this -> db -> bind(':id', $id);
        // Ejecución

        return $this -> db -> unico();
    }

    public function actualizar($data){
        // Consulta
        $this -> db -> query('UPDATE compra SET fecha = :fecha, lote = :lote, total = :total, iva = :total * 0.16, cantidad = :cantidad, id_producto = :id_producto, id_proveedor = :id_proveedor WHERE id = :id');
        // Vinculación
        $this -> db -> bind(':id', $data['id']);
        $this -> db -> bind(':fecha', $data['fecha']);
        $this -> db -> bind(':lote', $data['lote']);
        $this -> db -> bind(':total', $data['total']);
        $this -> db -> bind(':cantidad', $data['cantidad']);
        $this -> db -> bind(':id_producto', $data['id_producto']);
        $this -> db -> bind(':id_proveedor', $data['id_proveedor']);
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
        $this -> db -> query('DELETE FROM compra WHERE id = :id');

        $this -> db -> bind(':id', $id);

        try{
            $this -> db -> execute();
            return true;
        }catch(Exception $e){
            return false;
        }
    }

    public function encontrarinventarioPorLote($lote){
        // Consulta
        $this -> db -> query('SELECT id FROM compra WHERE lote = :lote');
        // Vinculación
        $this -> db -> bind(':lote', $lote);
        // Ejecución
        $this -> db -> unico();

        return ($this -> db -> conteoReg() > 0);
    }

}