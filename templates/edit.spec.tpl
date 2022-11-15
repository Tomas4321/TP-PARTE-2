{include file="header.tpl"}



<div class="d-grid gap-3 col-3 mx-auto">
<h5>Agregar Especificaciones </h5>    
    <form action="editSpec/{$id_usuarios}" method="POST">
            <label>Caballos de fuerza:<input class="form-control form-control-lg" type="text"  name="cv" required></input></label>
            <label>Precio:<input class="form-control form-control-lg" type="text" name="precio" required></input></label>
            <label>Fabricacion: <input class="form-control form-control-lg" type="text" name="fabricacion" required></input></label>
            <button type="submit" class="btn btn-success">Editar Especificaciones</button>
        </form>
</div>

{include file="footer.tpl"}