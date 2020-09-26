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
    <div class="row pt-5">
        <h3 class="text-center pb-5 pt-5 h1">Aprovechá nuestras promociones</h3>
    </div>
    <div class="row">
    {foreach from=$destination item=place}
            <div class="col-sm">
                    <div class="travel-card card w-100 card-border mb-5">
                        <img src="img/card01.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3>{$place->destino}</h3> 
                            <p class='card-text'>{$place->descripcion}</p>
                            <p class='card-text'>Precio: ${$place->precio}</p>
                            <p class='card-text'>Salida: {$place->fecha}</p>
                            <a class='btn btn-danger btn-sm' href='showMore/{$place->id}'>Ver detalles</a>
                        </div>
                    </div>
                </div>
        {/foreach}
    </div>
    </div>
</section>
{include 'footer.tpl'}


</body>

</html>