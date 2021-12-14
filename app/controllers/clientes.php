<?php

class clientes extends controller{
    
    public function __construct(){
        $this -> clienteModel = $this -> model('cliente');
    }
    
    public function index($limite = 10, $pagina = 1){
        $clientes = $this -> clienteModel -> listarClientes($limite, $pagina);
        $this -> view('clientes/index', $clientes);
    }

    public function agregar(){
        // Inicialización para GET
        $data = [
            'cliente_rfc' => '',
            'cliente_nombre' => '',
            'cliente_email' => '',
            'cliente_direccion' => '',
            'cliente_telefono' => '',
            'cliente_fotografia' => '',
            'msg_error' => ''
        ];

        // Diferenciar si la llamada es GET o POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            // Recomendación por seguridad
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'cliente_rfc' => $_POST['cliente_rfc'],
                'cliente_nombre' => $_POST['cliente_nombre'],
                'cliente_email' => $_POST['cliente_email'],
                'cliente_direccion' => $_POST['cliente_direccion'],
                'cliente_telefono' => $_POST['cliente_telefono'],
                'cliente_fotografia' => ($_POST['cliente_fotografia']['size'] == 0) ? null : file_get_contents($_FILES['cliente_fotografia']['tmp_name'])
            ];

            // Validación
            if(empty($data['cliente_rfc']) || empty($data['cliente_nombre'])||
                empty($data['cliente_email']) || empty($data['cliente_direccion'])|
                empty($data['cliente_telefono'])){
                $data['msg_error'] = 'Llene todos los campos.';
            }

            // Formato de correo electrónico
            if(!filter_var($data['cliente_email'], FILTER_VALIDATE_EMAIL)){
                $data['msg_error'] = 'El formato del email no es correcto.';
            }

            // Validar que no exista el cliente ni el correo.
            if($this -> clienteModel -> encontrarClientePorRFC($data['cliente_rfc'])){
                $data['msg_error'] = 'Ya existe un cliente registrado con ese RFC.';
            }

            // Validación de tabla
            if(empty($data['msg_error'])){
                // Induce a utilizar la conexión a base de datos, model
                if($this -> clienteModel -> agregar($data)){
                    redirigir('/clientes');
                }{
                    $data['msg_error'] = 'Ocurrio un error inesperado.';
                }
            }
        }
        $this -> view('clientes/agregar', $data);
    }

    public function editar($nula, $id){
        // Inicialización para GET
        $data = [
            'msg_error' => ''
        ];

        // Diferenciar si la llamada es GET o POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            // Recomendación por seguridad
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id' => $_POST['id'],
                'cliente_rfc' => $_POST['cliente_rfc'],
                'cliente_nombre' => $_POST['cliente_nombre'],
                'cliente_email' => $_POST['cliente_email'],
                'cliente_direccion' => $_POST['cliente_direccion'],
                'cliente_telefono' => $_POST['cliente_telefono'],
                'cliente_fotografia' => ($_POST['cliente_fotografia']['size'] == 0) ? null : file_get_contents($_FILES['cliente_fotografia']['tmp_name'])
            ];

            // Validación
            if(empty($data['cliente_rfc']) || empty($data['cliente_nombre'])||
                empty($data['cliente_email']) || empty($data['cliente_direccion'])|
                empty($data['cliente_telefono'])){
                $data['msg_error'] = 'Llene todos los campos.';
            }

            // Formato de correo electrónico
            if(!filter_var($data['cliente_email'], FILTER_VALIDATE_EMAIL)){
                $data['msg_error'] = 'El formato del email no es correcto.';
            }

            // Validación de tabla
            if(empty($data['msg_error'])){
                // Induce a utilizar la conexión a base de datos, model
                if($this -> clienteModel -> actualizar($data)){
                    redirigir('/clientes');
                }{
                    $data['msg_error'] = 'Ocurrio un error inesperado.';
                }
            }
        }else{
            // Consulta tabla clientes
            $cliente = $this -> clienteModel -> editar($id);

            $data = [
                'id' => $cliente -> id,
                'cliente_rfc' => $cliente -> cliente_rfc,
                'cliente_nombre' => $cliente -> cliente_nombre,
                'cliente_email' => $cliente -> cliente_email,
                'cliente_direccion' => $cliente -> cliente_direccion,
                'cliente_telefono' => $cliente -> cliente_telefono,
                'cliente_fotografia' => $cliente -> cliente_fotografia
            ];
        }
        $this -> view('clientes/editar', $data);
    }

    public function eliminar($nula, $id){
        $cliente = $this -> clienteModel -> eliminar($id);
        redirigir('/clientes');
    }

    // Reporte
    public function reporte(){
        $clientes = $this -> clienteModel -> listarTodosClientes();
        $this -> view('clientes/reporte', $clientes);
    }

    // Migrar
    public function csv(){
        $clientes = $this -> clienteModel -> listarTodosClientes();
        $this -> view('clientes/csv', $clientes);
    }

    public function json(){
        $clientes = $this -> clienteModel -> listarTodosClientes();
        $this -> view('clientes/json', $clientes);
    }

    public function xml(){
        $clientes = $this -> clienteModel -> listarTodosClientes();
        $this -> view('clientes/xml', $clientes);
    }

    // Servicio web con REST
    public function sw($nulo, $id = 0){
        $cliente = $this -> clienteModel -> buscarCliente($id);
        header('Content-Type: application/json');
        echo json_encode($cliente, true);
    }
}