<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-02 19:48:57
  from 'C:\xampp\htdocs\proyects\web 2\tp_especial\tpe_web2\templates\homeFilter.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f776809f3d854_53195791',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1aea946e1688ea7b48e4e9258c73c17b9dd506ec' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proyects\\web 2\\tp_especial\\tpe_web2\\templates\\homeFilter.tpl',
      1 => 1601660936,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f776809f3d854_53195791 (Smarty_Internal_Template $_smarty_tpl) {
?>    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['destination']->value, 'place');
$_smarty_tpl->tpl_vars['place']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['place']->value) {
$_smarty_tpl->tpl_vars['place']->do_else = false;
?>
            <div class="col-sm-4">
                    <div class="travel-card card w-100 card-border mb-5">
                        <img src="img/card01.jpg" class="card-img-top" alt="...">
                        <div class='product card-text'>
                        <p><?php echo $_smarty_tpl->tpl_vars['place']->value->aliaspaquete;?>
</p>
                        </div>
                        <div class="card-body">
                            <h3><?php echo $_smarty_tpl->tpl_vars['place']->value->destino;?>
</h3> 
                            <p class='card-text'><?php echo $_smarty_tpl->tpl_vars['place']->value->descripcion_breve;?>
</p>
                            <p class='card-text'>Desde $<?php echo $_smarty_tpl->tpl_vars['place']->value->precio;?>
</p>
                            <a class='btn btn-danger btn-sm' href='verdetalle/<?php echo $_smarty_tpl->tpl_vars['place']->value->id_destino;?>
'>Ver detalles</a>
                        </div>
                    </div>
                </div>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <?php ob_start();
echo $_smarty_tpl->tpl_vars['checkId']->value;
$_prefixVariable1 = ob_get_clean();
if ($_prefixVariable1 != '0') {?>
        <div class="row row-cols-md-2 justify-content-md-center">
        <div class="col text-center">
            <a class="btn-back btn btn-lg-4 rounded-pill btn-danger w-100 p-2 m-3 shadow-sm font-weight-bold" id='0'>Ver todos los paquetes</a>
        </div>
                <?php }?>

    </div>    
    </div>

    


<?php }
}
