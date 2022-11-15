{include file="header.tpl"}


<div class="d-grid gap-3">
  <form action="filtro" method="POST">
    <select class="btn btn-dark" name="opciones" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
      <option>auto</option>
      <option>camioneta</option>
    </select>
    <button class="btn btn-light" type="submit">Filtrar categoria</button>
  </form>
</div>

<ul class="list-group border border-dark">
  {foreach from=$cars item=$car}
      {if {$car->categoria} eq {$opciones}}
        <h5 class="list-group-item list-group-item-primary"> Vehiculo : {$car->vehiculos} </h5>
        <li class="list-group-item"> Forma de pago : {$car->forma_de_pago}</li>
        <li class="list-group-item"> Contacto: {$car->contacto}</li> 
      {/if}
  {/foreach}
</ul>
<a class="btn btn-dark" href="home">Volver al inicio</a>

{include file="footer.tpl"}