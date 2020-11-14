{include 'header.tpl'}
<div class="login-form">
        <form class="form-signup" action="resgitry-user" method="POST">
        <h1 class="h3 mb-3 font-weight-normal">Ingrese sus datos:</h1>
        <label for="inputName">Nombre de usuario:</label>
        <input type="text" class="form-control" name="inputName" required>
        <label for="inputMail">Email:</label>
        <input type="text" class="form-control" name="inputMail" required>
        <label for="inputName">Contraseña:</label>
        <input type="password" class="form-control" name="password" required>
        <label for="inputName">Confirmar contraseña:</label>
        <input type="password" class="form-control" name="password-confirm" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Registrarse</button>
      </form>
</div>
           
{include 'footer.tpl'}

</body>
</html>