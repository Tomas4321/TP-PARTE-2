{include file="header.tpl"}


<h3 class="list-group-item list-group-item list-group-item-black">Especificaciones de los autos </h3>
<ul class="list-group border border-dark">
    {foreach from=$cars item=car}    
        <h5 class="list-group-item list-group-item-primary"> Vehiculo: {$car->vehiculos}</h5> 
            {foreach from=$specs item=spec}  
                {if $car->id eq $spec->id_usuarios}       
                    <li class=list-group-item> Caballos de fuerza: {$spec->cv} </li>
                    <li class=list-group-item> Precio : $ {$spec->precio}</li>
                    <li class=list-group-item> Fabricacion : {$spec->fabricacion}</li>
                {/if}          
            {/foreach}       
    {/foreach}  
</ul> 

<form action="home" method="POST">
<button class="btn btn-dark">Volver atras</button>
</form>

{include file="footer.tpl"}