{include file="header.tpl"}

<h3>{$especificaciones}</h3>

{if $spec}
    <ul class= list-group>
        <li class=list-group-item> Caballos de fuerza: {$spec->cv} </li>
        <li class=list-group-item> Precio : $ {$spec->precio}</li>
        <li class=list-group-item> Fabricacion : {$spec->fabricacion}</li>
        {if isset($smarty.session.logged)} 
            <a class="btn btn-danger" href= "deleteSpecs/{$spec->id_usuarios}">Borrar</a>
            <a class="btn btn-info" href= "formeditSpec/{$spec->id_usuarios}">Editar</a> 
        {/if}    
    </ul>
{else}
    {if isset($smarty.session.logged)}
    <h3 class="text-danger">Este vehiculo no cuenta con Especificaciones</h3>    
    <h5>Agregue Especificaciones</h5>
    <div class="d-grid gap-3 col-3 mx-auto">
        <form action="addSpecs/{$id}" method="POST">
            <label>Caballos de fuerza:<input class="form-control form-control-lg" type="text"  name="cv" required></input></label>
            <label>Precio:<input class="form-control form-control-lg" type="text" name="precio" required></input></label>
            <label>Fabricacion: <input type="text" class="form-control form-control-lg" name="fabricacion" required></input></label>
            <button type="submit" class="btn btn-success">Agregar Especificaciones</button>
        </form>
    </div>    
    {/if}
{/if}

<a class="btn btn-dark" href="home">Volver al inicio</a>
{include file="footer.tpl"}