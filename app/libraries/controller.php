<?php

// Administración de controladores, todos usaran enlace a views y/o a models
class controller{
    public function __construct(){
        // TODO
    }

    public function view($view, $data = []){
        if(file_exists(APPROOT . '/views/' . $view . '.php')){
            require_once(APPROOT . '/views/' . $view . '.php');
        }else{
            die('Vista no existe');
        }
    }


    public function model($model){
        require_once(APPROOT . '/models/' . $model . '.php');
        return new $model();
    }
}