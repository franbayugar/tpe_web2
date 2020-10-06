<aside class="modal-result d-flex justify-content-center align-items-center">
    <div class="card-modal bg-white p-5 rounded-left rounded-right">
        <h3>Modificar categoría</h3>
        <form action="editar/categoria" method="POST" class="my-4">
        <div class="row">
            <div class="col-6">
                <input type="hidden" name="id" value={$category->id}>
                <div class="form-group">
                    <label>Nombre del paquete</label>
                    <input name="package" type="text" class="form-control" value={$category->paquete}>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label>Alias paquete (en mayúscula)</label>
                    <input type="text" name="aliaspackage" class="form-control" value={$category->aliaspaquete}>
                    </select>
                </div>
            </div>
        </div>

        <button type="submit" class="btn-success btn btn-primary">Guardar</button>
        <button id="btn-back" class="btn-back btn btn-primary">Volver</button>
    </form>
    </div> 
</aside>
