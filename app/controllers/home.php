<?php

// Carga inicial
class home extends controller{
    public function __construct()
    {
        // TODO
    }

    public function index($nula = '')
    {
        $data = [
            'bienvenida' => $nula
        ];
        $this -> view('index', $data);
    }
}