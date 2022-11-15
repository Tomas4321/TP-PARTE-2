{include file="header.tpl"}


<div class="mt-5 w-25 mx-auto">
<form method="POST" action="validate">
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" required class="form-control" id="email" name="email" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" required class="form-control" id="password" name="contraseña">
    </div>

    <button type="submit" class="btn btn-success">Entrar</button>
    <a aria-current="page" href="home"><button type="button" class="btn btn-light">Invitado </button></a>      
    {if $error} 
        <div class="alert alert-danger mt-3">
            {$error}
        </div>
    {/if}

</form>    
</div>

{include file="footer.tpl"}          



