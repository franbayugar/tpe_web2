"use strict";

document.addEventListener("DOMContentLoaded", () => {
    getComments();

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

});