<?php

# Trabajar con fopen(), fwrite() y fclose()
$xml = fopen(APPROOT . '/files/clientes_' . time() . '.xml', 'w+');
fwrite($xml, '<?xml version="1.0" encoding="UTF-8 ?>');
fwrite($xml, '<clientes>');
foreach($data['clientes'] as $registro){
    fwrite($xml, '<cliente><id>' . $registro -> id . '</id><rfc>' . 
        $registro -> cliente_rfc . '</rfc><nombre>' . 
        $registro -> cliente_nombre . '</nombre><direccion>' . 
        $registro -> cliente_direccion . '</direccion><telefono>' . 
        $registro -> cliente_telefono . '</telefono><correo>' . 
        $registro -> cliente_email . '</correo><fotografia>' . 
        base64_encode($registro -> cliente_fotografia) . '</fotografia></cliente>');
}
fwrite($xml, '</clientes>');
fclose($xml);