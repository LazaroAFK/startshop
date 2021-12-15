<?php

// Migrar a CSV

header('Content-Type:application/csv');
header('Content-Disposition: attachment; filename = clientes.csv');

echo $contenido = 'ID,R.F.C.,NOMBRE,DIRECCION,TELEFONO,CORREO,FOTOGRAFIA' . "\n";

/*foreach($data['clientes'] as $registro){
    echo $contenido .= $registro -> id . ',' . 
        $registro -> cliente_rfc . ',' . 
        $registro -> cliente_nombre . ',"' . 
        $registro -> cliente_direccion . '",' . 
        $registro -> cliente_telefono . ',' . 
        $registro -> cliente_email . ',' . 
        base64_encode($registro -> cliente_fotografia) . "\n";
}*/

function agregarComas($elemento){
    return '"' . $elemento . '",';
}

function agregarSaltos($elemento){
    return agregarComas(array_map($elemento)) . "\n";
}

echo agregarSaltos($data['clientes']);

// Forma resumida de usar fopen(), fwrite() y fclose()
// file_put_contents(APPROOT . '/files/clientes_' . time() . '.csv', $contenido);