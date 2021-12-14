<?php

// Migrar a JSON

header('Content-Type:application/json');
header('Content-Disposition: attachment; filename = clientes.json');

echo $contenido = json_encode($data['clientes']);

// Generar archivo
file_put_contents(APPROOT . '/files/clientes_' . time() . '.json', $contenido);