<link rel="stylesheet" type="text/css" href="CSS/estilo.css">
<div id="navegador">
    <ul>
        <li><a href="index.php">Inicio</a></li>  
        <li><a href="login.php">Iniciar sesion</a></li>
        <li><a href="altaUsuario.php">Registrarse</a></li>
        {if $usuario eq "admin"}
            <li><a href="admUsuarios.php">Admin.Usuarios</a></li>
        {/if}
        <li><a href="logout.php">Salir</a></li>
    </ul>
</div>