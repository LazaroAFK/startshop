<?php

class usuarios extends controller{
    
    public function __construct(){
        $this -> usuarioModel = $this -> model('usuario');
    }

    public function index(){
        $this -> view('/construccion');
    }

    public function login(){
        // Inicialización para GET
        $data = [
            'usuario_uid' => '',
            'usuario_password' => '',
            'msg_error' => ''
        ];

        // Diferenciar si la llamada es GET o POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            // Recomendación por seguridad
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'usuario_uid' => $_POST['usuario_uid'],
                'usuario_password' => $_POST['usuario_password']
            ];

            // Validación
            if(empty($data['usuario_uid']) || empty($data['usuario_password'])){
                $data['msg_error'] = 'Llene todos los campos.';
            }

            // Validación de tabla
            if(empty($data['msg_error'])){
                // Induce a utilizar la conexión a base de datos, model

                $logueado = $this -> usuarioModel -> login($data['usuario_uid'], $data['usuario_password']);

                if($logueado){
                    // Usar una sesión controlada, segura
                    $_SESSION['usuario_id'] = $logueado -> usuario_id;
                    $_SESSION['usuario_nombre'] = $logueado -> usuario_nombre;
                    $_SESSION['usuario_email'] = $logueado -> usuario_email;

                    redirigir('/');
                }else{
                    $data['msg_error'] = 'El usuario y/o contraseña son incorrectos.';
                }
            }
        }
        $this -> view('usuarios/login', $data);
    }

    public function register(){
        // Inicialización para GET
        $data = [
            'usuario_uid' => '',
            'usuario_nombre' => '',
            'usuario_email' => '',
            'usuario_password' => '',
            'confirmacion_password' => '',
            'msg_error' => ''
        ];

        // Diferenciar si la llamada es GET o POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            // Recomendación por seguridad
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            $data = [
                'usuario_uid' => $_POST['usuario_uid'],
                'usuario_nombre' => $_POST['usuario_nombre'],
                'usuario_email' => $_POST['usuario_email'],
                'usuario_password' => $_POST['usuario_password'],
                'confirmacion_password' => $_POST['confirmacion_password']
            ];

            // Validación
            if(empty($data['usuario_uid']) || empty($data['usuario_nombre'])||
                empty($data['usuario_email']) || empty($data['usuario_password'])|
                empty($data['confirmacion_password'])){
                $data['msg_error'] = 'Llene todos los campos.';
            }

            // Igualdad de las contraseñas
            if($data['usuario_password'] != $data['confirmacion_password']){
                $data['msg_error'] = 'La contraseña no coincide.';
            }

            // Formato de correo electrónico
            if(!filter_var($data['usuario_email'], FILTER_VALIDATE_EMAIL)){
                $data['msg_error'] = 'El formato del email no es correcto.';
            }

            // Validar que no exista el usuario ni el correo.
            if($this -> usuarioModel -> encontrarUsuarioPorEmailOUsuario($data['usuario_uid'], $data['usuario_email'])){
                $data['msg_error'] = 'El usuario y/o correo ya existen.';
            }

            // Validación de tabla
            if(empty($data['msg_error'])){
                // Induce a utilizar la conexión a base de datos, model
                $data['usuario_password'] = password_hash($data['usuario_password'], PASSWORD_DEFAULT);
                if($this -> usuarioModel -> register($data)){
                    redirigir('/usuarios/login');
                }{
                    $data['msg_error'] = 'Ocurrio un error inesperado.';
                }
            }
        }
        $this -> view('usuarios/register', $data);
    }

    public function logout(){
        // Destruir los valores asociados a la sesión
        unset($_SESSION['usuario_id']);
        unset($_SESSION['usuario_nombre']);
        unset($_SESSION['usuario_email']);

        redirigir('/usuarios/login');
    }
}
