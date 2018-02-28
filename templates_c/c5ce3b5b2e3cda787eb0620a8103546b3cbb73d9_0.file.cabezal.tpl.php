<?php
/* Smarty version 3.1.30, created on 2018-02-28 03:14:45
  from "/var/www/Obligatorio/templates/cabezal.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a961ea50f27f2_06725484',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c5ce3b5b2e3cda787eb0620a8103546b3cbb73d9' => 
    array (
      0 => '/var/www/Obligatorio/templates/cabezal.tpl',
      1 => 1519787624,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a961ea50f27f2_06725484 (Smarty_Internal_Template $_smarty_tpl) {
?>
<table border="0" width="100%">
    <tr>
        <td>
        <img src="imagenes/logo.png" width="50px"/>
        Mi Empresa S.A.
        </td>
        <td align="rigth">
            <small>Usuario: <i><?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
</i></small>
        </td>
    </tr>
</table>
<hr/>
<?php }
}
