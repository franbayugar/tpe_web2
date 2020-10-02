<!-- formulario de alta de tarea -->
<section class="container">
<form action="insertar" method="POST" class="my-4">
    <div class="row">
        <div class="col-9">
            <div class="form-group">
                <label>Destino</label>
                <input name="destino" type="text" class="form-control" required>
            </div>
        </div>

        <div class="col-3">
            <div class="form-group">
                <label>Paquete</label>
                <select name="transporte" class="form-control" required>
                {foreach from=$category item=package}
                    <option value="{$package->id}">{$package->paquete}</option>
                {/foreach}
                </select>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label>Descripcion</label>
        <textarea name="descripcion" class="form-control" rows="3" required></textarea>
    </div>

    <div class="form-group">
        <label>Precio</label>
        <input type="number" name="precio" class="form-control" rows="2" required></input>
    </div>

    <div class="form-group">
        <label>Fecha de salida:</label>
        <input type="date" name="fecha" class="form-control" rows="2" required></input>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
</section>