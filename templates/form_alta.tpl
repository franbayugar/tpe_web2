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
                <label>Transporte</label>
                <select name="transporte" class="form-control" required>
                    <option value="1">Avión</option>
                    <option value="2">Colectivo</option>
                    <option value="3">Tren</option>
                    <option value="4">Combi</option>
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