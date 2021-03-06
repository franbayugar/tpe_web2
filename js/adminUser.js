document.addEventListener("DOMContentLoaded", () => {
    buttonsEvents();
    let container = document.querySelector(".container-user");

    function buttonsEvents() {
        let botones = document.querySelectorAll('.btn-edit');
        botones.forEach(boton => {
            boton.addEventListener("click", function (e) {
                e.preventDefault();
                let id = this.getAttribute("id");
                showEdit(id);
            })
        })
    }

    async function showEdit(id) {
        let response = await fetch(`permisos/${id}`, {
            method: 'GET'
        });
        let html = await response.text();
        container.innerHTML += html;
        let btnBack = document.querySelector(".btn-back");
        btnBack.addEventListener("click", function (e) {
            e.preventDefault();
            removeAside();
        })
    }

    function removeAside() {
        let containermodal = document.querySelector(".modal-result");
        let padre = containermodal.parentNode;
        padre.removeChild(containermodal);
        buttonsEvents();
    }
});