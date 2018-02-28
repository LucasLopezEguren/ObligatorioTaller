<?php
/* Smarty version 3.1.30, created on 2018-02-28 03:14:55
  from "/var/www/Obligatorio/templates/privada.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a961eafd9b341_00261066',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2530b24bc5b98998f100c5e049b1a8739e372191' => 
    array (
      0 => '/var/www/Obligatorio/templates/privada.tpl',
      1 => 1519787624,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:cabezal.tpl' => 1,
    'file:menu.tpl' => 1,
  ),
),false)) {
function content_5a961eafd9b341_00261066 (Smarty_Internal_Template $_smarty_tpl) {
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
        <div style="float: right" align-content: center>
            <h1>Bienvenido al Sitio</h1>
        </div>
    </body>
</html>
<?php }
}
