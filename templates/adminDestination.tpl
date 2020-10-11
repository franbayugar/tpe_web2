{include 'header.tpl'}
<section class="container-destination">
    <div class="m-5">
        <h1 class="display-4">Administrador de destinos</h1>
    </div>      
    <hr class="my-4">
<section class="container">
        <h4>Agregue un nuevo destino:</h4>
<form action="insertar/destino" method="POST" class="my-4">
    <div class="row">
        <div class="col-8">
            <div class="form-group">
                <label>Destino</label>
                <input name="place" type="text" class="form-control" required>
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                <label>Paquete</label>
                <select name="category" class="form-control" required>
                {foreach from=$category item=package}
                    <option value="{$package->id}">{$package->paquete}</option>
                {/foreach}
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label>Descripcion breve</label>
        <textarea name="shortdescription" class="form-control" rows="2" maxlength='110' required></textarea>
    </div>

    <div class="form-group">
        <label>Descripcion</label>
        <textarea name="description" class="form-control" rows="3" maxlength='640' required></textarea>
    </div>

    <div class="form-group">
        <label>Precio</label>
        <input type="number" name="value" class="form-control" rows="2" required>
    </div>

    <button type="submit" class="btn btn-success">Agregar</button>
</form>
</section>
  <hr class="my-4">
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
                    <a class='btn btn-danger btn-sm' href='eliminar/destino/{$place->id_destino}'>Eliminar</a></td>
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
<script src="js/adminDestination.js"></script>
</body>
</html>