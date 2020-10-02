<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-02 19:10:45
  from 'C:\xampp\htdocs\proyects\web 2\tp_especial\tpe_web2\templates\adminPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f775f1561ab89_38417409',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1b06526f32939658eb1aa8a1e3adadbcc65f1efe' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyects\\web 2\\tp_especial\\tpe_web2\\templates\\adminPage.tpl',
      1 => 1601658526,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:form_alta.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5f775f1561ab89_38417409 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?php echo BASE_URL;?>
">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Viajes</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<?php $_smarty_tpl->_subTemplateRender('file:header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
$_smarty_tpl->_subTemplateRender('file:form_alta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<section class="section-table">
    <table class="table table-dark">
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
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['destination']->value, 'place');
$_smarty_tpl->tpl_vars['place']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['place']->value) {
$_smarty_tpl->tpl_vars['place']->do_else = false;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['place']->value->destino;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['place']->value->descripcion_breve;?>
</td>
                    <td>$<?php echo $_smarty_tpl->tpl_vars['place']->value->precio;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['place']->value->paquete;?>
</td>
                    <td><a class='btn btn-warning btn-sm' href='editar/<?php echo $_smarty_tpl->tpl_vars['place']->value->id_destino;?>
'>Editar</a>
                    <a class='btn btn-danger btn-sm' href='eliminar/<?php echo $_smarty_tpl->tpl_vars['place']->value->id_destino;?>
'>Eliminar</a></td>
                </tr>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>
</section>
<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html><?php }
}
