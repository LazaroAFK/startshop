<?php

class cliente{

    private $db;

    public function __construct(){
        $this -> db = new base();
    }

    public function listarClientes($limite, $pagina){

        $offset = ($pagina - 1) * $limite;

        $this -> db -> query('SELECT COUNT(*) AS numero_registros FROM clientes');
        $numero_registros = $this -> db -> unico() -> numero_registros;

        $paginas = ceil($numero_registros / $limite);

        // Consulta
        $this -> db -> query("SELECT id, cliente_rfc, cliente_nombre, cliente_direccion, cliente_telefono, cliente_email, cliente_fotografia FROM clientes LIMIT $offset, $limite");

        // Ejecución
        $registros['clientes'] = $this -> db -> multiple();

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

    public function listarTodosClientes(){
        // Consulta
        $this -> db -> query('SELECT id, cliente_rfc, cliente_nombre, cliente_direccion, cliente_telefono, cliente_email, cliente_fotografia FROM clientes');

        # Ejecución
        $registros['clientes'] = $this -> db -> multiple();

        return $registros;
    }

    public function agregar($data){
        // Insertar
        $this -> db -> query('INSERT INTO clientes(cliente_rfc, cliente_nombre, cliente_direccion, cliente_email, cliente_telefono, cliente_fotografia) VALUES(:cliente_rfc, :cliente_nombre, :cliente_direccion, :cliente_email, :cliente_telefono, :cliente_fotografia)');
        // Hacer la vinculación
        $this -> db -> bind(':cliente_rfc', $data['cliente_rfc']);
        $this -> db -> bind(':cliente_nombre', $data['cliente_nombre']);
        $this -> db -> bind(':cliente_email', $data['cliente_email']);
        $this -> db -> bind(':cliente_direccion', $data['cliente_direccion']);
        $this -> db -> bind(':cliente_telefono', $data['cliente_telefono']);
        $this -> db -> bind(':cliente_fotografia', $data['cliente_fotografia']);
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
        $this -> db -> query('SELECT id, cliente_rfc, cliente_nombre, cliente_direccion, cliente_email, cliente_telefono, cliente_fotografia FROM clientes WHERE id = :id');
        // Vinculación
        $this -> db -> bind(':id', $id);
        // Ejecución

        return $this -> db -> unico();
    }

    public function eliminar($id){
        $this -> db -> query('DELETE FROM clientes WHERE id = :id');

        $this -> db -> bind(':id', $id);

        try{
            $this -> db -> execute();
            return true;
        }catch(Exception $e){
            return false;
        }
    }

    public function encontrarClientePorRFC($cliente_rfc){
        // Consulta
        $this -> db -> query('SELECT id FROM clientes WHERE cliente_rfc = :cliente_rfc');
        // Vinculación
        $this -> db -> bind(':cliente_rfc', $cliente_rfc);
        // Ejecución
        $this -> db -> unico();

        return ($this -> db -> conteoReg() > 0);
    }

    // Buscar cliente para servicio web

    public function buscarCliente($id){
        $this -> db -> query('SELECT id, cliente_nombre FROM clientes WHERE id = :id');
        // Vinculación
        $this -> db -> bind(':id', $id);
        // Ejecución
        return $this -> db -> unico();
    }

    public function buscarClienteSOAP($id){
        $this -> db -> query('SELECT cliente_nombre, cliente_direccion, cliente_email FROM clientes WHERE id = :id');
        // Vinculación
        $this -> db -> bind(':id', $id);
        // Ejecución
        $cliente = $this -> db -> unico();
        return [
            'nombre' => $cliente -> cliente_nombre,
            'direccion' => $cliente -> cliente_direccion,
            'correo' => $cliente -> cliente_email
        ];
    }

    // Servicio web -- SOAP
}