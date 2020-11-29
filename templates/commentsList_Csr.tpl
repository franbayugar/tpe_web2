{include 'header.tpl'}
<section class="container-md p-5">
    <div class="row">
    <div>
        <h1 class="display-3">{$destination->destino}</h1>
                  <hr class="my-4">
        <img src="{$destination->imagen}" alt="imagen-destino" class="w-100">
    </div>      
          <hr class="my-4">
    <div class="col-sm-12">
    <p class="font-weight-bold">{$destination->aliaspaquete}</p>
    <p class="font-italic">{$destination->descripcion}</p>
        <hr class="my-4">
        <div class="comment-box">
            {include file="vue/commentList.vue"}
        </div>
        <hr class="my-4">
        {if isset($smarty.session.username) and {$comprobationComment} eq 1}
    <form class= "form-comment">
        <input type="hidden" name="id_destino" value={$destination->id_destino}>
        <input type="hidden" name="id_user" value={$smarty.session.ID_USER}>
        <input type="hidden" name="rol_user" value={$smarty.session.permission}>
        <input type="hidden" name="comprobationComment" value={$comprobationComment}>
            <div class="form-box">
            <div class="form-group row ">
                <div class= "col-8">
                        <label for="FormControlTextarea1">
                            <h4>Dejá tu comentario y puntuación:</h4>
                                <p>{$smarty.session.username}</p>
                        </label>
                </div>
                <div class= "col-4 d-flex justify-content-end">
                <p class="clasificacion">
                    <input id="radio1" type="radio" name="puntuacion" value="5" required><!--
                    --><label for="radio1">★</label><!--
                    --><input id="radio2" type="radio" name="puntuacion" value="4" required><!--
                    --><label for="radio2">★</label><!--
                    --><input id="radio3" type="radio" name="puntuacion" value="3" required><!--
                    --><label for="radio3">★</label><!--
                    --><input id="radio4" type="radio" name="puntuacion" value="2" required><!--
                    --><label for="radio4">★</label><!--
                    --><input id="radio5" type="radio" name="puntuacion" value="1" required><!--
                    --><label for="radio5">★</label>
                </p>
                </div>
            </div>   
            <textarea class="form-control" name="comentario" id="comment" rows="3" required></textarea>
            <div class="text-center">
                <button id="btn-enviar" class="btn btn-md btn-primary text-center">Enviar</button>
            </div>
            </div>
        </form> 
        {else if {$comprobationComment} neq null}
        <div class="alert alert-info" v-else>
            <input type="hidden" name="id_destino" value={$destination->id_destino}>
            <input type="hidden" name="id_user" value={$smarty.session.ID_USER}>
            <input type="hidden" name="rol_user" value={$smarty.session.permission}>
            <input type="hidden" name="comprobationComment" value={$comprobationComment}>
            <h4>Parece que ya opinaste sobre {$destination->destino}</h4>
            <p>¡Te agradecemos por tu opinión, te invitamos a elegir un nuevo destino!</p>
        </div>
        <aside class="d-flex justify-content-center p-5">
            <a type="button" href="inicio" class="btn-admin btn btn-md btn-primary pl-4 pr-4">Volver</a>
        </aside>
            {else}
    <div class="text-center">
    <h4 class="mb-4">Para dejar una opinión es necesario estar logeado</h4>
    <a class="btn btn-success" href="login">Iniciar sesión</a>
        <input type="hidden" name="id_destino" value={$destination->id_destino}>
        <input type="hidden" name="id_user" value=0>
        <input type="hidden" name="rol_user" value=0>
        
    </div>
    {/if}
    </div>
    </div>
</section>
{include 'footer.tpl'}
<script src="js/comments.js"></script>
</body>
</html>