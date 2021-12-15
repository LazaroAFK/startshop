<?php

class productos extends controller{
    
    public function __construct(){
        $this -> productoModel = $this -> model('producto');
    }
    
    public function index($limite = 10, $pagina = 1){
        // $productos = $this -> productoModel -> listarproductos($limite, $pagina);
        $this -> view('productos/index', $productos);
    }

    public function agregar(){
        // Inicialización para GET
        $data = [
            'producto_rfc' => '',
            'producto_nombre' => '',
            'producto_email' => '',
            'producto_direccion' => '',
            'producto_telefono' => '',
            'producto_fotografia' => '',
            'msg_error' => ''
        ];

        // Diferenciar si la llamada es GET o POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            // Recomendación por seguridad
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'producto_rfc' => $_POST['producto_rfc'],
                'producto_nombre' => $_POST['producto_nombre'],
                'producto_email' => $_POST['producto_email'],
                'producto_direccion' => $_POST['producto_direccion'],
                'producto_telefono' => $_POST['producto_telefono'],
                'producto_fotografia' => ($_POST['producto_fotografia']['size'] == 0) ? null : file_get_contents($_FILES['producto_fotografia']['tmp_name'])
            ];

            // Validación
            if(empty($data['producto_rfc']) || empty($data['producto_nombre'])||
                empty($data['producto_email']) || empty($data['producto_direccion'])|
                empty($data['producto_telefono'])){
                $data['msg_error'] = 'Llene todos los campos.';
            }

            // Formato de correo electrónico
            if(!filter_var($data['producto_email'], FILTER_VALIDATE_EMAIL)){
                $data['msg_error'] = 'El formato del email no es correcto.';
            }

            // Validar que no exista el producto ni el correo.
            if($this -> productoModel -> encontrarproductoPorRFC($data['producto_rfc'])){
                $data['msg_error'] = 'Ya existe un producto registrado con ese RFC.';
            }

            // Validación de tabla
            if(empty($data['msg_error'])){
                // Induce a utilizar la conexión a base de datos, model
                if($this -> productoModel -> agregar($data)){
                    redirigir('/productos');
                }{
                    $data['msg_error'] = 'Ocurrio un error inesperado.';
                }
            }
        }
        $this -> view('productos/agregar', $data);
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
                'producto_rfc' => $_POST['producto_rfc'],
                'producto_nombre' => $_POST['producto_nombre'],
                'producto_email' => $_POST['producto_email'],
                'producto_direccion' => $_POST['producto_direccion'],
                'producto_telefono' => $_POST['producto_telefono'],
                'producto_fotografia' => ($_POST['producto_fotografia']['size'] == 0) ? null : file_get_contents($_FILES['producto_fotografia']['tmp_name'])
            ];

            // Validación
            if(empty($data['producto_rfc']) || empty($data['producto_nombre'])||
                empty($data['producto_email']) || empty($data['producto_direccion'])|
                empty($data['producto_telefono'])){
                $data['msg_error'] = 'Llene todos los campos.';
            }

            // Formato de correo electrónico
            if(!filter_var($data['producto_email'], FILTER_VALIDATE_EMAIL)){
                $data['msg_error'] = 'El formato del email no es correcto.';
            }

            // Validación de tabla
            if(empty($data['msg_error'])){
                // Induce a utilizar la conexión a base de datos, model
                if($this -> productoModel -> actualizar($data)){
                    redirigir('/productos');
                }{
                    $data['msg_error'] = 'Ocurrio un error inesperado.';
                }
            }
        }else{
            // Consulta tabla productos
            $producto = $this -> productoModel -> editar($id);

            $data = [
                'id' => $producto -> id,
                'producto_rfc' => $producto -> producto_rfc,
                'producto_nombre' => $producto -> producto_nombre,
                'producto_email' => $producto -> producto_email,
                'producto_direccion' => $producto -> producto_direccion,
                'producto_telefono' => $producto -> producto_telefono,
                'producto_fotografia' => $producto -> producto_fotografia
            ];
        }
        $this -> view('productos/editar', $data);
    }

    public function eliminar($nula, $id){
        $producto = $this -> productoModel -> eliminar($id);
        redirigir('/productos');
    }

    // Reporte
    public function reporte(){
        $productos = $this -> productoModel -> listarTodosproductos();
        $this -> view('productos/reporte', $productos);
    }

    // Migrar
    public function csv(){
        $productos = $this -> productoModel -> listarTodosproductos();
        $this -> view('productos/csv', $productos);
    }

    public function json(){
        $productos = $this -> productoModel -> listarTodosproductos();
        $this -> view('productos/json', $productos);
    }

    public function xml(){
        $productos = $this -> productoModel -> listarTodosproductos();
        $this -> view('productos/xml', $productos);
    }

    // Servicio web con REST
    public function sw($nulo, $id = 0){
        $producto = $this -> productoModel -> buscarproducto($id);
        header('Content-Type: application/json');
        echo json_encode($producto, true);
    }
}