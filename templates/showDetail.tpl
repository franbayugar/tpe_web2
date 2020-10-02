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
            <div class="col-sm-4">
                    <div class="travel-card card w-100 card-border mb-5">
                        <img src="img/card01.jpg" class="card-img-top" alt="...">
                        <div class='product card-text'>
                        <p>{$destination->aliaspaquete}</p>
                        </div>
                        <div class="card-body">
                            <h3>{$destination->destino}</h3> 
                            <p class='card-text'>{$destination->descripcion}</p>
                            <p class='card-text'>Precio: ${$destination->precio}</p>
                        </div>
                    </div>
                </div>
    </div>
</section>

{include 'footer.tpl'}
<script src="main.js"></script>

</body>

</html>