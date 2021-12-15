
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escaner</title>
    <script src="<?= URLROOT; ?>/js/tailwindcss.min.js"></script>
    <link rel="shortcut icon" type="image/svg" href="<?= URLROOT; ?>/favicon.svg"/>
</head>
<body>
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
</body>
</html>