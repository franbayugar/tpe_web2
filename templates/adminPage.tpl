
{include 'header.tpl'}
<section class="container p-1 container-admin ">
<div class="jumbotron m-4">
  <h1 class="display-4">Bienvenido, {$smarty.session.username}</h1>
  <p class="lead">Seleccione lo que desea administrar.</p>
  <hr class="my-4">
  <div class="row">
    <div class="col container-admincard ">
      <img src="img/city.jpg" alt="destination">
      <a type="button" href="destinationmanage" class="btn-admin btn btn-lg btn-outline-light p-3">Administrar destinos</a>
    </div>
  </div>
  <div class="row">
    <div class="col container-admincard">
      <img src="img/aircraft.jpg" alt="category">
      <a type="button" href="categorymanage" class="btn-admin btn btn-lg btn-outline-light p-3">Administrar categorías</a>
    </div>
  </div>
  <div class="row">
    <div class="col container-admincard">
      <img src="img/users.jpg" alt="users">
      <a type="button" href="usersmanage" class="btn-admin btn btn-lg btn-success  p-3">Administrar usuarios</a>
    </div>
  </div>
</div>
</section>
{include 'footer.tpl'}
</body>
</html>