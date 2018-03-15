<table border="0" width="100%">
    <tr>
        <td>
        <img src="imagenes/logo.png" width="50px"/>
        MascotasPerdidas S.A.
        </td>
        <td align="rigth">
            {if $usuario eq "Desconectado"}
            <li><a href="login.php">Iniciar sesion</a></li>
            <li><a href="altaUsuario.php">Registrarse</a></li>
            <li><a href="nuevaPublicacion.php">Nueva Publicación</a></li>
            {else}
            <small>Usuario: <i>{$usuario}</i></small>
            <li><a href="logout.php">Salir</a></li>
            {/if}
        </td>
    </tr>
</table>
<hr/>
