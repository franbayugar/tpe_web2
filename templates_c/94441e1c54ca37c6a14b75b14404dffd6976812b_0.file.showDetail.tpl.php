<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-01 17:51:49
  from 'C:\xampp\htdocs\proyects\web 2\tp_especial\tpe_web2\templates\showDetail.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f75fb15f24912_88034587',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '94441e1c54ca37c6a14b75b14404dffd6976812b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyects\\web 2\\tp_especial\\tpe_web2\\templates\\showDetail.tpl',
      1 => 1601567152,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5f75fb15f24912_88034587 (Smarty_Internal_Template $_smarty_tpl) {
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
?>
<section class="container-md p-5">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['destination']->value, 'place');
$_smarty_tpl->tpl_vars['place']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['place']->value) {
$_smarty_tpl->tpl_vars['place']->do_else = false;
?>
    <?php if ($_smarty_tpl->tpl_vars['itemId']->value == $_smarty_tpl->tpl_vars['place']->value->id_destino) {?>
            <div class="col-sm-4">
                    <div class="travel-card card w-100 card-border mb-5">
                        <img src="img/card01.jpg" class="card-img-top" alt="...">
                        <div class='product card-text'>
                        <p><?php echo $_smarty_tpl->tpl_vars['place']->value->aliashome;?>
</p>
                        </div>
                        <div class="card-body">
                            <h3><?php echo $_smarty_tpl->tpl_vars['place']->value->destino;?>
</h3> 
                            <p class='card-text'><?php echo $_smarty_tpl->tpl_vars['place']->value->descripcion;?>
</p>
                            <p class='card-text'>Precio: $<?php echo $_smarty_tpl->tpl_vars['place']->value->precio;?>
</p>
                            <a class='btn btn-danger btn-sm' href='ver-detalle/<?php echo $_smarty_tpl->tpl_vars['place']->value->id;?>
'>Ver detalles</a>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
              <p>Algo no anda bien</p>
                          <?php }?>

        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
</section>
<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
echo '<script'; ?>
 src="main.js"><?php echo '</script'; ?>
>

</body>

</html><?php }
}
