<?php

class productos extends controller{
    
    public function __construct(){
        $this -> productoModel = $this -> model('producto');
    }
    
    public function index($limite = 10, $pagina = 1){
        $productos = $this -> productoModel -> listarProductos($limite, $pagina);
        console($productos);
        $this -> view('productos/index', $productos);
    }

    public function agregar(){
        // Inicialización para GET
        $data = [
            'id_inventario' => '',
            'nombre' => '',
            'precio' => '',
            'precio_proveedor' => '',
            'codigo' => '',
            'id_proveedor' => '',
            'msg_error' => ''
        ];

        // Diferenciar si la llamada es GET o POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            // Recomendación por seguridad
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'id_inventario' => $_POST['id_inventario'],
                'nombre' => $_POST['nombre'],
                'precio' => $_POST['precio'],
                'precio_proveedor' => $_POST['precio_proveedor'],
                'codigo' => $_POST['codigo'],
                'id_proveedor' => $_POST['id_proveedor']
            ];

            // Validación
            if(empty($data['id_inventario']) || empty($data['nombre'])||
                empty($data['precio']) || empty($data['precio_proveedor'])|
                empty($data['codigo'])){
                $data['msg_error'] = 'Llene todos los campos.';
            }

            // Formato de correo electrónico
            if($data['precio'] <= 0){
                $data['msg_error'] = 'El precio no puede ser $0.00.';
            }

            // Validar que no exista el producto ni el correo.
            if($this -> productoModel -> encontrarproductoPorCodigo($data['codigo'])){
                $data['msg_error'] = 'Ya existe un producto registrado con ese codigo.';
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
                'nombre' => $_POST['nombre'],
                'precio' => $_POST['precio'],
                'precio_proveedor' => $_POST['precio_proveedor'],
                'codigo' => $_POST['codigo'],
                'id_proveedor' => $_POST['id_proveedor'],
                'id_inventario' => $_POST['id_inventario']
            ];

            if(empty($data['id']) || empty($data['nombre'])||
                empty($data['precio']) || empty($data['precio_proveedor'])|
                empty($data['codigo'])){
                $data['msg_error'] = 'Llene todos los campos.';
            }

            // Formato de correo electrónico
            if($data['precio'] <= 0){
                $data['msg_error'] = 'El precio no puede ser $0.00.';
            }

            // Validar que no exista el producto ni el correo.
            if($this -> productoModel -> encontrarproductoPorCodigo($data['codigo'])){
                $data['msg_error'] = 'Ya existe un producto registrado con ese codigo.';
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
                'nombre' => $producto -> nombre,
                'codigo' => $producto -> codigo,
                'precio' => $producto -> precio,
                'precio_proveedor' => $producto -> precio_proveedor,
                'id_proveedor' => $producto -> id_proveedor,
                'id_inventario' => $producto -> id_inventario
            ];
        }
        $this -> view('productos/editar', $data);
    }

    public function eliminar($nula, $id){
        $producto = $this -> productoModel -> eliminar($id);
        redirigir('/productos');
    }
}