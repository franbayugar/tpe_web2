<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-26 20:50:22
  from 'C:\xampp\htdocs\proyects\web 2\tpe\templates\destinationList.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f6f8d6e2a3253_85639735',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '688bdada72bc901c82b849fc3c370ac2e9c6d6b6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyects\\web 2\\tpe\\templates\\destinationList.tpl',
      1 => 1601146219,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:carousel.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5f6f8d6e2a3253_85639735 (Smarty_Internal_Template $_smarty_tpl) {
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
$_smarty_tpl->_subTemplateRender('file:carousel.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <section class="container-md p-5">
        <div class="row pt-5">
            <h3 class="text-center pb-5 pt-5 h1">Aprovechá nuestras promociones</h3>
        </div>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['destination']->value, 'place');
$_smarty_tpl->tpl_vars['place']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['place']->value) {
$_smarty_tpl->tpl_vars['place']->do_else = false;
?>
            <div class="row">
            <div class="col-sm">
                <div class="travel-card card w-100 card-border mb-5">
                <img src="img/card01.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                  <h3><?php echo $_smarty_tpl->tpl_vars['place']->value->destino;?>
</h3> 
                  <p class='card-text'><?php echo $_smarty_tpl->tpl_vars['place']->value->descripcion;?>
</p>
                  <p class='card-text'>Precio: $<?php echo $_smarty_tpl->tpl_vars['place']->value->precio;?>
</p>
                  <p class='card-text'>Salida: <?php echo $_smarty_tpl->tpl_vars['place']->value->fecha;?>
</p>
                  <a class='btn btn-danger btn-sm' href='showMore/<?php echo $_smarty_tpl->tpl_vars['place']->value->id;?>
'>Ver detalles</a>
                  </div>
                </div>
                </div>
  
                </div>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
    </section>
<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


</body>

</html><?php }
}
