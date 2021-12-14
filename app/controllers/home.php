<?php

// Carga inicial
class home extends controller{
    public function __construct()
    {
        // TODO
    }

    public function index()
    {
        $data = [
            'bienvenida' => 'Bienvenido/a'
        ];
        $this -> view('index', $data);
    }
}