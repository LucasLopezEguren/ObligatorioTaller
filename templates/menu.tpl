<div id="navegador">
    <ul>
        <li><a href="index.php">Inicio</a></li>
        <li><a href="login.php">Iniciar sesion</a></li>
        <li><a href="altaUsuario.php">Registrarse</a>
                <br>
                {if $usuario eq "admin"}
                <a href="admUsuarios.php">Admin.Usuarios</a>
                <br>
        {/if}</li>
        <li><a href="logout.php">Salir</a></li>
    </ul>
</div>