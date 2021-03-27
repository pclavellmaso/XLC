
<?php
    //Necessari iniciar sessio i incloure bd ja que la pàgina es crida per ajax i no passa per index.php
    session_start();
    include("../model/bd.php");

    if(isset($_SESSION['tipus_usuari'])){
            
        $nom = $_SESSION['nom'];
    }

    // Agafem dades del usuari que té la sessió iniciada
    $consulta = "SELECT * FROM usuari u WHERE u.nom = '$nom' ";

    $consulta_res = $bd->query($consulta);

    $info = $consulta_res->fetch_all(MYSQLI_ASSOC);

?>

<div>

    <form class="act_dades" action="/XLC/index.php?accio=act_dadesPersonals" method="post">


        <h4>Nom d'usuari</h4><br>
        <input class="inputNom" type="text" name="nom" value="<?php echo $info[0]["nom"]; ?>">

        <h4>Correu electrònic</h4><br>
        <input class="inputCorreu" type="text" name="correu" value="<?php echo $info[0]['correu']; ?>">

        <h4>Contrasenya actual</h4><br>
        <input class="inputPass" type="text" name="passAct" value="" placeholder="***********">

        <h4>Contrasenya nova</h4><br>
        <input class="inputPass1" id="pass1_id" type="text" name="pass1" value="">
        <h4>Repeteix la contrasenya nova</h4><br>

        <input class="inputPass2" type="text" name="pass2" value="">
    
        <button type="submit" value="Guarda els canvis">Guarda els canvis</button>
    
    </form>

</div>
    
<script>

    jQuery(document).ready(function(){


        // Validació contrasenyes noves iguals i camps requerits
        jQuery(".act_dades").validate({
            rules: {
                pass2: { equalTo: "#pass1_id" },
            },
            messages: {
                pass2: "Les contrasenyes no coincideixen."
            }
	    });



    })


</script>