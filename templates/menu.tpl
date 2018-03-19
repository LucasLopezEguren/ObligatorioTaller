<link rel="stylesheet" type="text/css" href="CSS/estilo.css">
<div id="menuBarra" class="navegador">
    <ul>
        <li class="barraNav"><a href="index.php" class="barraNav">Inicio</a></li> 
        {if $usuario neq "Desconectado"}
            <li class="barraNav"><a href="nuevaPublicacion.php" class="barraNav">Nueva Publicación</a></li>
            <li class="barraNav"><a href="estadisticas.php" class="barraNav">Estadisticas</a></li>
        {/if}
    </ul>
</div>