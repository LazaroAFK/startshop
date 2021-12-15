<?php

// Uso de dompdf, forma simple

$html = '<head><link rel="stylesheet" href="' . URLROOT . '/css/bootstrap.min.css"></head>
<table class="table table-hover">
<thead>
  <tr>
    <th scope="col">ID</th>
    <th scope="col">R.F.C.</th>
    <th scope="col">Nombre</th>
    <th scope="col">Dirección</th>
    <th scope="col">Teléfono</th>
    <th scope="col">Correo</th>
    <th scope="col">Fotografía</th>
  </tr>
</thead>
<tbody id="clientes">';
foreach($data['clientes'] as $registro){
    $html .=  '<tr>
                <th scope="row">' . $registro -> id . '</th>
                <td>' . $registro -> cliente_rfc . '</td>
                <td>' . $registro -> cliente_nombre . '</td>
                <td>' . $registro -> cliente_direccion . '</td>
                <td>' . $registro -> cliente_telefono . '</td>
                <td>' . $registro -> cliente_email . '</td>
                <td><img src="data:image/png;base64,' . base64_encode($registro -> cliente_fotografia) . '" width="30" height="30"></td>
               </tr>';
}
$html .= '</tbody></table>';

use Dompdf\Dompdf;

$pdf = new Dompdf();
// Carga
$pdf -> loadHtml($html);
// Modificar tamaño de la página
$pdf -> setPaper('legal', 'landscape');
// Conversión
$pdf -> render();
// Desplegar
$pdf -> stream('clientes.pdf');