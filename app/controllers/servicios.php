<?php

class servicios extends controller{

    public function __construct(){
        $this -> clienteModel = $this -> model('cliente');
    }

    // Crear servicios web
    public function index($id){
        // TODO
    }

    // Método server
    public function server(){
        // Incluir la libreria
        // Crear una instancia del servidor
        $server = new soap_server();
        $serverName = 'Servicio Web para consulta de clientes';
        $serverNamespace = URLROOT . '/servicios/server';

        // Inicializar el soporte para WSDL, identificación
        $server -> configureWSDL($serverName, $serverNamespace);

        // Registro de la estructura de WSDL
        // Parámetros de entrada, estructura compleja

        // Parámetros de dalida, estructura compleja
        $server -> wsdl -> addComplexType(
            'DatosCliente',
            'complexType',
            'struct',
            'all',
            '',
            [
                'nombre' => ['name' => 'nombre', 'type' => 'xsd:string'],
                'direccion' => ['name' => 'direccion', 'type' => 'xsd:string'],
                'correo' => ['name' => 'correo', 'type' => 'xsd:string']
            ]
        );

        // Registrar método de consulta de el servicio
        $server -> register(
            'Cliente -> buscarClienteSOAP', // Nombre del metodo
            ['id' => 'xsd:int'], // Entrada
            ['return' => 'tns:DatosCliente'], // Salida
            'urn:' . $serverNamespace, // Namespace
            'urn:' . $serverNamespace . '#buscarCliente', // soapaction
            'rpc', // style
            'encoded', // use
            'Consulta de datos de Clientes'
        );

        // Definir el métofo

        // Invocar el servicio
        $server -> service(file_get_contents("php://input"));




    }
}

// Método index