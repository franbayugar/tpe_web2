"use strict";

const app = new Vue({
    el: "#app",
    data: {
        comments: [],
    }
});
document.addEventListener("DOMContentLoaded", () => {
    getComments();

    document.querySelector(".form-comment").addEventListener('submit', function (e) {
        e.preventDefault();
        addComment();
    });

    async function getComments() {
        try {
            let id_destino = document.querySelector('input[name="id_destino"]').value;
            const response = await fetch(`api/comentarios/destino/${id_destino}`);
            if (response.ok) {
                const commentsResponse = await response.json();
                app.comments = commentsResponse;

            }
            else {
                console.log('error');
            }
        }
        catch (e) {
            console.log(e);
        }
    }


    async function addComment() {
        const data = {
            descripcion: document.querySelector('textarea[name="comentario"]').value,
            puntuacion: document.querySelector('input[name="puntuacion"]:checked').value,
            id_usuario: document.querySelector('input[name="id_user"]').value,
            id_destino: document.querySelector('input[name="id_destino"]').value
        };

        let chivo = JSON.stringify(data);
        console.log(chivo);

        try {
            const response = await fetch('api/comentarios',
                {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(data)
                }
            );
            const comment = response.json();

        }
        catch (e) {
            console.log(e);
        }
    }
});