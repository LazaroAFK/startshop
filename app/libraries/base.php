<?php

class base{
    // Datos de conexión, acciones CRUD
    private $motor = DBMOTOR; // Tipo de manejador de base de datos
    private $server = DBSERVER; // localhost
    private $basedatos = DBNAME; // Nombre de la base de datos pw20213v
    private $usuario = DBUSUARIO;
    private $password = DBPASSWORD;

    // Seguridad ($_ENV variacles de ambiente)
    // variavles de operación para coneción y manejo de consultas (PDO)

    private $dbh; // database hamdler
    private $stmt; // statement
    private $error;

    // Conexión
    public function __construct(){
        $dsn = $this -> motor . ':host=' . $this -> server . ';dbname=' . $this -> basedatos;

        $opciones = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try{
            $this -> dbh = new PDO($dsn, $this -> usuario, $this -> password, $opciones);
        }catch(PDOException $e){
            $this -> error = 'Error:' . $e -> getMessage();
        }
    } // Método construct

    // Acciones CRUD

    // Lenguaje SQL
    // SELECT campo1 FROM tabla1 WHERE id = :id
    // UPDATE
    // DELETE
    // INSERT INTO
    // 
    // SEGURIDAD (inyección sql)

    // Habilitar la consulta
    public function query($sql){
        $this -> stmt = $this -> dbh -> prepare($sql);
    }
    // ':id', 20, PDO::PARAM:INT

    // Preparación para la vinculación
    public function bind($parametro, $valor, $tipo = null){
        // Valoracion tipo
        switch(is_null($tipo)){
            case is_int($valor):
                $tipo = PDO::PARAM_INT;
                break;
            case is_bool($valor):
                $tipo = PDO::PARAM_BOOL;
                break;
            case is_null($valor):
                $tipo = PDO::PARAM_NULL;
                break;
            default:
                $tipo = PDO::PARAM_STR;
        } // Fin switch

        $this -> stmt -> bindValue($parametro, $valor, $tipo);
    }

    // Ejecutar la consulta
    public function execute(){
        $this -> stmt -> execute();
    }

    // Cuando espere un registro unico
    public function unico(){
        $this -> execute();
        return $this -> stmt -> fetch(PDO::FETCH_OBJ);
    }

    // Cuando espere multiples registros
    public function multiple(){
        $this -> execute();
        return $this -> stmt -> fetchAll(PDO::FETCH_OBJ);
    }

    // Validar cuando se ejecuto la consulta, sin regresar valores, pero sin error
    public function conteoReg(){
        return $this -> stmt -> rowCount();
    }

} // Fin de clase