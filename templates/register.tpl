{include 'header.tpl'}
<div class="login-form">
        <form class="form-signup" action="registry-user" method="POST">
        <h1 class="h3 mb-3 font-weight-normal">Ingrese sus datos:</h1>
        <label for="inputName">Nombre de usuario:</label>
        <input type="text" class="form-control" name="user" required>
        <label for="inputMail">Email:</label>
        <input type="text" class="form-control" name="mail" required>
        <label for="inputName">Contraseña (al menos 6 caracteres):</label>
        <input type="password" class="form-control" name="password" minlength="6" required>
        <label for="inputName">Confirmar contraseña:</label>
        <input type="password" class="form-control" name="password-confirm" minlength="6" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Registrarse</button>
      </form>
                 {if $error}
                <div class="alert alert-danger">
                    {$error}
                </div>
            {/if}
</div>
      <div class= "register-consult text-center mb-5"> 
      <p>¿Ya tenes cuenta?</p>
      <a class="btn btn-success" href="login">Iniciar sesión</a>
      </div>
           
{include 'footer.tpl'}

</body>
</html>