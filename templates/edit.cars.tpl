{include file="header.tpl"}

<div class="d-grid gap-3 col-3 mx-auto">
  <form action="edit/{$id}" method="POST">
      <label>Vehiculo:<input class="form-control form-control-lg" type="text" name="vehiculos" required></input></label>
      <label>Forma de pago:<input class="form-control form-control-lg" type="text" name="forma_de_pago" required></input></label>
      <label>Contacto: <input class="form-control form-control-lg" type="text" name="contacto" placeholder="Contacto de preferencia" required></input></label>
      <select class="btn btn-dark" name="categoria">
          <option>auto</option>
          <option>camioneta</option>
        </select>
    <button name="edit" type="submit">Cargar</button>
  </form>
</div>


{include file="footer.tpl"}