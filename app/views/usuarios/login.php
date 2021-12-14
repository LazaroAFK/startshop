<?php
include_once(APPROOT . '/views/includes/header.inc.php');
?>

<main class="m-auto form-signin" style="width: 350px;">

    <form action="<?= URLROOT ?>/usuarios/login" method="POST">
        <h1 class="h3 mb-3 fw-normal">Iniciar Sessión</h1>

        <div class="form-floating  mb-3">
            <input type="text" class="form-control" name="usuario_uid" placeholder="nombre@ejemplo.com">
            <label for="usuario_uid">ID de Usuario</label>
        </div>

        <div class="form-floating  mb-3">
            <input type="password" class="form-control" name="usuario_password" placeholder="Contraseña">
            <label for="usuario_password">Contraseña</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Iniciar</button>
    </form>

    <?php if(isset($data['msg_error']) && !empty($data['msg_error'])){ ?>
        <div class="mt-3 alert alert-warning"><?= $data['msg_error'] ?></div>
    <?php } ?>
</main>

<?php
include_once(APPROOT . '/views/includes/footer.inc.php');
?>