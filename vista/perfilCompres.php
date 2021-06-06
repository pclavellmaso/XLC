<style>

.comanda_wrap {
    margin-bottom: 1.3em;
}

.balanç {
    float: right;
}

.h3 {
    margin-bottom: 1.5em;
}

.sup {
    margin-bottom: 0.5em;
}

</style>


<?php

    $usuari_id = $_SESSION['usuari_id'];

    $comandes_cons = "SELECT * FROM comanda WHERE usuari_id = ".$usuari_id."";
    $comandes_res = $bd->query($comandes_cons);
    $comandes_data = $comandes_res->fetch_all(MYSQLI_ASSOC);

    echo '<h3 class="h3"> Consulta els detalls de les teves últimes compres</h3>

    <div class="comandes_wrap">';

        foreach ($comandes_data as $index => $comanda) {
            
            if ($comanda['punts_acumulats'] > 0) {
                $positiu = '+';
            } else {
                $positiu = '';
            }

            echo '<div class="comanda_wrap">
                <div class="sup">
                    <span>Comanda realitzada el: '.$comanda["data"].'</span>
                    <span class="balanç">Balanç de punts extra / aplicats: '.$positiu.$comanda["punts_acumulats"].'</span>
                </div>
                <div class="inf">
                    <p >Subtotal comanda: '.$comanda["total"].' €</p>

                </div>
            </div>';
            
        }

    echo '</div>';

?>



