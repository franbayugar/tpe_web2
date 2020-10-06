document.addEventListener("DOMContentLoaded", () => {
    botones();
    let container = document.querySelector("#travel-container");

    function botones() {
        let botones = document.querySelectorAll('.btn-filter');
        botones.forEach(boton => {
            boton.addEventListener("click", function (e) {
                e.preventDefault();
                let id = this.getAttribute("id");
                call(id);
            })
        })
    }

    async function call(id) {
        container.innerHTML = '<div class="pb-3 pt-5"><h1 class="text-center">Cargando...</h1></div></div>';
        let response = await fetch(`filtrar/${id}`, {
            method: 'GET'
        });
        let html = await response.text();
        setTimeout(() => {
            container.innerHTML = html;
        }, 500);
        botonBack();
    }

    function botonBack() {
        setTimeout(() => {
            let btnBack = document.querySelector('.btn-back');
            btnBack.addEventListener('click', () => {
                call(btnBack.getAttribute("id"));
            });
        }, 500);

    }

});