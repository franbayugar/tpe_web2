{foreach from=$destination item=place}
<div class="col-sm-4">
    <div class="travel-card card w-100 card-border mb-5">
        <img src="{$place->imagen}" class="card-img-top" alt="...">
        <div class='product card-text'>
            <p>{$place->aliaspaquete}</p>
        </div>
        <div class="card-body">
            <h4>{$place->destino|truncate:25}</h4>
            <p class='card-text'>{$place->descripcion_breve|truncate:100}</p>
            <h5 class='card-text'>Desde ${$place->precio}</h5>
            <a class='btn btn-danger btn-sm' href='verdetalle/{$place->id_destino}'>Ver detalles</a>
            <input id="count-items" type="hidden" value={$destination|count}>
        </div>
    </div>
</div>
{/foreach}
{if {$checkId} neq '0'}
<div class="row row-cols-md-2 justify-content-md-center">
    <div class="col text-center">
        <a class="btn-all btn btn-lg-4 rounded-pill btn-danger w-100 p-2 m-3 shadow-sm font-weight-bold" id='0'>Ver
            todo</a>
    </div>
</div>
{/if}
{if {$buttonsPagination} neq null}
<div class="btn-group row" role="group" aria-label="Basic example">
    <div class="col-sm-4"></div>
        <div class="col-sm-4 text-center">
            <button type="button" id="btn-back" press="0" filterPrice="{$filterPrice}" pagination="{$buttonsPagination - 6}" class="btn btn-secondary">Anterior</button>
            <button type="button" id="btn-next" press="1" filterPrice="{$filterPrice}" pagination="{$buttonsPagination}" class="btn btn-secondary">Siguiente</button>
        </div>
    <div class="col-sm-4"></div>
</div>
{else}
        <input type="hidden" id="btn-back" press="0" filterPrice="0" pagination="0" class="btn btn-secondary">
{/if}
