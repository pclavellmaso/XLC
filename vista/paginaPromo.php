<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

img {
    width: 100%;
}

.add {
    border: none;
    color: white;
    padding: 1em;
    font-size: 1em;
    border-radius: 2px;
    background: #EFA243;
    margin-right: auto;
    cursor: pointer;
}

.altres {
    margin-top: 80px;
}

.background {
    background: rgba(0,0,0, 0.1);
    padding: 1em;
}

/* Slick */


.slick-slide {
    height: auto!important;
    padding: 1em;
}

.slick-slide img {
    display: inline!important;
}

.slick-arrow {
    height: 3em;
    align-self: center;
    border: navajowhite;
    background: transparent;
    border: 1px solid;
    padding: 0.5em;
}

.no_afegir {
    background: #EFA243;
    padding: 1em;
    border-radius: 2px;
}

.slick-slider {
    display: flex!important;
}

.slick-prev:before, .slick-next:before {
    content: '←';
    background: lightgray;
    font-size: 35px;
    border-radius: 50%;
    padding: 3px;
}

.title_wrap {
    margin-top: 2em;
}

.title_wrap > p {
    margin: 0.5em;
}

@media (max-width: 767px) {

    .background {
        flex-direction: column;
    }

}

@media (max-width: 414px) {
    
    button.slick-prev.slick-arrow, button.slick-next.slick-arrow {
        display: none!important;
    }

}

</style>


<?php include "header.php";?>

<?php
    
    $id_promo = $_GET['id_promo'];

    $cons_promo = "SELECT * FROM promocio p WHERE p.id = ".$id_promo."";
    $res_promo = $bd->query($cons_promo);
    $data_promo = $res_promo->fetch_all(MYSQLI_ASSOC);

    $cons_subpromo = "SELECT sp.id, sp.producte_id, sp.promocio_id FROM subpromocio sp, producte p WHERE sp.producte_id = p.id and sp.promocio_id = ".$data_promo[0]['id']."";
    $res_subpromo = $bd->query($cons_subpromo);
    $data_subpromo = $res_subpromo->fetch_all(MYSQLI_ASSOC);

?>

<div class="contingut m-1 m-md-0">

    <div class="promoFlex">

        <div class="title_wrap">
            <p><strong>La promoció finalitza el <?php echo $data_promo[0]['data_fi']; ?></strong></p>
            <p><strong>Té aplicat un descompte del <?php echo $data_promo[0]['descompte_add']; ?>%</strong></p>
        </div>
        
        <?php

            echo '<div class="your-class">';

                $id_prods = array();
                $subtotal_promo = 0;
                
                for ($i = 0; $i < count($data_subpromo); $i++) {

                    // Agafem les dades de cada subpromocio (producte)
                    $cons_infoProd = "SELECT * FROM producte p WHERE p.id = ".$data_subpromo[$i]['producte_id']."";
                    $res_infoProd = $bd->query($cons_infoProd);
                    $data_infoProd = $res_infoProd->fetch_all(MYSQLI_ASSOC);

                    echo '<div class="prodFlex row">

                        <div class="background d-flex">

                        <div class="col-12 col-md-2">
                            <img src="/XLC/vista/img/'.$data_infoProd[0]["imatge"].'" alt="">
                        </div>

                        <div class="col-12 col-md-10 m-3">
                            <h4>'.$data_infoProd[0]["nom"].'</h4>
                            <p>'.$data_infoProd[0]["descripcio"].'</p>
                            <p><strong>Preu producte: '.$data_infoProd[0]["preu"].'€</strong></p>
                        </div>

                        </div>
                        
                    </div>';

                    array_push($id_prods, $data_subpromo[$i]['producte_id']);
                    $subtotal_promo += $data_infoProd[0]['preu'];
                }
                $promo_articles = count($id_prods);
                $id_prods = implode(",", $id_prods);

            echo '</div>';

        ?>

    </div>

    <form action="index.php?accio=afegir_cistella" method="post">
        <input type="text" name ="id_prods" value="<?php echo $id_prods; ?>" hidden>
        <input type="text" name ="data_fi" value="<?php echo $data_promo[0]['data_fi']; ?>" hidden>
        <input type="text" name ="descompte" value="<?php echo $data_promo[0]['descompte_add']; ?>" hidden>
        <input type="text" name ="promocio" value="promocio" hidden>
        <input type="text" name ="promo_id" value="<?php echo $data_promo[0]['id']; ?>" hidden>
        <input type="text" name ="promo_qty" value="1" hidden>
        <input type="text" name ="promo_articles" value="<?php echo $promo_articles; ?>" hidden>

        <?php
        
            $preu_final = $subtotal_promo - (($data_promo[0]['descompte_add'] / 100) * $subtotal_promo);
            echo '<p><strong>Preu promoció: '.round($preu_final).'€</strong></p>';

            if (isset($_SESSION['nom'])) {
                echo '<button type="submit" class="add">Afegir a la cistella</button>';
            } else {
                echo '<p class="no_afegir"><strong><a class="strong" href="index.php?accio=registreLogin">Inicia la sessió o registra\'t</a></strong> per afegir productes a la cistella';
            }
        ?>
        
    </form>

    <div class="altres">Productes relacionats etc...</div>

</div>

<script>

    $(document).ready(function(){
        
        jQuery(".add").click(function() {

        //alert("Afegit correctament! (canviar akesta bullshit)")
        })

        $('.your-class').slick();

        feather.replace()

    });

</script>

<?php include "footer.php";?>