<?php
/* Smarty version 3.1.30, created on 2018-02-28 03:12:00
  from "/var/www/Obligatorio/templates/privada2.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a961e007c3022_78409378',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '42e7bfae5ff024cd0622ef93888711d8b9bb5e6b' => 
    array (
      0 => '/var/www/Obligatorio/templates/privada2.tpl',
      1 => 1519787512,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:cabezal.tpl' => 1,
    'file:menu.tpl' => 1,
  ),
),false)) {
function content_5a961e007c3022_78409378 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mi primer APP</title>
    </head>
    <body>
        <?php $_smarty_tpl->_subTemplateRender("file:cabezal.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        
        <div style="float: left">
            <?php $_smarty_tpl->_subTemplateRender("file:menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        </div>
        <div style="float: right; align-content: center">
                <h1>Area de Datos</h1>
                <?php echo $_smarty_tpl->tpl_vars['valores']->value[0];?>
 - <?php echo $_smarty_tpl->tpl_vars['valores']->value[1];?>
 - <?php echo $_smarty_tpl->tpl_vars['valores']->value[2];?>
 - <?php echo $_smarty_tpl->tpl_vars['valores']->value[3];?>

                <hr>
                <table>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['datos']->value, 'valor', false, 'mes');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['mes']->value => $_smarty_tpl->tpl_vars['valor']->value) {
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['mes']->value;?>
</td><td><?php echo $_smarty_tpl->tpl_vars['valor']->value;?>
</td>
                        </tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </table>
                <hr>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['personas']->value, 'persona');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['persona']->value) {
?>
                    <p><b>Nombre:</b><?php echo $_smarty_tpl->tpl_vars['persona']->value['nombre'];?>
, 
                        <b>Correo:</b><?php echo $_smarty_tpl->tpl_vars['persona']->value['correo'];?>
, 
                        <b>Edad:</b><?php echo $_smarty_tpl->tpl_vars['persona']->value['edad'];?>
</p>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </div>
    </body>
</html>
<?php }
}
