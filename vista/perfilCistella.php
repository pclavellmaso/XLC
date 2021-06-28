<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-size: 1em;
}

.wrap_content {
    display: flex;
    margin-top: 2em;
}

h2 {
    padding-top: 2em;
}

.cistella_content {
    display: flex;
    margin-top: 2em;
    width: 70%;
}

.listFlex {
    width: 100%;
    overflow-y: auto;
    z-index: 0;
    position: relative;
    display: flex;
    flex-direction: column;
}

.prodFlex {
    display: flex;
    margin-top: 1em;
    border-radius: 15px;
    margin-bottom: 15px;
    width: 100%;
}

.prodPromoFlex {
    display: flex;
    margin-bottom: 1em;
    align-items: center;
    width: 100%;
}

.promo_titol {
    font-size: 1em;
    font-weight: bold;
    margin-bottom: 10px;
}

.promocio_title {
    width: 40%;
}

.promo_wrap {
    display: flex;
    align-items: center;
    padding: 1em;
    background: rgba(0, 0, 0, 0.1);
    width: 100%;
    flex-direction: column;
}

.promo_wrap_title {
    width: 100%;
    display: flex;
}

.promo_prods {
    display: flex;
    flex-direction: column;
    width: 100%;
}

.promo_content {
    display: flex;
    width: 100%;
}

.promo_info_wrap {
    flex: 0 0 40%;
    padding: 10px;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    margin-left: px;
    align-items: center;
    margin-top: 15px;
}

.promo_info {

}

.promo_prods {
    width: 100%;
}

.prod_dreta {
    display: flex;
    justify-content: space-between;
    width: 100%;
    padding-left: 15px;
    flex-direction: row;
    height: 100%;
}

.prodPromo_dreta {
    display: flex;
    justify-content: space-between;
    width: 100%;
    padding-left: 15px;
    flex-direction: column;
    height: 100%;
}

.foto {
    width: 100px;
    border-radius: 2px;
    position: relative;
}

.nom_prod {
    font-size: 1em;
    font-weight: bold;
}

.nom_neg {
    font-size: 15px;
}

.form_qty {
    margin-right: 10px;
}

.clean {
    margin-top: 25px;
    border: navajowhite;
    font-weight: bold;
    background: #EFA243;
    border-radius: 3px;
    font-size: 13px;
    color: white;
    padding: 15 25 15 25;
    cursor: pointer;
    float: right;
}

.qty_mod {
    background: transparent;
    border: none;
    cursor: pointer;
    text-align: center;
}

.qty {
    text-align: center;
}

.preu {
    font-size: 23px;
    font-weight: bold;
}

.pay_wrap {
    margin-top: 5%;
    margin-left: 80px;
    flex: 0 0 45%;
    font-size: 20;
}

.continuar {
    margin-top: 25px;
    border: navajowhite;
    font-weight: bold;
    background: #B3001B;
    border-radius: 3px;
    font-size: 13px;
    color: white;
    padding: 15 25 15 25;
    cursor: pointer;
    width: 100%;
}

/*.col_info {
    display: flex;
    width: 100%;
}*/

.prod_noms {
    display: inline-block;
    vertical-align: top;
    width: 45%;
}
.prod_preuFinal {
    text-align: right;
}

.qty {
    text-align: center;
    text-align: left;
    display: inline;
    vertical-align: middle;
    padding: 0em 0.5em;
}

.col_prod {
    width: 40%;
}

.prod_img {
    display: flex;
    margin-right: 0.2em;
}

.col_qty, .prod_qty, .promo_qty {
    width: auto;
}

.col_preu, .prod_preu {
    width: 10%;
    margin-left: 1em;
}

.col_descAdd, .prod_desc {
    width: 25%;
}

.prod_preuFinal, .col_subtotal {
    text-align: right;
    width: 12%;
}

.resum_compra {
    width: 30%;
    padding: ;
    background: #FAEADB;
    margin-left: 5em;
    padding: 1em;
    display: flex;
    height: max-content;
    flex-direction: column;
}

.relacionats {
    margin-top: 3em;
}

.form_continuar {
    position: relative;
}

.subtotal {
    margin-top: auto;
    font-size: 1.3em;
}

.titol_resum {
    font-size: 1.6em;
}

.descompte {
    margin-bottom: 0em;
}

