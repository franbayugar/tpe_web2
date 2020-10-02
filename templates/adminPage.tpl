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
{include 'form_alta.tpl'}
<section class="section-table">
    <table class="table table-dark">
        <thead>
            <tr>
                <td>Destino</td>
                <td>Descripcion breve</td>
                <td>Precio</td>
                <td>Categoría</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            {foreach from=$destination item=place}
                <tr>
                    <td>{$place->destino}</td>
                    <td>{$place->descripcion_breve}</td>
                    <td>${$place->precio}</td>
                    <td>{$place->paquete}</td>
                    <td><a class='btn btn-warning btn-sm' href='editar/{$place->id_destino}'>Editar</a>
                    <a class='btn btn-danger btn-sm' href='eliminar/{$place->id_destino}'>Eliminar</a></td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</section>
{include 'footer.tpl'}

</body>
</html>