{if $destination}
<aside class="modal-result d-flex justify-content-center align-items-center">
    <div class="card-modal bg-white p-5 rounded-left rounded-right">
        <h3>Modificar destino</h3>
        <form action="editar/destino" method="POST" class="my-4">
        <div class="row">
            <div class="col-9">
                <div class="form-group">
                    <input type="hidden" name="id" value={$destination->id_destino}>
                    <label>Destino</label>
                    <input name="place" type="text" class="form-control" value='{$destination->destino}' required>
                </div>
            </div>

            <div class="col-3">
                <div class="form-group">
                    <label>Paquete</label>
                    <select name="category" class="form-control"  required>
                     {foreach from=$category item=package}
                            <option value="{$package->id}"
                                {if {$package->id} == {$destination->id_categoria}} 
                                    {"selected"}
                                {/if}>{$package->paquete}</option>
                                {/foreach}
                    </select>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label>Descripcion breve</label>
            <textarea name="shortdescription" class="form-control" rows="2" maxlength='110' required>{$destination->descripcion_breve}</textarea>
        </div>

        <div class="form-group">
            <label>Descripcion</label>
            <textarea name="description" class="form-control" rows="3" maxlength='640' required>{$destination->descripcion}</textarea>
        </div>

        <div class="form-group">
            <label>Precio</label>
            <input type="number" name="value" class="form-control" rows="2" value={$destination->precio} required>
        </div>

        <button type="submit" class="btn-success btn btn-primary">Guardar</button>
        <button id="btn-back" class="btn-back btn btn-primary">Volver</button>
    </form>
    </div> 
</aside>

{else}
<aside class="modal-result d-flex justify-content-center align-items-center">
    <div class="card-modal bg-white p-5 rounded-left rounded-right">
        <h3>Modificar categoría</h3>
        <form action="editar/categoria" method="POST" class="my-4">
        <div class="row">
            <div class="col-6">
                <input type="hidden" name="id" value={$category->id}>
                <div class="form-group">
                    <label>Nombre del paquete</label>
                    <input name="package" type="text" class="form-control" value={$category->paquete} required>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label>Alias paquete</label>
                    <input type="text" name="aliaspackage" class="alias-category form-control" value={$category->aliaspaquete} required>
                    </select>
                </div>
            </div>
        </div>

        <button type="submit" class="btn-success btn btn-primary">Guardar</button>
        <button id="btn-back" class="btn-back btn btn-primary">Volver</button>
    </form>
    </div> 
</aside>


{/if}
