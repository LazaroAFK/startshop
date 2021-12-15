<?php

// Iniciar la sesión
session_start();

function estaLogueado(){
    return isset($_SESSION['usuario_id']) ? true : false;
}

function console($data){
    echo "<script>console.log('" . json_encode($data) . "')</script>";
}

// Redireccionar a Controlador/Metodo
function redirigir($locacion){
    header('Location:' . $locacion);
}