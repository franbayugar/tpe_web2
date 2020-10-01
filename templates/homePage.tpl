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
{include 'header.tpl'}
{include 'carousel.tpl'}
<section class="container-md p-5">
    <div class="row pt-1">
        <h3 class="text-center pb-5 pt-5 h1">¿Estás buscando algo en específico?</h3>
    </div>
    <div class="row m-4 pb-4">
        {foreach from=$category item=type}
        <div class="col-sm-3">
            <a class="btn-filter btn btn-lg rounded-pill btn-warning w-100 p-2 m-1 shadow-sm font-weight-bold" id="{$type->id}">{$type->producto}</a>
        </div>
        {/foreach}
    </div>
    <div id="travel-container" class="row">
            <h4 class="text-center pb-5 pt-5 h1">Observá todos los paquetes que tenemos para vos:</h4>
    {foreach from=$destination item=place}
            <div class="col-sm-4">
                    <div class="travel-card card w-100 card-border mb-5">
                        <img src="img/card01.jpg" class="card-img-top" alt="...">
                        <div class='product card-text'>
                        <p>{$place->aliashome}</p>
                        </div>                        
                        <div class="card-body">
                            <h3>{$place->destino}</h3> 
                            <p class='card-text'>{$place->descripcion}</p>
                            <p class='card-text'>Precio: ${$place->precio}</p>
                            <a class='btn btn-danger btn-sm' href='verdetalle/{$place->id_destino}'>Ver detalles</a>
                        </div>
                    </div>
                </div>
        {/foreach}
    </div>
    </div>
</section>
{include 'footer.tpl'}
<script src="main.js"></script>

</body>

</html>