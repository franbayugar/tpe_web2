{literal}
<section id="app">
    <div v-if="comments.length != 0">
        <h4>Opiniones:</h4>

        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Comentario:</th>
                    <th>Puntuación:</th>
                    <th v-if="rol==1"></th>
                </tr>
            </thead>
            <tbody id="comment-list">
                <tr v-for="comment in comments">
                    <td>{{comment.username}}</td>
                    <td>{{comment.descripcion}}</td>
                    <td>{{comment.puntuacion}}</td>
                    <td v-if="rol==1"><button v-on:click="remove(comment.id)" v-bind:id="comment.id"
                            class="btn btn-danger btn-delete btn-sm mb-1">Eliminar</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="alert alert-warning" v-else>

        <h4>Aún no hay comentarios de este destino</h4>
    </div>
</section>

{/literal}