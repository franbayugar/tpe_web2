
{include 'header.tpl'}
<section class="container p-1 container-admin ">
<div class="jumbotron m-4">
  <h1 class="display-4">Bienvenido, Admin</h1>
  <p class="lead">Seleccione lo que desea editar.</p>
  <hr class="my-4">
   <div class="row">
    <div class="col-sm container-admincard ">
      <img src="img/d1.jpg" alt="Snow">
<a type="button" href="destinationmanage" class="btn-admin btn btn-lg btn-outline-light p-3">Administrar destinos</a>
    </div>
    <div class="col-sm container-admincard">
      <img src="img/d2.jpg" alt="Snow">
<button type="button" href="categorymanage" class="btn-admin btn btn-lg btn-outline-light p-3">Administrar categorías</button>
        </div>
    </div>
</div>
</section>

{include 'footer.tpl'}
</body>
</html>