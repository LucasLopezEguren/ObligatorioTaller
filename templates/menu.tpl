<link rel="stylesheet" type="text/css" href="CSS/estilo.css">
<div id="menuBarra" class="navegador">
    <ul>
        <li class="barraNav"><a href="index.php" class="barraNav">Inicio</a></li>  
        {if $usuario eq "admin"}
            <li class="barraNav"><a href="admUsuarios.php" class="barraNav">Admin.Usuarios</a></li>
        {/if}
        {if $usuario eq "Desconectado"}
        {else}
            <li class="barraNav"><a href="nuevaPublicacion.php" class="barraNav">Nueva Publicación</a></li>
        {/if}
    </ul>
</div>