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
    border-radius: 2px;
    cursor: pointer;
    color: white;
    padding: 0.7em;
    min-width: 20%;
    font-size: 1em;
}

.guarda {
    background: #B3001B;
    border: none;
    border-radius: 2px;
    margin-top: 1em;
    cursor: pointer;
    color: white;
    padding: 1em;
    min-width: 20%;
    font-weight: bold;
    float: right;
    display: none;
}

h2 {
    font-size: 1.5em;
    text-align: left;
    margin-bottom: 1em!important;
}

h4 {
    font-size: 1em;
    margin-bottom: 0.5em!important;
}

.dades_wrap {
    display: flex;
    justify-content: space-between;
    height: 250px;
}

.edita {
    display: none;
    width: 45%;
}

.edit_right {
    margin-left: 1.5em;
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
    margin-top: 1em;
}

.sep {
    height: 100%;
    border-left: 1px solid black;
    width: 1px;
}

.consulta {
    border: 1px solid brown;
    width: 45%;
    padding: 1em;
}

.dadesUsuari {
    margin-bottom: 2em;
}

#form_edita {
    border: 1px solid brown;
    padding: 1em;
}

#guarda {
    font-size: 1em!important;
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

<h2>Consulta o modifica les teves dades</h2>

<div class="content_wrap">

    <div class="dades_wrap">

        <div class="consulta">

            <div class="dades">
                
                <h4><strong>Nom d'usuari</strong></h4>
                <p class="dadesUsuari"><?php echo $info[0]["nom"]; ?></p>

                <h4><strong>Correu electrònic</strong></h4>
                <p class="dadesUsuari"><?php echo $info[0]['correu']; ?></p>

                <h4><strong>Contrasenya</strong></h4>
                <p class="dadesUsuari">***********</p>

            </div>

        </div>

        <div class="edita">

            <form id="form_edita" class="act_dades" action="/XLC/index.php?accio=act_dadesPersonals" method="post">

                <div class="edit_secc">
                    <h4><strong>Nom d'usuari</strong></h4>
                    <input class="dadesUsuari" type="text" name="nom" value="<?php echo $info[0]["nom"]; ?>">

                    <h4><strong>Correu electrònic</strong></h4>
                    <input class="dadesUsuari" type="text" name="correu" value="<?php echo $info[0]['correu']; ?>">
                </div>
                
                <div class="edit_right">
                    <h4><strong>Contrasenya actual</strong></h4>
                    <input class="dadesUsuari" type="text" name="passAct" value="" placeholder="***********">

                    <h4><strong>Contrasenya nova</strong></h4>
                    <input class="dadesUsuari" id="pass1_id" type="text" name="pass1" value="">

                    <h4><strong>Repeteix la contrasenya nova</strong></h4>
                    <input class="dadesUsuari" type="text" name="pass2" value="">
                </div>

                

            </form>

            <button type="submit" class="guarda" form="form_edita"><span id="guarda">Guarda els canvis</span></button>

        </div>

        

    </div>

    <div class="btns">
        <button class="editaBtn"><span id="edita">Edita</span></button>
    </div>

</div>


<script>

    jQuery(document).ready(function(){

        let state = 'Edita'

        jQuery(".editaBtn").click(function(){

            jQuery(".edita").fadeToggle(250)
            jQuery(".guarda").fadeToggle(250)
            
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