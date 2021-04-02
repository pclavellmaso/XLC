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

.edita {
    transition: 0.4s;
    font-size: 20px;
    background: transparent;
    border: none;
    cursor: pointer;
}

.edita:hover {
    font-size: 22px;
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

    <div class="dades">
        
        <h4>Nom d'usuari</h4>
        <p class="inputNom"><?php echo $info[0]["nom"]; ?></p><br>

        <h4>Correu electrònic</h4>
        <p class="inputCorreu"><?php echo $info[0]['correu']; ?></p><br>

        <h4>Contrasenya</h4>
        <p class="inputPass">***********</p><br>

        <button class="edita">Edita</button>
        
    </div>

</div>

<script>

    jQuery(document).ready(function(){

        jQuery(".edita").click(function(){

            jQuery(".dades").load("/XLC/vista/edita_dadesPersonals.php")

        })          

    })


</script>