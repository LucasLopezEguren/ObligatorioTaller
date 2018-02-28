<?php
/* Smarty version 3.1.30, created on 2018-02-28 03:14:45
  from "/var/www/Obligatorio/templates/menu.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a961ea50fd761_89081720',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bf401800e3e5fbb6715be4cee02c2630d0a31086' => 
    array (
      0 => '/var/www/Obligatorio/templates/menu.tpl',
      1 => 1519787624,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a961ea50fd761_89081720 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="navegador">
    <ul>
        <li><a href="privada.php">Inicio</a></li>
        <li><a href="Login.php">Iniciar sesion</a></li>
        <li><a href="altaUsuario.php">Registrarse</a>
                <br>
                <?php if ($_smarty_tpl->tpl_vars['usuario']->value == "admin") {?>
                <a href="admUsuarios.php">Admin.Usuarios</a>
                <br>
        <?php }?></li>
        <li><a href="logout.php">Salir</a></li>
    </ul>
</div><?php }
}
