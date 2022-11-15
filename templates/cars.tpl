{include file="header.tpl"}


<h1>{$titulo}</h1>
<div class="d-grid gap-8 col-3 mx-auto">

<h3 class="display-4">Filtrar vehiculos</h3>
<form action="filtro" method="POST">
<select name="opciones" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
  <option>auto</option>
  <option>camioneta</option>
</select>
<button class="btn btn-light" type="submit">Filtrar</button>
</form>


<h3 class="display-6">Filtrar especificaciones por autos</h3>
<form action="listado" method="POST">
  <button class="btn btn-light" type="submit">Filtrar</button>
</form>


<div class=" border border-dark border border-4 rounded-2">
{if isset($smarty.session.logged)} 
      <form action="add" method="POST">
        <h3>Agregar Vehiculo</h3>
          <label>Vehiculo<input class="form-control form-control-lg" type="text"  name="vehiculos" required></input></label>
          <label>Forma de pago<input class="form-control form-control-lg" type="text" name="forma_de_pago" required></input></label>
          <label>Contacto<input class="form-control form-control-lg" type="text" name="contacto" placeholder="Contacto de preferencia" required></input></label>
        <select class="btn btn-dark" name="categoria">
          <option>auto</option>
          <option>camioneta</option>
        </select>
        <button type="submit" class="btn btn-primary">Cargar Vehiculo</button>
      </form>
    {/if}    
  </div>
</div>

<div class="d-grid gap-3 col-7 mx-auto border border-dark">
  <ul class= list-group>
    {foreach from=$cars item=car} 
        <h5 class=list-group-item> Vehiculo:<a href= "informacion/{$car->id}">{$car->vehiculos}</a></h5> 
        <li class=list-group-item> Metodo de pago: {$car->forma_de_pago}</li> 
        <li class=list-group-item> Contacto: {$car->contacto}</li>                        
        <li class=list-group-item> categoria: {$car->categoria}</li>                        
      {if isset($smarty.session.logged)}       
          <a class="btn btn-danger" href= "delete/{$car->id}">Borrar</a>
          <a class="btn btn-info" href= "formedit/{$car->id}">Editar</a>
      {/if}
    {/foreach}
  </ul> 
</div>

{include file="footer.tpl"}