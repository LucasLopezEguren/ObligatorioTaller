<?php
/* Smarty version 3.1.30, created on 2018-02-24 22:09:41
  from "/var/www/Obligatorio/templates/modifUsuario.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a91e2a542f670_54525527',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '74bba98cb8dafe6bf4b18da07fd6b7117f690cb8' => 
    array (
      0 => '/var/www/Obligatorio/templates/modifUsuario.tpl',
      1 => 1519510164,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:cabezal.tpl' => 1,
    'file:menu.tpl' => 1,
  ),
),false)) {
function content_5a91e2a542f670_54525527 (Smarty_Internal_Template $_smarty_tpl) {
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
                <h1>Alta de Usuarios</h1>
                <form method="POST" action="actualizoUsuario.php">
                    <input type="hidden" name="usuId" id="usuId" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value['usuId'];?>
">
                    Nombre: <input type="text" id="usuNombre" name="usuNombre" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value['usuUsuario'];?>
"/>
                    <br>
                    Correo: <input type="text" id="usuCorreo" name="usuCorreo" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value['usuCorreo'];?>
"/>
                    <br>
                    Clave: <input type="password" id="usuClave" name="usuClave" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value['usuClave'];?>
"/>
                    <br>
                    <input type="submit" value="Modificar Usuario">
                </form>
        </div>
    </body>
</html>
<?php }
}
