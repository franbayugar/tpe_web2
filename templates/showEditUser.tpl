<aside class="modal-result d-flex justify-content-center align-items-center">
    <div class="card-modal bg-white p-5 rounded-left rounded-right">
        <h3>Modificar permisos</h3>
        <form action="editarpermisos" method="POST" class="my-4">
        <div class="row">
            <div class="col-6">
                <input type="hidden" name="id" value={$user->id}>
                <div class="form-group">
                    <label>Usuario:</label>
                    <p class="form-control">{$user->username}</p>
                    <label>Mail:</label>
                    <p class="form-control">{$user->email}</p>
                </div>
            </div>

            <div class="col-6">
                <div class="form-group">
                    <label>Seleccione la opción desada:</label>
                    <select class="form-control" name="permission">
                    <option value="1" 
                    {if $user->permission eq 1}
                     {"selected"}
                     {/if}>Administrador</option>
                    <option value="0" 
                    {if $user->permission neq 1}
                     {"selected"}
                     {/if}>Usuario sin permisos</option>
                    </select>
                </div>
                        <button type="submit" class="btn-success btn btn-primary">Guardar</button>
        <button id="btn-back" class="btn-back btn btn-primary">Volver</button>
            </div>
        </div>
    </form>
    </div> 
</aside>