<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

h3 {
    font-size: 1em;
    font-weight: bold;
}

/* */

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
    padding: 1em;
    min-width: 20%;
    border-radius: 2px;
    font-size: 1em;
}

.guarda {
    background: #B3001B;
    border: none;
    border-radius: 2px;
    cursor: pointer;
    color: white;
    padding: 1em;
    min-width: 20%;
    float: right;
    display: none;
    font-size: 1em!important;
}

h2 {
    text-align: left;
    margin-bottom: 1em!important;
}

.dades_wrap {
    display: flex;
    justify-content: flex-start;
}

.dades {
    display: flex;
    flex-wrap: wrap;
}

.edita {
    border: 1px solid brown;
    display: none;
    margin-left: 2em;
    padding: 1em;
}

/**/

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

</style>


<?php include('model/bd.php');

    if(isset($_SESSION)){
        $nom = $_SESSION['nom'];
    }

    $consulta = "SELECT n.nom, n.descripcio, n.poblacio, n.cp, n.telefon FROM negoci n, usuari u WHERE u.id = n.usuari_id and u.nom = '".$nom."'";

    $consulta_res = $bd->query($consulta);

    $info = $consulta_res->fetch_all(MYSQLI_ASSOC);

?>

<h2>Consulta o modifica les teves dades</h2>
<div class="content_wrap">

    <div class="dades_wrap">

        <div class="consulta">

            <div class="dades">
                
                <div class="edit_left">
                    <h4><strong>Nom del Negoci</strong></h4>
                    <p class="dadesUsuari"><?php echo $info[0]["nom"]; ?></p>

                    <h4><strong>Descripció</strong></h4>
                    <p class="dadesUsuari"><?php echo $info[0]['descripcio']; ?></p>

                    <h4><strong>Població</strong></h4>
                    <p class="dadesUsuari"><?php echo $info[0]['poblacio']; ?></p>
                </div>

                <div class="edit_right">
                    <h4><strong>Codi Postal</strong></h4>
                    <p class="dadesUsuari"><?php echo $info[0]['cp']; ?></p>

                    <h4><strong>Telèfon</strong></h4>
                    <p class="dadesUsuari"><?php echo $info[0]['telefon']; ?></p>
                </div>

            </div>
            <button class="editaBtn"><span id="edita">Edita</span></button>
        </div>

        <div class="edita">

            <form id="form_edita" class="act_dades" action="/XLC/index.php?accio=act_dadesNegoci" method="post">

                <div class="edit_left">
                    <h4><strong>Nom del negoci</strong></h4>
                    <input class="dadesUsuari" type="text" name="nom" value="<?php echo $info[0]["nom"]; ?>">

                    <h4><strong>Descripció</strong></h4>
                    <textarea style="margin-bottom: 1em;" rows="5" cols="40" name="descripcio"><?php echo $info[0]['descripcio']; ?></textarea>

                    <h4><strong>Població</strong></h4>
                    <input class="dadesUsuari" type="text" name="poblacio" value="<?php echo $info[0]['poblacio']; ?>">
                </div>
                
                <div class="edit_right">

                    <h4><strong>Codi postal</strong></h4>
                    <input class="dadesUsuari" type="text" name="cp" value="<?php echo $info[0]['cp']; ?>">

                    <h4><strong>Telèfon</strong></h4>
                    <input class="dadesUsuari" type="text" name="telefon" value="<?php echo $info[0]['telefon']; ?>">
                </div>

            </form>

            <button type="submit" class="guarda" form="form_edita"><span id="guarda">Guarda els canvis</span></button>
        </div>
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