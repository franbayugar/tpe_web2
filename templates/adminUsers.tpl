{include 'header.tpl'}
<section class="container-category">
    <div class="m-5">
        <h1 class="display-4">Administrador de usuarios</h1>
    </div>
      <hr class="my-4">

<section class="section-table">
        {if $error}
        <div class="alert alert-danger">
            {$error}
        </div>
        {/if}
    <table class="table table-striped table-dark">
        <thead>
            <tr>
                <td>Usuario</td>
                <td>Mail</td>
                <td>Permisos</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            {foreach from=$users item=user}
                <tr>
                    <td>{$user->username}</td>
                    <td>{$user->email}</td>
                    <td>{if $user->admin eq 1} 
                    Administrador
                    {else}
                    Usuario sin permisos 
                    {/if}
                    </td>
                    <td><a class='btn-edit btn btn-warning btn-sm' id='{$user->id}'>Editar</a>
                    <a class='btn btn-danger btn-sm' href='eliminar-usuario/{$user->id}'>Eliminar</a></td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</section>
<aside class="d-flex justify-content-center p-5">
<a type="button" href="administrador" class="btn-admin btn btn-md btn-primary pl-4 pr-4">Volver</a>
</aside>
</section>
{include 'footer.tpl'}
</body>
</html>