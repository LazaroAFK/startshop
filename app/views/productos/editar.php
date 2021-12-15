<?php
include_once(APPROOT . '/views/includes/header.inc.php');
?>

<main class="m-auto form-signin" style="width: 500px;">

    <form action="<?= URLROOT ?>/clientes/editar/<?= isset($data['id']) ? $data['id'] : 0 ?>" method="POST" enctype="x-www-form-urlencoded">
        <h1 class="h3 mb-3 fw-normal">Editar</h1>

        <input type="hidden" name="id" value="<?= isset($data['id']) ? $data['id'] : 0 ?>">

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="cliente_rfc" placeholder="nombre@ejemplo.com"
            value="<?= isset($data['cliente_rfc']) ? $data['cliente_rfc'] : 0 ?>">
            <label for="cliente_rfc" >R.F.C.</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="cliente_nombre" placeholder="nombre@ejemplo.com"
            value="<?= isset($data['cliente_nombre']) ? $data['cliente_nombre'] : 0 ?>">
            <label for="cliente_nombre">Nombre</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="cliente_email" placeholder="nombre@ejemplo.com"
            value="<?= isset($data['cliente_email']) ? $data['cliente_email'] : 0 ?>">
            <label for="cliente_email">Correo Electrónico</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="cliente_direccion" placeholder="Contraseña"
            value="<?= isset($data['cliente_direccion']) ? $data['cliente_direccion'] : 0 ?>">
            <label for="cliente_direccion">Dirección</label>
        </div>

        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="cliente_telefono" placeholder="Contraseña"
            value="<?= isset($data['cliente_telefono']) ? $data['cliente_telefono'] : 0 ?>">
            <label for="cliente_telefono">Teléfono</label>
        </div>

        <div class="form-group mb-3">
            <label for="cliente_fotografia" class="form-label">Fotografía</label>
            <input type="file" class="form-control" name="cliente_fotografia" placeholder="Contraseña">
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Actualizar</button>
    </form>

    <?php if(isset($data['msg_error']) && !empty($data['msg_error'])){ ?>
        <div class="mt-3 alert alert-warning"><?= $data['msg_error'] ?></div>
    <?php } ?>
</main>

<?php
include_once(APPROOT . '/views/includes/footer.inc.php');
?>