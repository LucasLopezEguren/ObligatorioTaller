<?php
/* Smarty version 3.1.30, created on 2018-02-28 03:12:07
  from "/var/www/Obligatorio/templates/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a961e0739d792_30022987',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd54020df12b0a80f0101400cff93474903ffc476' => 
    array (
      0 => '/var/www/Obligatorio/templates/index.tpl',
      1 => 1519787512,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a961e0739d792_30022987 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mascotas APP</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery-2.0.3.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery.js"><?php echo '</script'; ?>
>
        <meta name="Keywords" content="palabras claves">
        <meta name="Description" content="este sitio esta creado para las mascotas perdidas">
        <meta name="Author" content="Lucas Lopez - Luca Miraglia">
        <link rel="stylesheet" type="text/css" href="CSS/estilo.css">
    </head>
    <body>        
        <form method="post" action="procesoLogin.php">
            Usuario: <input type="text" id="txtUsuario" name="txtUsuario" value="<?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
"/>
            <br/>
            Clave: <input type="password" id="txtClave" name="txtClave"/>
            <br/>
            <input type="submit" value="Ingresar al Sistema"/>
        </form>
        <div><?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
</div>
    </body>
</html>
<?php }
}
