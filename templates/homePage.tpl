{include 'header.tpl'}
{include 'carousel.tpl'}
<section class="container-md p-5">
    <div class="row pt-1">
        <h3 class="text-center pb-5 pt-5 h1">¿Estás buscando algo en específico?</h3>
    </div>
    <div class="row m-4 pb-4">
        {foreach from=$category item=type}
        <div class="col-sm-3">
            <a class="btn-filter btn btn-lg rounded-pill btn-warning w-100 p-2 m-1 shadow-sm font-weight-bold" id="{$type->id}">{$type->paquete}</a>
        </div>
        {/foreach}
    </div>
    <h4 class="text-center pb-5 pt-5 h1">Observá los paquetes que tenemos para vos:</h4>

    <div id="travel-container" class="row">
{include 'homeFilter.tpl'}
</section>
    <section>
        <form action="busqueda" method="POST" id="form-search" class="form-group">
        <div class="d-flex row m-5">
                <h4>Buscá el mejor precio para vos:</h4>
            <div class="col-sm-10 d-flex">
                <input class="form-control" name="precio-min" type="number" placeholder="Precio mínimo">
                <input class="form-control" name="precio-max" type="number" placeholder="Precio máximo">
            </div>
            <div class="col-sm-2">
                <button class="form-control btn btn-md btn-primary" id="btn-search">Buscar</button>
            </div>
            </div>
        </form>
    </section>

{include 'footer.tpl'}
<script src="js/main.js"></script>

</body>

</html>