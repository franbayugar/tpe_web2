"use strict";
/* utilizo vue para acceder a la funcion de remove y obtener comentarios*/
const app = new Vue({
    el: "#app",
    data: {
        comments: [],
        rol: 0
    },
    methods: {
        remove: async function (id) {
            const comments = await fetch(`api/comentario/${id}`, {
                "method": 'DELETE'
            });
            getComments();
        },
        getComments: async function () {
            try {
                //guardo el rol del user
                let id_rol = document.querySelector('input[name="rol_user"]').value;
                app.rol = id_rol;
                //guardo el id de destino
                let id_destino = document.querySelector('input[name="id_destino"]').value;
                const response = await fetch(`api/comentarios/${id_destino}`);
                //si la respuesta es correcta
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
    }
});

document.addEventListener("DOMContentLoaded", () => {
    app.getComments();
    let id_user = document.querySelector('input[name="id_user"]').value;
    let comprobationComment = document.querySelector('input[name="comprobationComment"]').value;

    if (id_user != 0 && comprobationComment == 1) {
        //si de esta manera compruebo que el usuario esta logeado
        document.querySelector(".form-comment").addEventListener('submit', function (e) {
            e.preventDefault();
            addComment();
        })
    };
    /*
    async function getComments() {
        try {
            //guardo el rol del user
            let id_rol = document.querySelector('input[name="rol_user"]').value;
            app.rol = id_rol;
            //guardo el id del destino
            let id_destino = document.querySelector('input[name="id_destino"]').value;
            const response = await fetch(`api/comentarios/${id_destino}`);
            //si la respuesta es ok
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
*/
    //agregar comentario
    async function addComment() {
        //obtengo los datos del input
        const data = {
            descripcion: document.querySelector('textarea[name="comentario"]').value,
            puntuacion: document.querySelector('input[name="puntuacion"]:checked').value,
            id_usuario: document.querySelector('input[name="id_user"]').value,
            id_destino: document.querySelector('input[name="id_destino"]').value
        };

        try {
            const response = await fetch('api/comentario',
                {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(data)
                }
            );
            const comment = response.json();
            //llamo a la funcion para obtener los comentarios 
            getComments();
            if (response.ok) {
                document.querySelector(".form-box").innerHTML =
                    "<div class='alert alert-success'><h3>Gracias por comentar, ¡tu opinión nos ayuda a seguir creciendo!</h3></div>"
            }
        }
        catch (e) {
            console.log(e);
        }
    }
});