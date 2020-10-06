document.addEventListener("DOMContentLoaded", () => {
    botones();
    let container = document.querySelector(".container-category");

    function botones() {
        let botones = document.querySelectorAll('.btn-edit');
        botones.forEach(boton => {
            boton.addEventListener("click", function (e) {
                e.preventDefault();
                let id = this.getAttribute("id");
                call(id);
            })
        })
    }

    async function call(id) {
        let response = await fetch(`editcategory/${id}`, {
            method: 'GET'
        });
        let html = await response.text();
        container.innerHTML += html;
        let btnBack = document.querySelector(".btn-back");
        btnBack.addEventListener("click", function (e) {
            e.preventDefault();
            back();
        })
    }

    function back() {
        let containermodal = document.querySelector(".modal-result");
        let padre = containermodal.parentNode;
        padre.removeChild(containermodal);
        botones();
    }
});