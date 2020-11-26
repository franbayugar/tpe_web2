{include 'header.tpl'}
<section class="container-md p-5">
    <div class="row">
        <div>
            <h1 class="display-3">{$destination->destino}</h1>
            <p>hola</p>
            <img src="{$destination->imagen}" alt="imagen-destino">
        </div>
        <hr class="my-4">
        <div class="col-sm-12">
            <p class="font-weight-bold">{$destination->aliaspaquete}</p>
            <p class="font-italic">{$destination->descripcion}</p>
            <hr class="my-4">

            <form class="coment-box">
                <div class="form-group row">
                    <div class="col-8">
                        <label for="FormControlTextarea1">
                            <h4>Dejá tu comentario y puntuación:</h4>
                        </label>
                    </div>
                    <div class="col-4 d-flex justify-content-end">
                        <p class="clasificacion">
                            <input id="radio1" type="radio" name="puntuacion" value="5" required>
                            <!--
            --><label for="radio1">★</label>
                            <!--
            --><input id="radio2" type="radio" name="puntuacion" value="4" required>
                            <!--
            --><label for="radio2">★</label>
                            <!--
            --><input id="radio3" type="radio" name="puntuacion" value="3" required>
                            <!--
            --><label for="radio3">★</label>
                            <!--
            --><input id="radio4" type="radio" name="puntuacion" value="2" required>
                            <!--
            --><label for="radio4">★</label>
                            <!--
            --><input id="radio5" type="radio" name="puntuacion" value="1" required>
                            <!--
            --><label for="radio5">★</label>
                        </p>
                    </div>
                    <textarea class="form-control" name="comentario" id="FormControlTextarea1" rows="3"></textarea>
                    <button class="btn btn-md btn-primary">Enviar</button>
                </div>
            </form>

        </div>
    </div>
</section>
{include 'footer.tpl'}
</body>

</html>