.img_nomPromo {
    display:flex;
    flex-wrap: wrap;
    width: 50%;
    width: 46%;
}

.img_nom {
    display:flex;
    flex-wrap: wrap;
    width: 40%;
}

.noms {
    width: 69%;
}

@media screen and (max-width: 768px) {

    .col_descAdd, .prod_desc {
        width: auto;
    }

    .col_preu, .prod_preu {
        width: auto;
    }

    .foto {
        width: 40%;
        border-radius: 1px;
        object-fit: cover;
    }

    .prod_noms {
        padding-left: 0.3em;
    }

    .col_prod, .prod_img {
        display: flex;
        width: 100%;
    }

    p {
        margin-bottom: 0!important;
    }

    .prodFlex {
        margin-bottom: 0px;
        flex-wrap: wrap;
    }

    .nom_prod {
        font-size: 1rem;
    }

    .prod_preuFinal {
        width: auto;
        margin-left: auto;
    }

    .qty {
        width: 100%;
        text-align: center;
    }

    .resum_compra {
        margin-left: 0em;
        width: 100%;
    }

    .clean {
        margin-top: 0px;
        margin-bottom: 1em;
        width: 100%;
    }

    .form_continuar {
        margin-left: 0;
    }

    .continuar, .prod_preu {
        width: 100%;
    }

    p {
        margin-bottom: 0rem;
    }

    .prod_qty {
        width: 35%!important;
        margin: 0.5em 0em;
        display: flex;
    }
}

@media screen and (max-width: 768px) {
    .foto, .img_nom, .prod_noms {
        width: 100%;
    }
    .prodFlex {
        flex-direction: column;
    }
    .img_nom {
        flex-wrap: nowrap;
    }
     
}

</style>


<?php

    include("header.php");

?>



<h2>LA TEVA CISTELLA</h2>

