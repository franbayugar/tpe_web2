document.addEventListener("DOMContentLoaded", () => {
    btnNext();
    buttonsEvents();
    let container = document.querySelector("#travel-container");

    function btnNext() {
        let btnNext = document.querySelector('#btn-next');
        let btnBack = document.querySelector('#btn-back');
        btnBack.setAttribute('disabled', '');

        let i = 1;
        let j = 0;
        btnNext.setAttribute('pagination', 3 * i);
        btnBack.setAttribute('pagination', 3 * j);

        btnNext.addEventListener("click", (e) => {
            e.preventDefault();
            showByPagination(i, j, btnNext);
        });

        btnBack.addEventListener("click", (e) => {
            e.preventDefault();
            showByPagination(i, j, btnBack);
        });
    }

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

    async function showByPagination(i, j, btnPress) {
        let id = btnPress.getAttribute('pagination');
        let comprobationBtn = btnPress.getAttribute('press');

        container.innerHTML = '<div class="pb-3 pt-5"><h1 class="text-center">Cargando...</h1></div></div>';
        let response = await fetch(`pagination/${id}`, {
            method: 'GET'
        });
        let html = await response.text();
        setTimeout(() => {
            container.innerHTML = html;
            if (comprobationBtn == 1) {
                i++;
                if (i > 2) {
                    j++;
                }

            }
            else {
                i--;
                if (j != 0) {
                    j--;
                }
            }
            btnNextNew(i, j);
        }, 500);

    }

    function btnNextNew(i, j) {
        let btnNextNew = document.querySelector('#btn-next');
        btnNextNew.setAttribute('pagination', 3 * i);
        btnNextNew.addEventListener("click", () => {
            showByPagination(i, j, btnNextNew);

        });
        let btnBackNew = document.querySelector('#btn-back');
        btnBackNew.setAttribute('pagination', 3 * j);
        if (i == 1 && j == 0) {
            btnBackNew.setAttribute('disabled', "");
        } else {
            btnBackNew.addEventListener("click", () => {
                showByPagination(i, j, btnBackNew);
            });
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