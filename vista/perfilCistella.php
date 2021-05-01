<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
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
    padding: 5px;
    border-radius: 15px;
    margin-bottom: 15px;
    align-items: center;
}

.promo_titol {
    font-size: 17px;
    font-weight: bold;
    margin-bottom: 10px;
}

.promoFlex {
    border-radius: 15px;
    padding: 10px;
    display: flex;
    padding-left: 15px;
    align-items: center;
}

.promo_prods {
    display: flex;
    flex-direction: column;
    width: 100%;
    padding: 10px;
    border-radius: 15px;
}

.promo_content {
    display: flex;
    box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
    border-radius: 15px;
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
    flex: 0 0 60%;
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

.prod_esq {
    height: 100px;
    overflow: hidden;
    border: ;
    border-radius: 15px;
}

.foto {
    width: 100px;
    border-radius: 5px;
    position: relative;
}

.nom_prod {
    font-size: 20px;
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
}

.col_info {
    display: flex;
    width: 100%;
}

.prod_noms {
    display: inline-block;
    vertical-align: top;
    margin-left: 1em;
}
.prod_preuFinal {
    text-align: right;
}

.qty {
    text-align: center;
    text-align: left;
    display: inline;
    vertical-align: super;
}

.col_prod, .prod_img {
    width: 40%;
}

.col_qty, .prod_qty {
    width: 15%;
}

.col_preu, .prod_preu {
    width: 10%;
}

.col_descAdd, .prod_desc {
    width: 25%;
}

.prod_preuFinal, .col_subtotal {
    text-align: right;
    width: 10%;
}

.resum_compra {
    width: 30%;
    padding: ;
    background: #FAEADB;
    margin-left: 5em;
    padding: 1em;
    display: flex;
    flex-direction: column;
}

.relacionats {
    margin-top: 3em;
}

.form_continuar {
    position: relative;
    margin-left: auto;
}

.subtotal {
    margin-top: auto;
    font-size: 1.3em;
}

.titol_resum {
    font-size: 1.6em;
}

.get_points {
    margin-top: 2em;
}


</style>


<?php

    include("header.php");

?>



<h2>LA TEVA CISTELLA</h2>

<div class="wrap_content">

    <div class="cistella_content">

        <div class="listFlex">

            <div class="col_info">
                <p class="col_prod">Producte</p>
                <p class="col_qty">Quantitat</p>
                <p class="col_preu">Preu</p>
                <p class="col_descAdd">Descompte addicional</p>
                <p class="col_subtotal">Subtotal</p>
            </div>
            <hr>

            <?php

                if (!isset($_SESSION['cistella']['prods'])) {

                    echo '</p>Afegeix algun ítem a la cistella!</p>';
                }else {
                
                    $prods = $_SESSION['cistella']['prods'];
                    $subtotal = 0;
                    
                    // Per a cada element de la cistella
                    foreach($prods as $index_prod=>$prod) {

                        // Si és una promoció amb diversos productes
                        if (isset($prod['qty_promo'])) {
                            
                            echo '<p class="promo_titol">Promoció</p>

                            <div class="promoFlex">

                                <form class="form_qty" action="index.php?accio=afegir_cistella" method="post">
                                        
                                            <input type="text" name="mod_article" value="mod_promo" hidden>
                                            <input type="text" name="index_prod" value="'.$index_prod.'" hidden>
                                            <input type="text" name="index_prod" value="'.$index_prod.'" hidden>
                                            <button class="qty_mod" name="dec_promo" type="submit"><i data-feather="minus-circle"></i></button>
                                            <p class="qty">'.$prod['qty_promo'].'</p>
                                            <button class="qty_mod" name="inc_promo" type="submit"><i data-feather="plus-circle"></i></button>
                                
                                </form>
                                
                                <div class="promo_content">
                                    <div class="promo_prods">';
                                        $preu_total = 0;
                                        foreach($prod as $element) {
                                            
                                            if (gettype($element) == 'array') {
                                                
                                                $neg_id = $element['negoci_id'];
                                                // Agafem el nom del negoci per mostrar-lo
                                                $cons_negoci = "SELECT n.nom FROM negoci n WHERE n.id = ".$neg_id."";
                                                $res_negoci = $bd->query($cons_negoci);
                                                $nom_negoci = $res_negoci->fetch_all(MYSQLI_ASSOC);

                                                echo '<div class="prodPromoFlex">

                                                    <div class="prod_esq">
                                                        <img class="foto" src="/XLC/vista/img/'.$element['imatge'].'" alt="">
                                                    </div>
                            
                                                    <div class="prodPromo_dreta">

                                                        <div class="noms">
                                                            <p class="nom_prod">'.ucfirst($element['nom']).'</p>
                                                            <p class="nom_neg">'.ucfirst($nom_negoci[0]['nom']).'</p>
                                                        </div>
                                                        <div class="preu_desc">
                                                            <p class="preu" style="font-size: 18px;">'.$element['preu'].' €</p>
                                                        </div>
                            
                                                    </div>
                    
                                                </div>';
                                                $preu_total += $element['preu'];
                                            }
                                            
                                        }
                                    echo '</div>';

                                    $preu_final = $preu_total - ($preu_total * ($prod['descompte']/100));


                                    echo '<div class="promo_info_wrap">
                                        <div class="promo_info">
                                            <p class="promo_data">Finalitza el '.$prods[$index_prod]['data_fi'].'</p>
                                            <span class="promo_descompte">Descompte pack del <span class="descompte">'.$prod['descompte'].'%</span></span>
                                            <p class="promo_preu preu">'.$preu_total.' €</p>
                                            <p class="promo_subtotal preu">'.$preu_final.' €</p>
                                        </div>

                                    </div>';

                                    $subtotal += $preu_final;

                                echo '</div>
                                
                            </div>';     
                        
                        // Si es un producte
                        }else {
                            //var_dump($prod);
                            $neg_id = $prod['negoci_id'];
                            // Agafem el nom del negoci per mostrar-lo
                            $cons_negoci = "SELECT n.nom, n.poblacio FROM negoci n WHERE n.id = ".$neg_id."";
                            $res_negoci = $bd->query($cons_negoci);
                            $nom_negoci = $res_negoci->fetch_all(MYSQLI_ASSOC);

                            $preu_prod_final = $prod['preu'] - ($prod['preu'] * ($prod['descompte']/100));

                            echo '<div class="prodFlex">

                                <div class="prod_img">
                                    <img class="foto" src="/XLC/vista/img/'.$prod['imatge'].'" alt="">
                                    <div class="prod_noms">
                                        <p class="nom_prod">'.ucfirst($prod['nom']).'</p>
                                        <p class="nom_neg">'.ucfirst($nom_negoci[0]['nom']).'</p>
                                        <p class="poblacio">Manufacturat a '.ucfirst($nom_negoci[0]['poblacio']).'</p>
                                    </div>
                                </div>

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

                                if (isset($prod['descompte'])) {

                                    echo '<p class="prod_preu"><span style="text-decoration: line-through;">'.$prod['preu'].' € </span><span>'.($prod['preu'] - $prod['preu'] * ($prod['descompte']) / 100).' €</span></p>';
                                }else {

                                    echo '<p class="prod_preu">'.$prod['preu'].' €</p>';
                                }

                                echo '<div class="prod_desc">
                                    <span class="descompte">'.$prod['descompte'].'% Per defecte</span>
                                </div>

                                <p class="prod_preuFinal">'.$preu_prod_final * $prod['prod_qty'].' €</p>

                            </div>
                            <hr>';

                            $subtotal += $preu_prod_final * $prod['prod_qty'];
                            
                        }
                    }
                }   
            ?>

            <form action="index.php?accio=buida_cistella" method="post">
                <button class="clean" type="submit">NETEJA</button>
            </form>

        </div><!-- listFlex -->
        
    </div><!-- cistella -->

    <div class="resum_compra">
        
        <h3 class="titol_resum">Resum de la comanda</h3>
        <hr>
        <div class="get_points">
            <?php 
                $punts_compra = round(($subtotal * 2) / 5) * 5;
            ?>
            <span>Amb aquesta cistella pots aconseguir <span style="font-weight: bold;"><?php echo $punts_compra; ?></span> punts.</span>
        </div>
        
        <?php if (isset($prods)) {
                echo '<p class="subtotal">Subtotal '.$subtotal.' €</p>';
        } ?>

        <form class="form_continuar" action="index.php?accio=nova_comanda" method="post">
            <input type="text" name="subtotal" value="<?php echo $subtotal; ?>" hidden>
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
       <br>
       <br>
       <br>
       <br>
       <br>
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