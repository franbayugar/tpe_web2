document.addEventListener("DOMContentLoaded", () => {
    btnNext();
    buttonsEvents();
    let container = document.querySelector("#travel-container");

    function btnNext() {
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

    function buttonSeeAll() {
        setTimeout(() => {
            let btnSeeAll = document.querySelector('.btn-all');
            btnSeeAll.addEventListener('click', () => {
                showFilter(btnSeeAll.getAttribute("id"));
            });
        }, 500);
    }

});