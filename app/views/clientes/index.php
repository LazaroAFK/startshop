<?php

if(!estaLogueado()){
  redirigir('/usuarios/login');
}

include_once(APPROOT . '/views/includes/header.inc.php');
?>
<section class="w-100 flex-shirk-0 overflow-auto">
  <main class="container pt-5 my-5">
    <div class="bg-light p-5 rounded">
      <h1>Clientes</h1>
      <a href="<?= URLROOT; ?>/clientes/agregar" class="btn btn-primary">Agregar</a>
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
          <th scope="col">Opciones</th>
        </tr>
      </thead>
      <tbody id="clientes">
        <?php foreach($data['clientes'] as $registro){ ?>
        <tr>
          <th scope="row"><?= $registro -> id ?></th>
          <td><?= $registro -> cliente_rfc ?></td>
          <td><?= $registro -> cliente_nombre ?></td>
          <td><?= $registro -> cliente_direccion ?></td>
          <td><?= $registro -> cliente_telefono ?></td>
          <td><?= $registro -> cliente_email ?></td>
          <td><img src="data:image/png;base64,<?= base64_encode($registro -> cliente_fotografia) ?>" width="30" height="30"></td>
          <td>
            <a href="<?= URLROOT; ?>/clientes/editar/<?= $registro -> id ?>" class="btn btn-primary">Editar</a>
            <a href="<?= URLROOT; ?>/clientes/eliminar/<?= $registro -> id ?>" class="btn btn-danger">Eliminar</a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
    <ul class="pagination">
      <li class="page-item <?= ($data['pagina'] < 2) ? 'disabled' : '' ?>">
        <a class="page-link" href="<?= ($data['pagina'] < 2) ? '#' : URLROOT . '/clientes/' . $data['limite'] . '/' . $data['pagina_previa'] ?>">&laquo;</a>
      </li>
      <?php for($i = 1; $i <= $data['paginas']; $i++){ ?>
      <li class="page-item <?= ($data['pagina'] == $i) ? 'active' : '' ?>">
        <a class="page-link" href="<?= URLROOT . '/clientes/' . $data['limite'] . '/' . $i ?>">
          <?= $i ?>
        </a>
      </li>
      <?php } ?>
      <li class="page-item <?= ($data['pagina'] >= $data['paginas']) ? 'disabled' : '' ?>">
        <a class="page-link" href="<?= ($data['pagina'] >= $data['paginas']) ? '#' : URLROOT . '/clientes/' . $data['limite'] . '/' . $data['pagina_siguiente'] ?>">&raquo;</a>
      </li>
    </ul>
    </div>
  </main>
</section>

<?php
include_once(APPROOT . '/views/includes/footer.inc.php');
?>