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

        let countBtnNext = 1;
        let countBtnBack = 0;
        btnNext.setAttribute('pagination', 3 * countBtnNext);
        btnBack.setAttribute('pagination', 3 * countBtnBack);

        btnNext.addEventListener("click", (e) => {
            e.preventDefault();
            showByPagination(countBtnNext, countBtnBack, btnNext);
        });

        btnBack.addEventListener("click", (e) => {
            e.preventDefault();
            showByPagination(countBtnNext, countBtnBack, btnBack);
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
    async function showByPagination(countBtnNext, countBtnBack, btnPress) {
        let id = btnPress.getAttribute('pagination');
        let comprobationBtn = btnPress.getAttribute('press');

        container.innerHTML = '<div class="pb-3 pt-5"><h1 class="text-center pb-5 mb-5">Cargando...</h1></div></div>';
        let response = await fetch(`pagination/${id}`, {
            method: 'GET'
        });
        let html = await response.text();
        setTimeout(() => {
            container.innerHTML = html;
            if (comprobationBtn == 1) {
                countBtnNext++;
                if (countBtnNext > 2) {
                    countBtnBack++;
                }

            }
            else {
                countBtnNext--;
                if (countBtnBack != 0) {
                    countBtnBack--;
                }
            }
            btnNextNew(countBtnNext, countBtnBack);
        }, 500);

    }

    /* funcion para los botones back y next del paginado
    que se vuelven a generar cada vez que se hace un pedido a la DB */
    function btnNextNew(countBtnNext, countBtnBack) {
        let quantityItems = document.querySelector("#count-items").value;
        let btnNextNew = document.querySelector('#btn-next');
        btnNextNew.setAttribute('pagination', 3 * countBtnNext);
        if (quantityItems < 3) {
            console.log(quantityItems);
            btnNextNew.setAttribute('disabled', "");

        }
        btnNextNew.addEventListener("click", () => {
            showByPagination(countBtnNext, countBtnBack, btnNextNew);

        });
        let btnBackNew = document.querySelector('#btn-back');
        btnBackNew.setAttribute('pagination', 3 * countBtnBack);
        if (countBtnNext == 1 && countBtnBack == 0) {
            btnBackNew.setAttribute('disabled', "");
        } else {
            btnBackNew.addEventListener("click", () => {
                showByPagination(countBtnNext, countBtnBack, btnBackNew);
            });
        }
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