<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}
.contingut {
    padding: 45px;
}

.listFlex {
    margin-top: 45px;
}

.prodFlex {
    display: flex;
    padding: 30px;
    background: grey;
}

.promoFlex {
padding-left: 30px;
background: #626060;
margin-left: ;
}

.prodFlex:nth-child(even) {
    padding: 20px;
    background: lightgrey;
}

.prod_dreta {
    padding: 15px;
}

.foto {
    width: 100px;
}

.clean {
    margin-top: 25px;
}

</style>


<?php include("header.php"); ?>


<div class="contingut">

    <h2>LA TEVA CISTELLA</h2>

    <div class="listFlex">

        <?php

            if (!isset($_SESSION['cistella']['prods'])) {

                echo '</p>Afegeix algun ítem a la cistella!</p>';
            }else {
            
                $prods = $_SESSION['cistella']['prods'];
                
                // Per a cada element de la cistella
                foreach($prods as $index_prod=>$prod) {

                    // Si és una promoció (possibles diversos productes)
                    if(true) {
                        
                        echo '<div class="promoFlex">
                        <p>Promoció</p>';
                        foreach($prod as $element) {
                            
                            if (gettype($element) == 'array') {
                            echo '<div class="prodFlex">

                                <div class="prod_esq">
                                    <img class="foto" src="/XLC/vista/img/'.$element['imatge'].'" alt="">
                                </div>
        
                                <div class="prod_dreta">
        
                                    <p>'.$element['nom'].'</p>
                                    <p>'.$element['preu'].'</p>
        
                                </div>
    
                            </div>';
                            }
                        }
                        echo '<p>Qty: '.$prod['qty_promo'].'</p>
                        <form action="index.php?accio=afegir_cistella" method="post">
                            <input type="text" name="index_prod" value="'.$index_prod.'" hidden>
                            <button name="mod_prod" value="afegir" type="submit">+</button>
                            <button name="mod_prod" value="eliminar" type="submit">-</button>
                        </form>
                        </div>';

                    }else {

                        echo '<div class="prodFlex">

                            <div class="prod_esq">
                                <img class="foto" src="/XLC/vista/img/'.$prod['imatge'].'" alt="">
                            </div>

                            <div class="prod_dreta">

                                <p>'.$prod['nom'].'</p>
                                <p>'.$prod['preu'].'</p>

                            </div>

                        </div>';
                    }
                }
            }   

        ?>

        <form action="index.php?accio=buida_cistella" method="post">
            <button class="clean" type="submit">CLEAN</button>
        </form>     

    </div><!-- listFlex -->

</div><!-- contingut -->



<?php include("footer.php"); ?>