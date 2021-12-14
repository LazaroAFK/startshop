<?php

// Iniciar la sesión
session_start();

function estaLogueado(){
    return isset($_SESSION['usuario_id']) ? true : false;
}

// Redireccionar a Controlador/Metodo
function redirigir($locacion){
    header('Location:' . $locacion);
}