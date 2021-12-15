<?php

class inventarios extends controller{
    
    public function __construct(){
        $this -> inventarioModel = $this -> model('inventario');
    }
    
    public function index($limite = 10, $pagina = 1){
        $inventarios = $this -> inventarioModel -> listarinventarios($limite, $pagina);
        console($inventarios);
        $this -> view('inventarios/index', $inventarios);
    }

    public function agregar(){
        // Inicialización para GET
        $data = [
            'fecha' => '',
            'lote' => '',
            'total' => '',
            'cantidad' => '',
            'id_producto' => '',
            'id_proveedor' => '',
            'msg_error' => ''
        ];

        // Diferenciar si la llamada es GET o POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            // Recomendación por seguridad
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'fecha' => $_POST['fecha'],
                'lote' => $_POST['lote'],
                'total' => $_POST['total'],
                'cantidad' => $_POST['cantidad'],
                'id_producto' => $_POST['id_producto'],
                'id_proveedor' => $_POST['id_proveedor']
            ];

            // Validación
            if(empty($data['fecha']) | empty($data['lote'])|
                empty($data['total']) | empty($data['cantidad'])|
                empty($data['id_producto']) | empty($data['id_proveedor'])){
                $data['msg_error'] = 'Llene todos los campos.';
            }

            // Formato de correo electrónico
            if($data['total'] <= 0){
                $data['msg_error'] = 'El total no puede ser $0.00.';
            }

            // Validar que no exista el inventario ni el correo.
            if($this -> inventarioModel -> encontrarinventarioPorLote($data['lote'])){
                $data['msg_error'] = 'Ya existe un inventario registrado con ese codigo.';
            }

            // Validación de tabla
            if(empty($data['msg_error'])){
                // Induce a utilizar la conexión a base de datos, model
                if($this -> inventarioModel -> agregar($data)){
                    redirigir('/inventarios');
                }{
                    $data['msg_error'] = 'Ocurrio un error inesperado.';
                }
            }
        }
        $this -> view('inventarios/agregar', $data);
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
                'id' => $id,
                'fecha' => $_POST['fecha'],
                'lote' => $_POST['lote'],
                'total' => $_POST['total'],
                'cantidad' => $_POST['cantidad'],
                'id_producto' => $_POST['id_producto'],
                'id_proveedor' => $_POST['id_proveedor']
            ];

            console($data);

            // Validación
            if(empty($data['fecha']) | empty($data['lote'])|
                empty($data['total']) | empty($data['cantidad'])|
                empty($data['id_producto']) | empty($data['id_proveedor'])){
                $data['msg_error'] = 'Llene todos los campos.';
            }

            // Formato de correo electrónico
            if($data['total'] <= 0){
                $data['msg_error'] = 'El total no puede ser $0.00.';
            }

            // Validación de tabla
            if(empty($data['msg_error'])){
                // Induce a utilizar la conexión a base de datos, model
                if($this -> inventarioModel -> actualizar($data)){
                    redirigir('/inventarios');
                }{
                    $data['msg_error'] = 'Ocurrio un error inesperado.';
                }
            }
        }else{
            // Consulta tabla inventarios
            $inventario = $this -> inventarioModel -> editar($id);

            $data = [
                'id' => $inventario -> id,
                'fecha' => $inventario -> fecha,
                'lote' => $inventario -> lote,
                'total' => $inventario -> total,
                'cantidad' => $inventario -> cantidad,
                'id_producto' => $inventario -> id_producto,
                'id_proveedor' => $inventario -> id_proveedor
            ];
        }
        $this -> view('inventarios/editar', $data);
    }

    public function eliminar($nula, $id){
        $inventario = $this -> inventarioModel -> eliminar($id);
        redirigir('/inventarios');
    }
}