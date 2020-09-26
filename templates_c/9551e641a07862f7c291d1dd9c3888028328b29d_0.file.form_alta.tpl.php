<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-27 00:37:07
  from 'C:\xampp\htdocs\proyects\web 2\tpe\templates\form_alta.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f6fc293b816a9_11037727',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9551e641a07862f7c291d1dd9c3888028328b29d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyects\\web 2\\tpe\\templates\\form_alta.tpl',
      1 => 1601159611,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f6fc293b816a9_11037727 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- formulario de alta de tarea -->
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
</section><?php }
}
