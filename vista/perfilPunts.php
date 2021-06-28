<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.wrap_slider, .get_points, .use_points {
    margin-top: 3em;
}

.wrap_slider > h2, .get_points > h2, .use_points > h2 {
    margin-bottom: 1em;
}

.wrap_slider {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    width: 90%;
}

.wrap_slider > h2 {
    width: 100%;
}

,.desc_slider {
    display: flex;
    flex-direction: column;
    align-items: center;
    background: white;
    padding: 1em;
    width: 100%;
}

.feather.feather-x-circle {
    vertical-align: sub;
}

.desc_slider > p {
    text-align: center;
    display: inline-block;
    margin-right: 1.3em;
}

.wrap_progress {
    width: 100%;
}

progress {
    width: 100%;
    appearance: none;
    background-color: #EFA243;
    height: 2em;
    border-radius: 2px;
    margin-bottom: 1em;
}


.percent_slider {
    font-size: 1.1em;
}

a:hover {
    color: brown;
}

.img {
    vertical-align: sub;
}

h3 {
    margin-bottom: 1em;
}

</style>


<?php 

    if(isset($_SESSION['tipus_usuari'])){
        
        $id = $_SESSION['usuari_id'];
    }

    // Agafem dades del usuari que té la sessió iniciada
    $consulta = "SELECT * FROM usuari u WHERE u.id = '".$id."' ";

    $consulta_res = $bd->query($consulta);
    $info = $consulta_res->fetch_all(MYSQLI_ASSOC);

?>

<div>
    
    <div class="dades">

        <div class="dashborad">

            <h2>Punts disponibles: <?php echo $info[0]['punts']; ?></h2>
            <h2>Total de punts aconseguits: <?php echo $info[0]['punts_totals']; ?></h2>
            <hr>
            <!--TODO <h3>Punts invertits/gastats: </h3>
            <h3>Estalvi aconseguit amb descomptes: </h3> -->

        </div>
        
        <div class="wrap_slider">

            <?php

                $percentatge = [5, 10, 20, 35];
                $punts_desbl = [50, 100, 200, 350];

                foreach ($punts_desbl as $index => $punts) {
                    if ($info[0]['punts'] >= $punts) {
                        $desc_max = $percentatge[$index];
                    }
                }

                if ($_SESSION['punts_usuari'] < 50) {
                    $estat = '<div style="width: 100%;"><h3>Actualment no arribes a desbloquejar cap descompte</h3></div>';
                } else {
                    $estat = '<div style="width: 100%;"><h3>Actualment pots desbloquejar descomptes de fins a un '.$desc_max.' %</h3></div>';
                }

                echo $estat;

                $cont = 0;
                for ($i = 0; $i < count($percentatge); $i++) {
                    
                    echo '<div class="desc_slider">
                        <p class="percent_slider"><strong>'.$percentatge[$i].'%</strong></p>';
                        
                        if ($info[0]['punts'] >= $punts_desbl[$i]) {

                            echo '<i data-feather="check-circle"></div></i>';
                        } else {
                            
                            echo '<p>'.$punts_desbl[$i].' Punts necessaris</p>
                            <i data-feather="x-circle"></div></i>';
                            
                            if($cont < 1) {
                                $seguent = $punts_desbl[$i];
                            }
                            $cont++;
                        }
                        
                    echo '</div>';
                }

                if ($info[0]['punts'] > 350) {
                    $value = 350;
                } else {
                    $value = $info[0]['punts'];
                }
            ?>
            
            <div class="wrap_progress">
                <progress value="<?php echo $value; ?>" max=<?php echo $seguent; ?>></progress>
                <p><strong><?php echo $seguent - $info[0]['punts']; ?> punts</strong> per aconseguir el següent descompte</p>
            </div>
            
        </div>
        <hr>

        <div class="get_points">
            <h3>Aconsegueix punts</h2>

            <a href=""><p>Visita la secció de Productes i Promocions</p></a>
            <a href=""><p>Confirma l'assistència a un esdeveniment</p></a>
            <a href=""><p>Comparteix en xarxes socials</p></a>
        </div>
        
        <div class="use_points">
            <h3>Treu profit als punts</h2>
            
            <a href=""><p>Aconsegueix descomptes per a entrades d'esdeveniments (Consulta el calendari d'esdeveniments)</p></a>
            <a href=""><p>Sigues el primer en veure els descomptes nous</p></a>
            <a href=""><p>Aplica els punts a l'hora de personalitzar el teu producte</p></a>
        </div>
    
    </div>

</div>

<script>

    jQuery(document).ready(function(){

        jQuery(".edita").click(function(){

            jQuery(".dades").load("/XLC/vista/edita_dadesPersonals.php")

        })
        
        feather.replace()

    })


</script>