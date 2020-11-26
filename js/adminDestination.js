document.addEventListener("DOMContentLoaded", () => {
    buttonsEvents();
    let container = document.querySelector(".container-destination");

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
        let response = await fetch(`showedit/destination/${id}`, {
            method: 'GET'
        });
        let html = await response.text();
        container.innerHTML += html;
        let btnBack = document.querySelector(".btn-back");
        let btnDeleteImg = document.querySelector(".delete-img");
        btnBack.addEventListener("click", function (e) {
            e.preventDefault();
            removeAside();
        })
        btnDeleteImg.addEventListener("click", function (e) {
            e.preventDefault();
            removeImg();
        });
    }

    function removeAside() {
        let containermodal = document.querySelector(".modal-result");
        let padre = containermodal.parentNode;
        padre.removeChild(containermodal);
        buttonsEvents();
    }

    async function removeImg() {
        let containerImg = document.querySelector("#container-img");
        let inputImg = document.querySelector(".imgDestination");
        inputImg = inputImg.getAttribute("src");
        containerImg.innerHTML = `<input type="hidden" name="deleteImg" value="${inputImg}">`;
    }
});