<!DOCTYPE html>
<html lang="es" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= TITLE; ?></title>
    <link rel="stylesheet" href="<?= URLROOT; ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= URLROOT; ?>/css/all.min.css">
</head>
<body class="d-flex flex-column h-100 justify-content-center">
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><?= TITLE; ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?= URLROOT; ?>/">Inicio</a>
            </li>
            <?php if(estaLogueado()){ ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= URLROOT; ?>/clientes">Clientes</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Reportes
                </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="<?= URLROOT; ?>/clientes/reporte">Clientes</a></li>
                <li><a class="dropdown-item" href="<?= URLROOT; ?>/usuarios/reporte">Usuarios</a></li>
              </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Migración
                </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li><a class="dropdown-item" href="<?= URLROOT; ?>/clientes/csv">Clientes a CSV</a></li>
                <li><a class="dropdown-item" href="<?= URLROOT; ?>/clientes/json">Clientes a JSON</a></li>
                <li><a class="dropdown-item" href="<?= URLROOT; ?>/clientes/xml">Clientes a XML</a></li>
              </ul>
            </li>
            <?php } ?>
          </ul>
          <!--form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form-->
          <ul class="navbar-nav mb-2 mb-md-0">
          <?php if(estaLogueado()){ ?>
          <li class="nav-item">
            <a class="nav-link" href="#"><?= $_SESSION['usuario_nombre'] ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= URLROOT; ?>/usuarios/logout">Logout</a>
          </li>
          <?php }else{ ?>
            <li class="nav-item">
            <a class="nav-link" href="<?= URLROOT; ?>/usuarios/login">Login</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= URLROOT; ?>/usuarios/register">Register</a>
          </li>
          <?php } ?>
          </ul>
        </div>
      </div>
    </nav>