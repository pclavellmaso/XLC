<style>

.content_wrap {
    display: flex;
    flex-direction: column;
}

.chPass {
    display: none;
}

.write {
    border-bottom: 1px solid red;
}

input {
    background-color: transparent;
    border: none;
}

.cancela {
    cursor: pointer;
}

.editaBtn {
    background: #EFA243;
    border: none;
    cursor: pointer;
    color: white;
    padding: 0.7em;
    min-width: 20%;
    font-size: 1.3em;
}

.guarda {
    background: #B3001B;
    border: none;
    cursor: pointer;
    color: white;
    padding: 1em;
    min-width: 20%;
    font-weight: bold;
    float: right;
    display: none;
}

h2 {
    font-size: 1.4em;
}

h4 {
    font-size: 1.2em;
    margin-top: 1.5em;
}

.dades_wrap {
    display: flex;
    justify-content: space-between;
    height: 250px;
}

.edita {
    display: none;
    margin-left: 5em;
}

.edit_secc {
    margin-left: 1.3em;
}

/**/

.act_dades {
    display: flex;
    flex-wrap: wrap;
}

input {
    border: 1px solid black;
    padding: 0.5em;
    background: transparent;
}

.btns {
    margin-top: 5em;
}

.sep {
    height: 100%;
    border-left: 1px solid black;
    width: 1px;
}

</style>


<?php //include('model/bd.php');

    if(isset($_SESSION['tipus_usuari'])){
        
        $nom = $_SESSION['nom'];
    }

    // Agafem dades del usuari que té la sessió iniciada
    $consulta = "SELECT * FROM usuari u WHERE u.nom = '".$nom."' ";

    $consulta_res = $bd->query($consulta);
    $info = $consulta_res->fetch_all(MYSQLI_ASSOC);

?>

<h2><p>Consulta o modifica les teves dades</p></h2>

<div class="content_wrap">

    <div class="dades_wrap">

        <div class="consulta">

            <div class="dades">
                
                <h4>Nom d'usuari</h4>
                <p class="inputNom"><?php echo $info[0]["nom"]; ?></p>

                <h4>Correu electrònic</h4>
                <p class="inputCorreu"><?php echo $info[0]['correu']; ?></p>

                <h4>Contrasenya</h4>
                <p class="inputPass">***********</p><br>

            </div>

        </div>

        <div class="edita">

            <form id="form_edita" class="act_dades" action="/XLC/index.php?accio=act_dadesPersonals" method="post">

                <div class="edit_secc">
                    <h4>Nom d'usuari</h4>
                    <input class="inputNom" type="text" name="nom" value="<?php echo $info[0]["nom"]; ?>">

                    <h4>Correu electrònic</h4>
                    <input class="inputCorreu" type="text" name="correu" value="<?php echo $info[0]['correu']; ?>">
                </div>
                
                <div class="edit_secc">
                    <h4>Contrasenya actual</h4>
                    <input class="inputPass" type="text" name="passAct" value="" placeholder="***********">

                    <h4>Contrasenya nova</h4>
                    <input class="inputPass1" id="pass1_id" type="text" name="pass1" value="">

                    <h4>Repeteix la contrasenya nova</h4>
                    <input class="inputPass2" type="text" name="pass2" value="">
                </div>

            </form>

        </div>

    </div>

    <div class="btns">
        <button class="editaBtn"><span id="edita">Edita</span></button>
        <button type="submit" class="guarda" form="form_edita"><span id="guarda">Guarda els canvis</span></button>
    </div>

</div>


<script>

    jQuery(document).ready(function(){

        let state = 'Edita'

        jQuery(".editaBtn").click(function(){

            jQuery(".edita").toggle('slide', {direction: 'right'}, 1000)
            jQuery(".guarda").toggle('slide', {direction: 'right'}, 500)
            
            state = (state == 'Edita') ? 'Cancela' : 'Edita'
            jQuery("#edita").html(state)
        })

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