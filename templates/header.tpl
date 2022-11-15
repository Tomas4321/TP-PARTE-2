<html>
<!DOCTYPE html>
    <html lang="en">
    <head>
    <base href="{$basehref}">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Volkswagen Oficial</title>
        <link rel="stylesheet" href="css/style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        </head>
<body class="bg-dark p-3 text-black bg-opacity-25 fst-italic">
<header class="fw-bolder">

<nav class="navbar navbar-expand-lg bg-light rounded-4 border border-dark">
<div class="container-fluid">
  <a class="navbar-brand" href="">Volkswagen Oficial</a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav d-flex">
      <li class="nav-item">
      {if isset($smarty.session.logged)}
        <a class="nav-link" aria-current="page" href="home">Inicio</a>
      </li>
      {/if}
      {if !isset($smarty.session.logged)}
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="login">Iniciar session</a>
        </li>
        {else}
        <li class="nav-item ml-auto">
          <a class="nav-link" aria-current="page" href="logout">Cerrar session</a>
        </li>
      {/if}
    </ul>
  </div>
</div>
</nav>


<h4>Oficinas centrales: Wolfsburgo, Alemania</h4>

<div class="d-grid gap-4 col-3 mx-auto">
  <h4 class="fs-6">Fundación: 28 de mayo de 1937, Berlín, Alemania</h4>
  <h5>Atención al cliente: +54 800-888-8338</h5>
</div>
</header>


{include file="footer.tpl"}