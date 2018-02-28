<?php
/* Smarty version 3.1.30, created on 2018-02-28 03:14:46
  from "/var/www/Obligatorio/templates/altaUsuario.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a961ea6c54551_44942276',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '126c7eacd7ebdf02510c95c6a92b25e780465bce' => 
    array (
      0 => '/var/www/Obligatorio/templates/altaUsuario.tpl',
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
function content_5a961ea6c54551_44942276 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mascotas APP</title>
        <?php echo '<script'; ?>
 type="text/javascript" src="js/jquery-3.3.1.min.js"><?php echo '</script'; ?>
>            
        <?php echo '<script'; ?>
 type="text/javascript" src="js/admUsuarios.js"><?php echo '</script'; ?>
>     
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
        <?php $_smarty_tpl->_subTemplateRender("file:cabezal.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        <div style="float: left">
            <?php $_smarty_tpl->_subTemplateRender("file:menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

        </div>
        <div style="float: right; align-content: center" class="registros" class="izq">
            <p class="izq">Para registrarse por favor llene el siguiente formulario: </p>
            <form method="POST" action="graboUsuario.php">
                <table>
                    <tr>
                        <td>Nombre: </td>
                        <td><input type="text" id="usuNombre" class="noVoid" name="usuNombre"/></td> 							
                    </tr>
                    <tr>
                        <td><div id="errusuNombre" class="error"></br></div></td>
                    </tr>
                    <tr>
                        <td>Correo/Nombre de usuario:</td>
                        <td><input type="text" id="usuCorreo" class="noVoid" name="usuCorreo"/></td> 
                    </tr>
                    <tr>
                        <td><div id="errusuCorreo" class="mensaje"></br></div></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" class="noVoid" id="usuClave" name="usuClave"/></td>
                    </tr>
                    <tr>
                        <td><div id="errusuClave" class="mensaje"></br></div></td>
                    </tr>
                </table>
                <input type="submit" value="Agregar Usuario">
            </form>
        </div>
    </body>
</html>
<?php }
}
