<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-02 02:57:10
  from 'C:\xampp\htdocs\proyects\web 2\tp_especial\tpe_web2\templates\homePage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f767ae6e2f633_04199383',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0823e41f57e79490d9915a5c29a2829345013d86' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyects\\web 2\\tp_especial\\tpe_web2\\templates\\homePage.tpl',
      1 => 1601600228,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:carousel.tpl' => 1,
    'file:homeFilter.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5f767ae6e2f633_04199383 (Smarty_Internal_Template $_smarty_tpl) {
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
    <div class="row pt-1">
        <h3 class="text-center pb-5 pt-5 h1">¿Estás buscando algo en específico?</h3>
    </div>
    <div class="row m-4 pb-4">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['category']->value, 'type');
$_smarty_tpl->tpl_vars['type']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['type']->value) {
$_smarty_tpl->tpl_vars['type']->do_else = false;
?>
        <div class="col-sm-3">
            <a class="btn-filter btn btn-lg rounded-pill btn-warning w-100 p-2 m-1 shadow-sm font-weight-bold" id="<?php echo $_smarty_tpl->tpl_vars['type']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['type']->value->paquete;?>
</a>
        </div>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
    <div id="travel-container" class="row">
            <h4 class="text-center pb-5 pt-5 h1">Observá todos los paquetes que tenemos para vos:</h4>
<?php $_smarty_tpl->_subTemplateRender('file:homeFilter.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>
    </div>
</section>
<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
echo '<script'; ?>
 src="main.js"><?php echo '</script'; ?>
>

</body>

</html><?php }
}
