<?php
require_once ('libs/smarty/libs/Smarty.class.php');

class MainView{
    function showHome($destination, $category){
        $smarty = new Smarty();

        $smarty->assign('destination', $destination);
        $smarty->assign('category', $category);


        $smarty->display('templates/homePage.tpl');
    }

    function showAbout(){
        $smarty = new Smarty();

        $smarty->display('templates/about.tpl');
    }

    function filter($destination, $category, $id){
        $smarty = new Smarty();

        $smarty->assign('destination', $destination);
        $smarty->assign('category', $category);

        $smarty->assign('filterId', $id);


        $smarty->display('templates/homeFilter.tpl');
    }

    function showMore($destination, $id){
        $smarty = new Smarty();

        $smarty->assign('destination', $destination);

        $smarty->assign('itemId', $id);

        $smarty->display('templates/showDetail.tpl');
    }
/*
    function showHome($destination){
        include_once 'templates/header.php';
        include_once 'templates/carousel.php';
        echo '
                <section class="container-md p-5">
                    <div class="row pt-5">
                        <h3 class="text-center pb-5 pt-5 h1">Aprovechá nuestras promociones</h3>
                    </div>
                   ';
                    $i = 0;

        foreach($destination as $place) {
            $newDate = date("d/m/Y", strtotime($place->fecha));
            if($i==0){
                echo '<div class="row">';
            }
            echo '<div class="col-sm">
                <div class="travel-card card w-100 card-border mb-5">
                <img src="img/card01.jpg" class="card-img-top" alt="...">
                <div class="card-body">';
            echo "<h3>$place->destino</h3> 
                  <p class='card-text'>$place->descripcion</p>
                  <p class='card-text'>Precio: $$place->precio</p>
                  <p class='card-text'>Salida: $newDate</p>
                  <a class='btn btn-danger btn-sm' href='showMore/$place->id'>Ver detalles</a>
                  </div>
                </div>
                </div>
                  ";
            $i++;
            if($i==3){
                $i=0;
                echo '</div>';

            }
        }
        echo '</div>
        </section>';

        include_once 'templates/footer.php';
    }
    */
}