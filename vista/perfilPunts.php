<style>

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
}

.desc_slider > p {
    text-align: center;
    margin-right: 3em;
}

.wrap_progress {
    width: 100%;
}

progress {
    width: 100%;
}

.percent_slider {
    font-size: 1.5em;
}

a:hover {
    color: brown;
}

</style>


<?php 

    if(isset($_SESSION['tipus_usuari'])){
        
        $nom = $_SESSION['nom'];
    }

    // Agafem dades del usuari que té la sessió iniciada
    $consulta = "SELECT * FROM usuari u WHERE u.nom = '".$nom."' ";

    $consulta_res = $bd->query($consulta);
    $info = $consulta_res->fetch_all(MYSQLI_ASSOC);

?>

<div>
    
        <div class="dades">

            <div class="dashborad">

                <h2>Punts disponibles: </h2>
                <h3>Total de punts aconseguits: </h3>
                <!--TODO <h3>Punts invertits/gastats: </h3>
                <h3>Estalvi aconseguit amb descomptes: </h3> -->

            </div>
            
            <div class="wrap_slider">

                <h2>Actualment pots desbloquejar descomptes de fins a un <?php ?> %</h2>

                <?php

                    $percentatge = [5, 10, 20, 35];
                    $punts_desbl = [50, 100, 200, 350];

                    for ($i = 0; $i < count($percentatge); $i++) {

                        echo '<div class="desc_slider">
                            <p class="percent_slider">'.$percentatge[$i].'%</p>
                            <p>'.$punts_desbl[$i].' Punts necessaris</p>';
                            if ($_SESSION['punts_usuari'] > $punts_desbl[$i]) {
                                echo '<p>DESBLOQUEJAT</p>';
                            } else {
                                echo '<p>BLOQUEJAT</p>';
                            }
                            
                        echo '</div>';
                    }

                ?>
                
                <div class="wrap_progress">
                    <progress value="<?php echo $_SESSION['punts_usuari']; ?>" max=350></progress>
                    <p>x punts per aconseguir el següent descompte</p>
                </div>
                
            </div>

            <div class="get_points">
                <h2>Aconsegueix punts</h2>

                <a href=""><p>Visita la secció de Productes i Promocions</p></a>
                <a href=""><p>Confirma l'assistència a un esdeveniment</p></a>
                <a href=""><p>Comparteix en xarxes socials</p></a>
            </div>
            
            <div class="use_points">
                <h2>Treu profit als punts</h2>
                
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

    })


</script>