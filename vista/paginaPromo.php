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
    background: lightgray;
    padding: 15px;
    font-size: 18px;
    border-radius: 3px;
    margin-left: auto;
    cursor: pointer;
    display: inline;
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
    
    $id_promo = $_POST['id_promo'];

    $cons_promo = "SELECT * FROM promocio p WHERE p.id = '$id_promo'";
    $res_promo = $bd->query($cons_promo);
    $data_promo = $res_promo->fetch_all(MYSQLI_ASSOC);

    $cons_subpromo = "SELECT sp.id, sp.producte_id, sp.promocio_id FROM subpromocio sp, producte p WHERE sp.producte_id = p.id and sp.promocio_id = ".$data_promo[0]['id']."";
    $res_subpromo = $bd->query($cons_subpromo);
    $data_subpromo = $res_subpromo->fetch_all(MYSQLI_ASSOC);

?>

<div class="contingut m-1 m-md-0">

    <div class="promoFlex">

        <p>La promoció finalitza el <?php echo $data_promo[0]['data_fi']; ?></p>
        <p>Té aplicat un descompte del <?php echo $data_promo[0]['descompte_add']; ?>%</p>

        <?php

            echo '<div class="your-class container-fluid">';

                $id_prods = array();
                
                for ($i = 0; $i < count($data_subpromo); $i++) {

                    // Agafem les dades de cada subpromocio (producte)
                    $cons_infoProd = "SELECT * FROM producte p WHERE p.id = ".$data_subpromo[0]['producte_id']."";
                    $res_infoProd = $bd->query($cons_infoProd);
                    $data_infoProd = $res_infoProd->fetch_all(MYSQLI_ASSOC);

                    echo '<div class="prodFlex row">

                        <div class="background d-flex">

                        <div class="col-12 col-md-2">
                            <img src="/XLC/vista/img/'.$data_infoProd[0]["imatge"].'" alt="">
                        </div>

                        <div class="col-12 col-md-10 m-3">
                            <p>'.$data_infoProd[0]["nom"].'</p>
                            <p>'.$data_infoProd[0]["preu"].'</p>
                        </div>

                        </div>
                        
                    </div>';

                    array_push($id_prods, $data_subpromo[$i]['producte_id']);
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
        <button type="submit" class="add">Afegir a la cistella</button>
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