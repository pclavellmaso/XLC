<style>

.comanda_wrap {
    margin-bottom: 1.3em;
}

.balanç {
    float: right;
}

.sup {
    margin-bottom: 0.5em;
}

.comandes_wrap {
    margin-top: 3em;
}

</style>


<?php

    $usuari_id = $_SESSION['usuari_id'];

    $comandes_cons = "SELECT * FROM comanda WHERE usuari_id = ".$usuari_id."";
    $comandes_res = $bd->query($comandes_cons);
    if ($comandes_res) {
        $comandes_data = $comandes_res->fetch_all(MYSQLI_ASSOC);
    }
    
    $puntsT_cons = "SELECT punts_totals FROM usuari WHERE usuari_id = ".$usuari_id."";
    $puntsT_res = $bd->query($puntsT_cons);
    if ($puntsT_res) {
        $puntsT_data = $puntsT_res->fetch_all(MYSQLI_ASSOC);
    }

    echo '<h2> Consulta els detalls de les teves últimes compres</h2>

    <div class="comandes_wrap">';

        if ($comandes_data) {

            foreach ($comandes_data as $index => $comanda) {
            
                if ($comanda['punts_acumulats'] > 0) {
                    $positiu = '+';
                } else {
                    $positiu = '';
                }

                // Consulta de les subcomandes
                $cons_subComandes = "SELECT sc.producte_id FROM subcomanda sc WHERE sc.comanda_id = ".$comanda['id']."";
                $res_subComandes = $bd->query($cons_subComandes);
                
                $data_subComandes = $res_subComandes->fetch_all(MYSQLI_ASSOC);
    
                echo '<div class="comanda_wrap">
                    <div class="sup">
                        <span><strong>'.$comanda["data"].'</strong></span>
                        <span class="balanç">Balanç de punts extra / aplicats: <strong>'.$positiu . $comanda["punts_acumulats"].'</strong></span>
                        <p>Punts totals: <strong>'.$comanda["punts_usr_act"].'</strong></p>
                    </div>';

                    for ($i = 0; $i < count($data_subComandes); $i++) {

                        // Consulta dels productes
                        $cons_producte = "SELECT p.nom, p.preu, p.descompte FROM producte p WHERE p.id = ".$data_subComandes[$i]['producte_id']."";
                        $res_producte = $bd->query($cons_producte);
                        $data_producte = $res_producte->fetch_all(MYSQLI_ASSOC);

                        echo '<ul>
                            <li>'.$data_producte[0]['nom'].' | '.$data_producte[0]['descompte'].'% | '.$data_producte[0]['preu'].'€</li>
                        </ul>';
                    }

                    echo '<div class="inf">
                        <p >Subtotal comanda: <strong>'.$comanda["total"].' €</strong></p>
                        <hr>
                    </div>
                </div>';
            }

        } else {

            echo '<p>Encara no s\'ha realitzat cap compra en aquest compte</p>';
        }

        

    echo '</div>';

?>



