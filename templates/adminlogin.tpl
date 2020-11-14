{include 'header.tpl'}
<div class="login-form">
        <form class="form-signin" action="verify" method="POST">
        <h1 class="h3 mb-3 font-weight-normal">Ingrese sus datos:</h1>
        <label for="inputEmail" class="sr-only" >Usuario</label>
        <input type="text" class="form-control" name="user" placeholder="Usuario" required>
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Contraseña" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Acceder</button>
      </form>
           {if $error}
                <div class="alert alert-danger">
                    {$error}
                </div>
            {/if}
</div>
      <div class= "register-consult text-center mb-5"> 
      <p>¿No estás registrado?</p>
      <a class="btn btn-success" href="register">Registrate</a>
      </div>
           

{include 'footer.tpl'}

</body>
</html>