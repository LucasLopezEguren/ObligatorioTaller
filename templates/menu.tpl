<link rel="stylesheet" type="text/css" href="CSS/estilo.css">
<div id="navegador">
    <ul>
        <li><a href="index.php">Inicio</a></li>  
        {if $usuario eq "admin"}
            <li><a href="admUsuarios.php">Admin.Usuarios</a></li>
        {/if}
    </ul>
</div>