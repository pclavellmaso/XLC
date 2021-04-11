<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
.contingut {
    padding: 20px;
    display: flex;
}

.listFlex {
    border-radius: 15px;
    width: 55%;
    box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
    padding: 25px;
    overflow-y: auto;
    z-index: 0;
    position: relative;
}

.prodFlex {
    display: flex;
    padding: 10px;
    box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
    border-radius: 15px;
    margin-bottom: 15px;
    align-items: center;
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

.prodFlex:nth-child(even) {
    padding: 10px;
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
    border-radius: 15px;
    position: relative;
    top: -15px;
    left: -10px;
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

.descompte {
    font-size: 18px;
    color: #B3001B;
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

</style>


<?php

    include("header.php");

?>



<h2>LA TEVA CISTELLA</h2>

<div class="contingut">

    <div class="listFlex">

        <?php

            if (!isset($_SESSION['cistella']['prods'])) {

                echo '</p>Afegeix algun ítem a la cistella!</p>';
            }else {
            
                $prods = $_SESSION['cistella']['prods'];
                $subtotal = 0;
                
                // Per a cada element de la cistella
                foreach($prods as $index_prod=>$prod) {

                    // Si és una promoció (possibles diversos productes)
                    if (isset($prod['qty_promo'])) {
                        
                        echo '<p class="promo_titol">Promoció</p>

                        <div class="promoFlex">

                            <form class="form_qty" action="index.php?accio=afegir_cistella" method="post">
                                    
                                        <input type="text" name="index_prod" value="'.$index_prod.'" hidden>
                                        <button class="qty_mod" name="mod_prod" value="afegir_promo" type="submit"><i data-feather="chevron-up"></i></button>
                                        <p class="qty">'.$prod['qty_promo'].'</p>
                                        <button class="qty_mod" name="mod_prod" value="eliminar_promo" type="submit"><i data-feather="chevron-down"></i></button>
                            
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
                        
                        $neg_id = $prod['negoci_id'];
                        // Agafem el nom del negoci per mostrar-lo
                        $cons_negoci = "SELECT n.nom FROM negoci n WHERE n.id = ".$neg_id."";
                        $res_negoci = $bd->query($cons_negoci);
                        $nom_negoci = $res_negoci->fetch_all(MYSQLI_ASSOC);

                        $preu_prod_final = $prod['preu'] - ($prod['preu'] * ($prod['descompte']/100));

                        echo '<div class="prodFlex">

                            <form class="form_qty" action="index.php?accio=afegir_cistella" method="post">
                                <input type="text" name="index_prod" value="'.$index_prod.'" hidden>
                                <button class="qty_mod" name="mod_prod" value="afegir_prod" type="submit"><div><i data-feather="chevron-up"></div></i></button>
                                <p class="qty">'.$prod['prod_qty'].'</p>
                                <button class="qty_mod" name="mod_prod" value="eliminar_prod" type="submit"><i data-feather="chevron-down"></i></button>
                            </form>

                            <div class="prod_esq">
                                <img class="foto" src="/XLC/vista/img/'.$prod['imatge'].'" alt="">
                            </div>

                            <div class="prod_dreta">

                                <div class="noms">
                                    <p class="nom_prod">'.ucfirst($prod['nom']).'</p>
                                    <p class="nom_neg">'.ucfirst($nom_negoci[0]['nom']).'</p>
                                </div>
                                <div class="preu_desc">
                                    <span>Rebaixat un </span><span class="descompte">'.$prod['descompte'].'%</span>
                                    <p class="preu">'.$prod['preu'].' €</p>
                                    <p class="preu_final">'.$preu_prod_final.' €</p>
                                </div>

                            </div>
                        
                        </div>';

                        $subtotal += $preu_prod_final;
                        
                    }
                }
            }   
        ?>

        <form action="index.php?accio=buida_cistella" method="post">
            <button class="clean" type="submit">NETEJA</button>
        </form>

        <?php if (isset($prods)) {
            echo '<p class="subtotal">Subtotal'.$subtotal.'</p>';
        } ?>

    </div><!-- listFlex -->
    
    <div class="pay_wrap">

        <div class="pay_content">

            <div class="get_points">
                <span>Amb aquesta cistella pots aconseguir <span style="font-weight: bold;">'125'</span> punts!</span>
            </div>
            
            <form action="index.php?accio=nova_comanda" method="post">
                <input type="text" name="subtotal" value="<?php echo $subtotal; ?>" hidden>
                <button class="continuar" type="submit" <?php if (!isset($_SESSION['cistella']['prods'])) { ?> disabled <?php } ?>>CONTINUAR</button>
            </form>

            <div class="show_points">
                <p>Barra de punts amb hover etc</p>
            </div>

        </div>



    </div><!-- pay_wrap -->

</div><!-- contingut -->

<div class="historial_wrap">

    <div>
       <h1>Productes comprats anteriorment: </h1>
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