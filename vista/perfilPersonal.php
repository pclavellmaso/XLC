<style>

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

<div>

    <h2>Consulta o modifica les teves dades</h2><br>
    
        <!--<h3>Nom</h3>
            <p><?php //echo $info[0]["nom"]; ?></p><br>
        <h3>Correu electrònic</h3>
            <p><?php //echo $info[0]['correu']; ?></p><br>
        <h3>Contrasenya</h3>
            <p><?php //echo $info[0]['contrasenya']; ?></p><br>-->

    <!-- ajax -->
    <!--<a href=''><?php //echo 'EDITAR'; ?></a>-->

    <div class="dades">
        
        <form>

            
            <h4>Nom d'usuari</h4><br>
            <input class="inputText" type="text" name="personal" value="<?php echo $info[0]["nom"]; ?>" readonly>

            <h4>Correu electrònic</h4><br>
            <input class="inputText" type="text" name="personal" value="<?php echo $info[0]['correu']; ?>" readonly>

            <div class="hidePass">

                <h4>Contrasenya</h4><br>
                <input class="inputText" type="text" name="pass" value="***********" readonly>

            </div>

            <div class="chPass">

                    <h3>Canvia la contrasenya</h3>

                    <h4>Contrasenya actual</h4><br>
                    <input class="inputText" type="text" name="pass" value="">
                    <h4>Contrasenya nova</h4><br>
                    <input class="inputText" type="text" name="pass" value="">
                    <h4>Confirma la contrasenya nova</h4><br>
                    <input class="inputText" type="text" name="pass" value="">

                    <span class="cancela">Cancela els canvis</span>

            </div>

        </form>

        <button class="btn">Edita</button>
        
    </div>

</div>

<script>

    jQuery(document).ready(function(){

        jQuery(".btn").click(function(){

            if (jQuery("input").prop('readonly') == true) {

                jQuery("input").prop('readonly', false)
                jQuery("input").addClass('.write')
                jQuery(".btn").html('Guarda')
                jQuery(".chPass").toggle(200)
                jQuery(".hidePass").hide(200)
            }else {

                jQuery("input").prop('readonly', true)
                jQuery("input").removeClass('.write')
                jQuery(".btn").html('Edita')
                jQuery(".hidePass").show(200)
                jQuery(".chPass").hide(200)

                //Si camps contrasenyes buits i camps nom/correu no modificats(mirar com)
                    //Fer el canvi en el boto per EDITAR
                
                //Si camp nom esta modificat(mirar com)
                    //$nom = input...
                    //$modificacions = true 

                //Si camp correu esta modificat(mirar com) && (format correu vàlid)
                    //$correu = input... 
                    //$modificacions = true

                //Si camp contrasenya_actual != buit
                    //Si $contrasenya_nova == $confirma_contrasenya_nova
                        //Si md5(contrasenya_actual) == $info_consulta['contrasenya']
                            //Fer update a la bd $bd->query($update)
                        //ERROR CONTRASENYA ACTUAL ERRONEA
                    //ERROR LES CONTRASENYES NO COINCIDEIXEN
                //

                //if(isset algun dels 3 blocs (nom, correu, contrasenyes))

                //Controlar si hi ha text en els camps de les contrasenyes

                    //Fer consulta contrasenya usuari WHERE nom = $_SESSION['nom']
                    //Fer md5(passworActual) == 
                        //Si coincideix, mirar si les altres dues son iguals
                            //Si ho són, 
                            //Si no ho son validar-ho en directe amb jquery validate plugin
                        //Si no, redirigir mateixa pagina amb missatge error o controlar-ho
                        // d'alguna altra manera mes comode
                // 

                //header('location: index.php?accio=perfil')
            }
        })

        jQuery(".cancela").click(function(){

            jQuery("input").prop('readonly', true)
            jQuery("input").removeClass('.write')
            jQuery(".btn").html('Edita')
            jQuery(".hidePass").show(200)
            jQuery(".chPass").hide(200)

        })

    })


</script>