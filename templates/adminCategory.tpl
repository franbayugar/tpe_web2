{include 'header.tpl'}
<section class="container-category">
    <div class="m-5">
        <h1 class="display-4">Administrador de categorías</h1>
    </div>
      <hr class="my-4">

<section class="container">
        <h4>Agregue una nueva categoría:</h4>
<form action="insertar/categoria" method="POST" class="my-4">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label>Nombre del paquete</label>
                <input name="package" type="text" class="form-control" required>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label>Alias paquete</label>
                <input type="text" name="aliaspackage" class="alias-category form-control" required>
                </select>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Agregar</button>
</form>
</section>
  <hr class="my-4">
<section class="section-table">
  {if $error}
                <div class="alert alert-danger">
                    {$error}
                </div>
                {/if}
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
<script src='js/adminCategory.js'></script>
</body>
</html>