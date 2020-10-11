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
    <div class="row">
    <div>
        <h1 class="display-3">{$destination->destino}</h1>
    </div>      
          <hr class="my-4">
    <div class="col-sm-12">
    <p class="font-weight-bold">{$destination->aliaspaquete}</p>
    <p class="font-italic">{$destination->descripcion}</p>
        <div class="text-center">
    <a type="button" href="inicio" class="btn-admin btn btn-md btn-primary">Volver</a>
        </div>      

    </div>
    </div>
</section>
{include 'footer.tpl'}
</body>
</html>