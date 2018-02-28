<?php
/* Smarty version 3.1.30, created on 2018-02-28 03:14:45
  from "/var/www/Obligatorio/templates/admUsuarios.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a961ea50da008_06329985',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '08a91753819f3b14ed02ce42d69b406b8fc3d6fa' => 
    array (
      0 => '/var/www/Obligatorio/templates/admUsuarios.tpl',
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
function content_5a961ea50da008_06329985 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mi primer APP</title>
        <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery-3.3.1.min.js"><?php echo '</script'; ?>
>            
        <?php echo '<script'; ?>
 type="text/javascript" src="js/admUsuarios.js"><?php echo '</script'; ?>
>            
    </head>
    <body>
        <?php $_smarty_tpl->_subTemplateRender("file:cabezal.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        
        <div style="float: left">
            <?php $_smarty_tpl->_subTemplateRender("file:menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        </div>
        <div style="float: right; align-content: center">
                <h1>Administracion de Usuarios</h1>
                <input type="button" id="alta" value="Agregar Usuario">
                <br>
                <table>
                    <tr>
                        <td>Usuario</td>
                        <td>Correo</td>
                        <td>Acciones</td>
                    </tr>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['usuarios']->value, 'usuario');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['usuario']->value) {
?>
                        <tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['usuario']->value['nombre'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['usuario']->value['email'];?>
</td>
                            <td>
                                <?php if ($_smarty_tpl->tpl_vars['usuario']->value['email'] != "admin") {?>
                                    <input type="button" class="borrar" value="Borrar" alt="<?php echo $_smarty_tpl->tpl_vars['usuario']->value['id'];?>
">
                                    <input type="button" class="modif" value="Modificar" alt="<?php echo $_smarty_tpl->tpl_vars['usuario']->value['id'];?>
">
                                <?php }?>
                            </td>
                        </tr>                        
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </table>
        </div>
    </body>
</html>
<?php }
}
