<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-01 18:13:39
  from 'C:\xampp\htdocs\proyects\web 2\tp_especial\tpe_web2\templates\about.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f760033370055_17484237',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0c3f20d0137d6d13f89955e02a91a4f9492e7316' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyects\\web 2\\tp_especial\\tpe_web2\\templates\\about.tpl',
      1 => 1601526072,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_5f760033370055_17484237 (Smarty_Internal_Template $_smarty_tpl) {
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
<section class="container-md p-3">
    <div class="row pt-1 p-5 m-3">
        <h3 class="text-center pb-3 pt-3 h1">Sobre nosotros:</h3>
        <p class="text-center">Somos una empresa dedicada a la venta de paquetes turísticos a distintos puntos de Argentina.
        Ofrecemos precios más que accesibles con la posibilidad de seleccionar alojamiento, pasaje de vuelo, alquiler de autos y hasta excursiones.</p>
        <p class="text-center">Tenemos poca trayectoria pero muchas personas nos eligen. Contamos con interesantes promociones para que puedas aprovechar de ese destino que tanto esperaste tras haber pasado por la pandemia del COVID-19.</p>
        <p class="text-center">Estamos ubicados en la ciudad de Tres Arroyos, Provincia de Buenos Aires, Argentina. Nuestras oficinas están localizadas en la calle Estrada 380 y nos pueden encontrar por las redes sociales como Travel TA.</p>
        <p class="text-center">Podes comunicarte vía mail a travelta@gmail.com o por teléfono al 2983555555.</p>
    </div>
 
</section>
<?php $_smarty_tpl->_subTemplateRender('file:footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


</body>

</html><?php }
}
