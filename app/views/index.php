<?php
include_once(APPROOT . '/views/includes/header.inc.php');
?>

<main class="container flex-shrink-0 pt-5 mt-5">
  <div class="bg-light p-5 rounded">
    <h1><?= $data['bienvenida'] ?></h1>
    <p class="lead">This example is a quick exercise to illustrate how fixed to top navbar works. As you scroll, it will remain fixed to the top of your browser’s viewport.</p>
    <a class="btn btn-lg btn-primary" href="/docs/5.1/components/navbar/" role="button">View navbar docs »</a>
  </div>
</main>

<?php
include_once(APPROOT . '/views/includes/footer.inc.php');
?>