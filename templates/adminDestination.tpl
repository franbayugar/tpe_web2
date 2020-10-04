{include 'header.tpl'}
<section class="container-destination">
{include 'form_alta.tpl'}
<section class="section-table">
    <table class="table table-striped table-dark">
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
                    <td><a class='btn-edit btn btn-warning btn-sm' id='{$place->id_destino}'>Editar</a>
                    <a class='btn btn-danger btn-sm' href='eliminar/{$place->id_destino}'>Eliminar</a></td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</section>
<aside class="d-flex justify-content-center p-5">
<a type="button" href="administrador" class="btn-admin btn btn-lg btn-primary pl-4 pr-4">Volver</a>
</aside>
</section>

<script src="admin.js"></script>
{include 'footer.tpl'}
