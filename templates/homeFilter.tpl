    {foreach from=$destination item=place}
            <div class="col-sm-4">
                    <div class="travel-card card w-100 card-border mb-5">
                        <img src="img/card01.jpg" class="card-img-top" alt="...">
                        <div class='product card-text'>
                        <p>{$place->aliaspaquete}</p>
                        </div>
                        <div class="card-body">
                            <h4>{$place->destino|truncate:25}</h4> 
                            <p class='card-text'>{$place->descripcion_breve|truncate:100}</p>
                            <h5 class='card-text'>Desde ${$place->precio}</h5>
                            <a class='btn btn-danger btn-sm' href='verdetalle/{$place->id_destino}'>Ver detalles</a>
                        </div>
                    </div>
                </div>
        {/foreach}
        {if {$checkId} neq '0'}
        <div class="row row-cols-md-2 justify-content-md-center">
        <div class="col text-center">
            <a class="btn-back btn btn-lg-4 rounded-pill btn-danger w-100 p-2 m-3 shadow-sm font-weight-bold" id='0'>Ver todos los paquetes</a>
        </div>
        {/if}
    </div>    
    </div>

    


