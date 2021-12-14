<?php
// Identificar
include_once('config.inc.php');
include_once(APPROOT . '/helpers/helpers.php');

// Auto cargar las librerias
// Dompdf
include_once(APPROOT . '/vendor/dompdf/autoload.inc.php');
// nusoap
include_once(APPROOT . '/vendor/nusoap/src/nusoap.php');

// Auto cargar las librerias
spl_autoload_register(function ($className){
    include_once(APPROOT . '/libraries/' . $className . '.php');
});