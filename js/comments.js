"use strict";

document.addEventListener("DOMContentLoaded", () => {
    getComments();

    document.querySelector(".comment-box").addEventListener('submit', function (e) {
        e.preventDefault();
        addComment();
    });

    async function getComments() {
        try {
            const response = await fetch('api/comentarios');
            if (response.ok) {
                const comments = await response.json();
                renderComments(comments);
            }
            else {
                console.log('error');
            }
        }
        catch (e) {
            console.log(e);
        }
    }

    function renderComments(comments) {
        const container = document.querySelector('#comment-list');
        for (let comment of comments) {
            console.log(comment.descripcion);
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
            getComments();

        }
        catch (e) {
            console.log(e);
        }
    }
});