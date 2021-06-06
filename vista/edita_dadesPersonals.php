
<style>
/*
.guarda {
    transition: 0.4s;
    font-size: 20px;
    background: transparent;
    border: none;
    cursor: pointer;
}

input {
    border: 1px solid black;
    padding: 0.5em;
    background: transparent;
}

.guarda:hover {
    font-size: 22px;
}
*/
</style>

<?php
/*
    if(isset($_SESSION['usuari_id'])){
            
        $id = $_SESSION['usuari_id'];
    }

    // Agafem dades del usuari que té la sessió iniciada
    $consulta = "SELECT * FROM usuari WHERE id = ".$id."";

    $consulta_res = $bd->query($consulta);

    $info = $consulta_res->fetch_all(MYSQLI_ASSOC);
*/
?>

<div>

    <!--<form class="act_dades" action="/XLC/index.php?accio=act_dadesPersonals" method="post">


        <h4>Nom d'usuari</h4>
        <input class="inputNom" type="text" name="nom" value="<?php //echo $info[0]["nom"]; ?>"><br><br>

        <h4>Correu electrònic</h4>
        <input class="inputCorreu" type="text" name="correu" value="<?php //echo $info[0]['correu']; ?>"><br><br>

        <h4>Contrasenya actual</h4>
        <input class="inputPass" type="text" name="passAct" value="" placeholder="***********"><br><br>

        <h4>Contrasenya nova</h4>
        <input class="inputPass1" id="pass1_id" type="text" name="pass1" value=""><br><br>
        
        <h4>Repeteix la contrasenya nova</h4>
        <input class="inputPass2" type="text" name="pass2" value=""><br><br>
    
        <button type="submit" class="guarda">Guarda els canvis</button>
    
    </form>

</div>-->
    
<script>

    /*jQuery(document).ready(function(){


        // Validació contrasenyes noves iguals i camps requerits
        jQuery(".act_dades").validate({
            rules: {
                pass2: { equalTo: "#pass1_id" },
            },
            messages: {
                pass2: "Les contrasenyes no coincideixen."
            }
	    });



    })*/


</script>