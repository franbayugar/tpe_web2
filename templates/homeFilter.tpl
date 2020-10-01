    {foreach from=$destination item=place}
    {if $filterId eq $place->id_categoria || $filterId eq '0'}
            <div class="col-sm-4">
                    <div class="travel-card card w-100 card-border mb-5">
                        <img src="img/card01.jpg" class="card-img-top" alt="...">
                        <div class='product card-text'>
                        <p>{$place->aliashome}</p>
                        </div>
                        <div class="card-body">
                            <h3>{$place->destino}</h3> 
                            <p class='card-text'>{$place->descripcion}</p>
                            <p class='card-text'>Precio: ${$place->precio}</p>
                            <a class='btn btn-danger btn-sm' href='verdetalle/{$place->id}'>Ver detalles</a>
                        </div>
                    </div>
                </div>
            {/if}
        {/foreach}
    </div>
    {if $filterId neq '0'}
    <div class="row row-cols-md-2 justify-content-md-center">
        <div class="col text-center">
    <a class="btn-back btn btn-lg-4 rounded-pill btn-danger w-100 p-2 m-3 shadow-sm font-weight-bold" id='0'>Ver todos los productos</a>
        </div>
    </div>    
    {/if}
    


