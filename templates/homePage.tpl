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
    <div id="travel-container" class="row">
            <h4 class="text-center pb-5 pt-5 h1">Observá todos los paquetes que tenemos para vos:</h4>
{include 'homeFilter.tpl'}
    </div>
</section>
{include 'footer.tpl'}
<script src="js/main.js"></script>

</body>

</html>