{literal}
<section id="app">
    <table class="table table-dark">
        <thead>
            <tr>
                <th>Usuario</th>
                <th>Comentario:</th>
                <th>Puntuación:</th>
            </tr>
        </thead>
        <tbody id="comment-list">
            <tr v-for="comment in comments">
                <td>{{comment.username}}</td>
                <td>{{comment.descripcion}}</td>
                <td>{{comment.puntuacion}}</td>
            </tr>
        </tbody>
    </table>
</section>
{/literal}