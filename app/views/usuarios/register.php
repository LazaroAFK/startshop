<?php
include_once(APPROOT . '/views/includes/header.inc.php');
?>

<main class="m-auto form-signin" style="width: 350px;">

    <form action="<?= URLROOT ?>/usuarios/register" method="POST">
        <h1 class="h3 mb-3 fw-normal">Registro</h1>

        <div class="form-floating  mb-3">
            <input type="text" class="form-control" name="usuario_uid" placeholder="nombre@ejemplo.com">
            <label for="usuario_uid">ID de Usuario</label>
        </div>

        <div class="form-floating  mb-3">
            <input type="text" class="form-control" name="usuario_nombre" placeholder="nombre@ejemplo.com">
            <label for="usuario_nombre">Nombre</label>
        </div>

        <div class="form-floating  mb-3">
            <input type="text" class="form-control" name="usuario_email" placeholder="nombre@ejemplo.com">
            <label for="usuario_email">Correo Electrónico</label>
        </div>

        <div class="form-floating  mb-3">
            <input type="password" class="form-control" name="usuario_password" placeholder="Contraseña">
            <label for="usuario_password">Contraseña</label>
        </div>

        <div class="form-floating  mb-3">
            <input type="password" class="form-control" name="confirmacion_password" placeholder="Contraseña">
            <label for="confirmacion_password">Confirmar Contraseña</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Registar</button>
    </form>

    <?php if(isset($data['msg_error']) && !empty($data['msg_error'])){ ?>
        <div class="mt-3 alert alert-warning"><?= $data['msg_error'] ?></div>
    <?php } ?>
</main>

<?php
include_once(APPROOT . '/views/includes/footer.inc.php');
?>