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
<section class="container-md p-5">
    {foreach from=$destination item=place}
    {if $itemId eq $place->id_destino}
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
                            <a class='btn btn-danger btn-sm' href='ver-detalle/{$place->id}'>Ver detalles</a>
                        </div>
                    </div>
                </div>
            {else}
              <p>Algo no anda bien</p>
                          {/if}

        {/foreach}
    </div>
</section>
{include 'footer.tpl'}
<script src="main.js"></script>

</body>

</html>