document.addEventListener("DOMContentLoaded", () => {
    buttonsEvents();
    let container = document.querySelector("#travel-container");

    function buttonsEvents() {
        let botones = document.querySelectorAll('.btn-filter');
        botones.forEach(boton => {
            boton.addEventListener("click", function (e) {
                e.preventDefault();
                let id = this.getAttribute("id");
                showFilter(id);
            })
        })
    }

    async function showFilter(id) {
        container.innerHTML = '<div class="pb-3 pt-5"><h1 class="text-center">Cargando...</h1></div></div>';
        let response = await fetch(`filtrar/${id}`, {
            method: 'GET'
        });
        let html = await response.text();
        setTimeout(() => {
            container.innerHTML = html;
        }, 500);
        if (id != 0) {
            buttonSeeAll();
        }
        }

    function buttonSeeAll() {
        setTimeout(() => {
            let btnSeeAll = document.querySelector('.btn-all');
            btnSeeAll.addEventListener('click', () => {
                showFilter(btnSeeAll.getAttribute("id"));
            });
        }, 500);

    }

});