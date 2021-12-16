<?php

class usuario{

    private $db;
    public function __construct(){
        $this -> db = new base();
    }

    // CRUD

    public function login($usuario_uid, $usuario_password){
        // Enviar el query
        $this -> db -> query('SELECT usuario_id, usuario_uid, usuario_nombre, usuario_password, b.descripcion as tipo FROM usuarios a LEFT JOIN tipo_usuario b ON a.id_tipo_usuario = b.id WHERE usuario_uid = :usuario_uid');
        // Hacer la vinculación
        $this -> db -> bind(':usuario_uid', $usuario_uid);
        // Hacer la consulta execute
        $registro = $this -> db -> unico();

        if($this -> db -> conteoReg() > 0){
            $hashedPassword = $registro -> usuario_password;
            if(password_verify($usuario_password, $hashedPassword)){
                return $registro;
            }
        }

        return false;
    }

    public function register($data){
        // Insertar
        $this -> db -> query('INSERT INTO usuarios(usuario_uid, usuario_nombre, usuario_password, usuario_email) VALUES(:usuario_uid, :usuario_nombre, :usuario_password, :usuario_email)');
        // Hacer la vinculación
        $this -> db -> bind(':usuario_uid', $data['usuario_uid']);
        $this -> db -> bind(':usuario_nombre', $data['usuario_nombre']);
        $this -> db -> bind(':usuario_email', $data['usuario_email']);
        $this -> db -> bind(':usuario_password', $data['usuario_password']);
        // Hacer la consulta execute
        try{
            $this -> db -> execute();
            return true;
        }catch(Exception $e){
            return false;
        }
    }

    public function listarUsuarios(){
        // Consulta
        $this -> db -> query('SELECT usuario_uid, usuario_nombre, usuario_email, b.descripcion FROM usuarios a LEFT JOIN tipo_usuario b ON a.id_tipo_usuario = b.id');

        # Ejecución
        $registros['usuarios'] = $this -> db -> multiple();

        return $registros;
    }


    public function encontrarUsuarioPorEmailOUsuario($usuario_uid, $usuario_email){
        // Consulta
        $this -> db -> query('SELECT usuario_uid FROM usuarios WHERE usuario_uid = :usuario_uid OR usuario_email = :usuario_email');
        // Vinculación
        $this -> db -> bind(':usuario_uid', $usuario_uid);
        $this -> db -> bind(':usuario_email', $usuario_email);
        // Ejecución
        $this -> db -> unico();

        return ($this -> db -> conteoReg() > 0);
    }
}