document.addEventListener("DOMContentLoaded", () => {
    btnesNextBack();
    buttonsEvents();
    let container = document.querySelector("#travel-container");
    const formSearch = document.querySelector('#form-search');
    formSearch.addEventListener("submit", (e) => {
        e.preventDefault();
        let minPrice = document.querySelector('input[name="precio-min"]').value;
        let maxPrice = document.querySelector('input[name="precio-max"]').value;
        priceFilter(minPrice, maxPrice);
    })
    /* se asignan eventos a lo botones una vez que se carga la pagina*/
    function btnesNextBack() {
        let btnNext = document.querySelector('#btn-next');
        let btnBack = document.querySelector('#btn-back');
        btnBack.setAttribute('disabled', '');

        btnNext.addEventListener("click", (e) => {
            e.preventDefault();
            showByPagination(btnNext);
        });

        btnBack.addEventListener("click", (e) => {
            e.preventDefault();
            showByPagination(btnBack);
        });
    }

    /* botones de filtrado por categoria */
    function buttonsEvents() {
        let botones = document.querySelectorAll('.btn-filter');
        botones.forEach(boton => {
            boton.addEventListener("click", function (e) {
                e.preventDefault();
                let id = this.getAttribute("id");
                showFilter(id);
            });
        });
    }

    /* mostrar filtro */
    async function showFilter(id) {
        container.innerHTML = '<div class="pb-3 pt-5 mt-5 mb-5"><h1 class="text-center mb-5 mt-5 pb-5">Cargando...</h1></div>';
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

    /* funcion para realizar el paginado y controlar los botones*/
    async function showByPagination(btnPress) {
        let btnPagination = btnPress.getAttribute('pagination');
        let comprobationBtn = btnPress.getAttribute('press');

        container.innerHTML = '<div class="pb-3 pt-5"><h1 class="text-center pb-5 mb-5">Cargando...</h1></div></div>';
        let response = await fetch(`pagination/${btnPagination}`, {
            method: 'GET'
        });
        let html = await response.text();
        setTimeout(() => {
            container.innerHTML = html;
            newButtons(btnPagination);
        }, 500);

    }

    /* funcion para los botones back y next del paginado
    que se vuelven a generar cada vez que se hace un pedido a la DB */
    function newButtons(btnPagination) {
        let quantityItems = document.querySelector("#count-items").value;
        let btnNextNew = document.querySelector('#btn-next');
        let btnBackNew = document.querySelector('#btn-back');

        if (quantityItems < 3) {
            btnNextNew.setAttribute('disabled', "");
        }
        if (btnPagination < 3) {
            btnBackNew.setAttribute('disabled', "");
        }
        btnNextNew.addEventListener("click", () => {
            showByPagination(btnNextNew);
        });
        btnBackNew.addEventListener("click", () => {
            showByPagination(btnBackNew);
        });
    }

    /* funcion para el boton de ver todos los productos */
    function buttonSeeAll() {
        setTimeout(() => {
            let btnSeeAll = document.querySelector('.btn-all');
            btnSeeAll.addEventListener('click', () => {
                showFilter(btnSeeAll.getAttribute("id"));
            });
        }, 500);
    }

    async function priceFilter(minPrice, maxPrice) {

        container.innerHTML = '<div class="pb-3 pt-5 mt-5 mb-5"><h1 class="text-center mb-5 mt-5 pb-5">Cargando...</h1></div>';
        let response = await fetch(`pagination-search/${minPrice}/${maxPrice}`, {
            method: 'GET'
        });
        let html = await response.text();
        setTimeout(() => {
            container.innerHTML = html;
            btnesNextBack();
        }, 500);
    }

});