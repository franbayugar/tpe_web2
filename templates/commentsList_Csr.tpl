{include 'header.tpl'}
<section class="container-md p-5">
    <div class="row">
    <div>
        <h1 class="display-3">{$destination->destino}</h1>
    </div>      
          <hr class="my-4">
    <div class="col-sm-12">
    <p class="font-weight-bold">{$destination->aliaspaquete}</p>
    <p class="font-italic">{$destination->descripcion}</p>
        <hr class="my-4">
        <div class="comment-box">
            <h4>Opiniones:</h4>
            {include file="vue/commentList.vue"}
        </div>
        <hr class="my-4">
    <form class= "form-comment">
        <div class="form-group row">
        <div class= "col-8">
                <label for="FormControlTextarea1">
                    <h4>Dejá tu comentario y puntuación:</h4>
                </label>
            <input type="hidden" name="id_user" value={$smarty.session.ID_USER}>
            <input type="hidden" name="id_destino" value={$destination->id_destino}>
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
        <textarea class="form-control" name="comentario" id="comment" rows="3" required></textarea>
        <button id="btn-enviar" class="btn btn-md btn-primary">Enviar</button>
        </div>    
  </form>

    </div>
    </div>
</section>
{include 'footer.tpl'}
<script src="js/comments.js"></script>
</body>
</html>