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
        
        <h4>Nom d'usuari</h4><br>
        <p class="inputNom"><?php echo $info[0]["nom"]; ?></p>

        <h4>Correu electrònic</h4><br>
        <p class="inputCorreu"><?php echo $info[0]['correu']; ?></p>

        <h4>Contrasenya</h4><br>
        <p class="inputPass">***********</p>


        <!--AJAX FILE--><!--<div class="chPass">

                <h4>Contrasenya actual</h4><br>
                <input class="inputText" type="text" name="pass" value="">

                <h4>Contrasenya nova</h4><br>
                <input class="inputText" type="text" name="pass" value="">

                <h4>Confirma la contrasenya nova</h4><br>
                <input class="inputText" type="text" name="pass" value="">

        </div>-->

        <button class="btn">Edita</button>
        
    </div>

</div>

<script>

    jQuery(document).ready(function(){

        jQuery(".btn").click(function(){

            jQuery(".dades").load("/XLC/vista/edita_dadesPersonals.php")

        })          

    })


</script>