<div class="wrap_content d-block d-xl-flex">

    <div class="cistella_content w-100 w-xl-75">

        <div class="listFlex">

            <div class="col_info d-none d-xl-flex">
                <p class="col_prod">Producte</p>
                <p class="col_qty">Quantitat</p>
                <p class="col_preu">Preu</p>
                <p class="col_descAdd">Descompte addicional</p>
                <p class="col_subtotal">Subtotal</p>
            </div>
            <hr>

            <?php

                if (!isset($_SESSION['cistella']['prods'])) {

                    echo '<h2 style="margin: 1em 0; padding: 0!important;">Afegeix algun ítem a la cistella!</h2>';
                }else {
                
                    $prods = $_SESSION['cistella']['prods'];
                    $subtotal = 0;
                    
                    // Per a cada element de la cistella
                    foreach($prods as $index_prod=>$prod) {

                        // Si és una promoció amb diversos productes
                        if (isset($prod['qty_promo'])) {
                            
                            echo '<div class="promo_wrap">';
                            
                            $promo_articles = $prod['promo_articles'];

                                echo '<div class="promo_wrap_title">

                                    <div class="promocio_title"><p class="promo_titol">Promoció</p></div>

                                    <div class="promo_qty"><form action="index.php?accio=afegir_cistella" method="post">

                                        <input type="text" name="mod_article" value="mod_promo" hidden>
                                        <input type="text" name="index_promo" value="'.$index_prod.'" hidden>
                                        <input type="text" name="id_promo" value="'.$prod['id'].'" hidden>
                                        <input type="text" name="promo_articles" value="'.$promo_articles.'" hidden>
                                        
                                        <button class="qty_mod" name="dec_promo" type="submit"><div><i data-feather="minus-circle"></div></i></button>
                                        <p class="qty">'.$prod['qty_promo'].'</p>
                                        <button class="qty_mod" name="inc_promo" type="submit"><i data-feather="plus-circle"></i></button>
                                    
                                    </form></div>

                                    <div class="prod_preu"></div>

                                    <div class="prod_desc">'.$prod['descompte'].'%</div>';

                                    $preuNoDescPromo = 0;
                                    foreach($prod as $element) {
                                        if (gettype($element) == 'array') {
                                            $preuNoDescPromo += $element['preu'];
                                        }
                                    }
                                    // Tenim en compte la quantitat de promocions
                                    $preuNoDescPromo *= $prod['qty_promo'];
                                    $preuDescPromo *= $prod['qty_promo'];

                                    $preuDescPromo = $preuNoDescPromo - ($preuNoDescPromo * ($prod['descompte']/100));

                                    echo '<div class="prod_preuFinal"><span style="text-decoration: line-through;">'.$preuNoDescPromo.' € </span>'.$preuDescPromo.' €</div>

                                </div>';

                                $preu_total = 0;
                                foreach($prod as $element) {
                                    
                                    if (gettype($element) == 'array') {
                                        
                                        $neg_id = $element['negoci_id'];
                                        // Agafem el nom del negoci per mostrar-lo
                                        $cons_negoci = "SELECT n.nom FROM negoci n WHERE n.id = ".$neg_id."";
                                        $res_negoci = $bd->query($cons_negoci);
                                        $nom_negoci = $res_negoci->fetch_all(MYSQLI_ASSOC);

                                        echo '<div class="prodPromoFlex">

                                            <a href="index.php?accio=pagina_producte&id='.$element['id'].'" class="img_nomPromo">
                                                <div class="prod_img">
                                                    <img class="foto" src="/XLC/vista/img/'.$element['imatge'].'" alt="">
                                                </div>
                                                <div class="prod_noms">
                                                    <p class="nom_prod">'.ucfirst($element['nom']).'</p>
                                                    <p class="nom_neg">'.ucfirst($nom_negoci[0]['nom']).'</p>
                                                </div>
                                            </a>
                                            
                                            <p class="prod_qty">
                                            </p>

                                            <p class="prod_preu">'.$element['preu'].' €</p>
                                            
                                        </div>';
                                    }
                                } 
                                    
                            echo '</div>';

                            $subtotal += $preuDescPromo;
                        
                        // Si es un producte
                        } else {
                            
                            $neg_id = $prod['negoci_id'];
                            // Agafem el nom del negoci per mostrar-lo
                            $cons_negoci = "SELECT n.nom, n.poblacio FROM negoci n WHERE n.id = ".$neg_id."";
                            $res_negoci = $bd->query($cons_negoci);
                            $nom_negoci = $res_negoci->fetch_all(MYSQLI_ASSOC);

                            if (isset($prod['descompte_add'])) {
                                $preu_prod_final = $prod['preu'] - ($prod['preu'] * ($prod['descompte_add']/100));
                            } else {
                                $preu_prod_final = $prod['preu'] - ($prod['preu'] * ($prod['descompte']/100));
                            }

                            echo '<div class="prodFlex">
                                <a class="img_nom" href="index.php?accio=pagina_producte&id='.$prod['id'].'">
                                    
                                    <div class="prod_img">
                                        <img class="foto" src="/XLC/vista/img/'.$prod['imatge'].'" alt="">
                                    </div>
                                    <div class="prod_noms">
                                        <p class="nom_prod">'.ucfirst($prod['nom']).'</p>
                                        <p class="nom_neg">'.ucfirst($nom_negoci[0]['nom']).'</p>
                                        <p class="poblacio d-none d-xl-block">Manufacturat a '.ucfirst($nom_negoci[0]['poblacio']).'</p>
                                    </div>
                                    
                                </a>

                                <form class="prod_qty" action="index.php?accio=afegir_cistella" method="post">

                                    <input type="text" name="mod_article" value="mod_prod" hidden>
                                    <input type="text" name="index_prod" value="'.$index_prod.'" hidden>
                                    <input type="text" name="id_prod" value="'.$prod['id'].'" hidden>
                                    <button class="qty_mod" name="dec_prod" value="eliminar_prod" type="submit"><div><i data-feather="minus-circle"></div></i></button>';
                                    
                                    // No s'esborra per precaució pero a priori no té sentit/efecte
                                    //if (!isset($prod['prod_qty'])) $prod['prod_qty'] = 1;

                                    echo '<p class="qty">'.$prod['prod_qty'].'</p>
                                    <button class="qty_mod" name="inc_prod" type="submit"><i data-feather="plus-circle"></i></button>
                                </form>';

                                if (isset($prod['descompte']) && $prod['descompte'] > 0) {
                                    
                                    echo '<p class="prod_preu"><span style="text-decoration: line-through;">'.$prod['preu'].' € </span>
                                    <span style="display:block;">'.($prod['preu'] - $prod['preu'] * (($prod['descompte']) / 100)).' €</span></p>';
                                }elseif (isset($prod['descompte_add'])) {
                                    
                                    echo '<p class="prod_preu"><span style="text-decoration: line-through;">'.$prod['preu'].' € </span>
                                    <span style="display:block;">'.($prod['preu'] - $prod['preu'] * (($prod['descompte_add']) / 100)).' €</span></p>';
                                }else {

                                    echo '<p class="prod_preu">'.$prod['preu'].' €</p>';
                                }

                                echo '<div class="prod_desc">';

                                    if (isset($prod['descompte_add'])) {
                                        echo '<span class="descompte">'.$prod['descompte_add'].'% Addicional</span>';
                                    } else {
                                        echo '<span class="descompte">'.$prod['descompte'].'% Per defecte</span>';
                                    }
                                    
                                    if (isset($prod['punts_extra']) && $prod['punts_extra'] > 0) {
                                        $punts_extra = $prod['punts_extra'];
                                    } else {
                                        $punts_extra = 0;
                                    }
                                    echo '<hr>

                                    <!-- Si no s\'aplica cap descompte addicional, guanya el preu * 2 en punts -->
                                    

                                    <p class="descompte">'.$punts_extra.' Punts extra</p>';
                                    if (isset($prod['descompte_add'])) {
                                        
                                        echo '<p class="descompte">'.$prod['punts_aplicats'].' Punts aplicats</p>';
                                    }

                                echo '</div>

                                <p class="prod_preuFinal">'.$preu_prod_final * $prod['prod_qty'].' €</p>

                            </div>
                            <hr>';

                            $subtotal += $preu_prod_final * $prod['prod_qty'];
                            
                        }
                    }
                }   
            ?>
            <?php

                if (isset($_SESSION['cistella']['prods'])) {
                    echo '<form action="index.php?accio=buida_cistella" method="post">
                        <button class="clean" type="submit">NETEJA</button>
                    </form>';
                }
            ?>

        </div><!-- listFlex -->
        
    </div><!-- cistella -->

    <div class="resum_compra">
        
        <h3 class="titol_resum">Resum de la comanda</h3>
        <hr>
        <div class="get_points">

            <?php 

                $punts_compra = 0;
                $punts_extres_totals = 0;
                $punts_aplicats_totals = 0;
                if (isset($_SESSION['cistella']['prods'])) {
                    foreach($prods as $index_prod=>$prod) {

                        $punts_compra += $prod['punts_extra'] - $prod['punts_aplicats'];
                        $punts_extres_totals += $prod['punts_extra'];
                        $punts_aplicats_totals += $prod['punts_aplicats'];
                    }
                    // En tot cas, sempre es guanyen els punts associats a: preu final comanda * 2
                    $punts_compra = ($punts_extres_totals + ($subtotal * 2)) - $punts_aplicats_totals;
                }

                if ($punts_compra <= 0) {
                    $info_punts = '<span>no aconsegueixes punts extres.</span>';
                } else {
                    $info_punts = '<span>pots aconseguir <span style="font-weight: bold;">'.round($punts_compra).'</span> punts extra.</span>';
                }
                

            ?>

            
            <p style="margin:0;"><?php echo $punts_extres_totals; ?> Punts extra totals</p>
            <p><?php echo $punts_aplicats_totals; ?> Punts aplicats totals</p>
            <hr>
            <span>Amb aquesta cistella <?php echo $info_punts; ?>
            <hr>

        </div>
        
        <?php if (isset($prods)) {
                echo '<p class="subtotal">Subtotal '.$subtotal.' €</p>';
        } ?>

        <form class="form_continuar" action="index.php?accio=nova_comanda" method="post">
            <input type="text" name="subtotal" value="<?php echo $subtotal; ?>" hidden>
            <input type="text" name="punts_compra" value="<?php echo $punts_compra; ?>" hidden>
            <button class="continuar" type="submit" <?php if (!isset($_SESSION['cistella']['prods'])) { ?> disabled <?php } ?>>CONTINUAR</button>
        </form>
        
    </div>

</div>

<div class="historial_wrap">

    <div>
       <h1 class="relacionats">Productes comprats anteriorment: </h1>
       <br>
       <br>
       <br>
       <br>
       <br>
       <br>
       <br>
       <br>
    </div>

</div>

<script>
    feather.replace()
</script>

<?php include("footer.php"); ?>