<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-27 01:07:58
  from 'C:\xampp\htdocs\proyects\web 2\tp_especial\tpe_web2\templates\adminlogin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f6fc9ce38ba24_70061427',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6239778b7ca993eb6fa41b2b17b94074bef43486' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyects\\web 2\\tp_especial\\tpe_web2\\templates\\adminlogin.tpl',
      1 => 1601159838,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5f6fc9ce38ba24_70061427 (Smarty_Internal_Template $_smarty_tpl) {
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
<div class="login-form">
        <form class="form-signin" action="admin" method="POST">
        <h1 class="h3 mb-3 font-weight-normal">Ingrese sus datos:</h1>
        <label for="inputEmail" class="sr-only" >Usuario</label>
        <input type="text" class="form-control" name="user" placeholder="Usuario" required>
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Contraseña" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Acceder</button>
      </form>
</div>
<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html><?php }
}
