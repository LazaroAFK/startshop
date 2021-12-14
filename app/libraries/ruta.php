<?php
// Identificación

// URL amigable, mapear las url (Direcciones)
class ruta{
    protected $controladorActual = 'home';
    protected $metodoActual = 'index';
    protected $parametros = [];

    // Automatica
    public function __construct(){
        $url = $this -> getURL(); // Recibir un arreglo
        echo "<script>console.log('".json_encode($url)."')</script>";

        if(file_exists(APPROOT . '/controllers/' . ucwords($url[0]) . '.php')){
            $this -> controladorActual = ucwords($url[0]);
        }

        // Cargar el controlador, crear una instancia del controlador (Clase)
        include_once(APPROOT . '/controllers/' . $this -> controladorActual . '.php');

        $this -> controladorActual = new $this -> controladorActual;
        
        // Limpiar memoria
        unset($url[0]);
        echo "<script>console.log('".json_encode($url)."')</script>";

        // Validar el método, debe existir un método index en cada controlador
        if(isset($url[1])){
            if(method_exists($this -> controladorActual, $url[1])){
                $this -> metodoActual = $url[1];
            }
            // Limpiar memoria
            unset($url[0]);
        }
        echo "<script>console.log('".json_encode($url)."')</script>";

        // Parámetros
        $this -> parametros = $url ? array_values($url) : [];

        // Ya tenemos el controlador, método, parámetros, ejecutar la llamada en la URL
        call_user_func_array([$this -> controladorActual, $this -> metodoActual], $this -> parametros);
    } // Fin de construct
    
    public function getUrl(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url); // Arreglo con url
            return $url;
        } // Fin de isset $_GET
    } // Fin de método getUrl

} // Fin de  clase