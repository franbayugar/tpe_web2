    <!DOCTYPE html>
<html lang="en">
<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viajes</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<!-- NAVBAR -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="inicio">
                <h1>Viajes</h1>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toogle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="inicio">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="nosotros">Nosotros</a></li>

            {if isset($smarty.session.username)}
                {if $smarty.session.permission eq 1}
                <li class="nav-item"><a class="nav-link" href="administrador">Administrador</a></li>
                {/if}
                <li class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {$smarty.session.username}  </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="logout">Logout</a>
                    </div>
                </li>
                {else}
                    <li class="nav-item"><a class="nav-link" href="login">Acceder</a></li>
                                    {/if}
            </div>
        </div>
    </nav>
<main>