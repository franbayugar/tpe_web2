{include 'header.tpl'}
<section class="container-category">
<section class="container">
<form action="insertar" method="POST" class="my-4">
    <div class="row">
        <div class="col-6">
            <input type="hidden" name="idmanage" value='2'>
            <div class="form-group">
                <label>Nombre del paquete</label>
                <input name="package" type="text" class="form-control" required>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label>Alias paquete (en mayúscula)</label>
                <input type="text" name="aliaspackage" class="form-control" required>
                </select>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
</section>

<section class="section-table">
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <td>Paquete</td>
                <td>Alias para home</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            {foreach from=$category item=package}
                <tr>
                    <td>{$package->paquete}</td>
                    <td>{$package->aliaspaquete}</td>
                    <td><a class='btn-edit btn btn-warning btn-sm' id='{$package->id}'>Editar</a>
                    <a class='btn btn-danger btn-sm' href='eliminar/categoria/{$package->id}'>Eliminar</a></td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</section>
<aside class="d-flex justify-content-center p-5">
<a type="button" href="administrador" class="btn-admin btn btn-lg btn-primary pl-4 pr-4">Volver</a>
</aside>
</section>

{include 'footer.tpl'}
