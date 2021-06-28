<?php

    // S'agafen les dades del formulari
    $nom = mysqli_real_escape_string($bd, $_POST['nom']);
    $descripcio = mysqli_real_escape_string($bd, $_POST['descripcio']);
    $preu = mysqli_real_escape_string($bd, $_POST['preu']);
    $stock = mysqli_real_escape_string($bd, $_POST['stock']);
    $descompte = mysqli_real_escape_string($bd, $_POST['descompte']);
    $imatge = mysqli_real_escape_string($bd, $_POST['imatge']);
    $categoria_id = mysqli_real_escape_string($bd, $_POST['categoria']);
    
    $cons_negId = "SELECT n.id FROM negoci n WHERE n.usuari_id = ".$_SESSION['usuari_id']."";
    $res_negId = $bd->query($cons_negId);
    $data_negId = $res_negId->fetch_all(MYSQLI_ASSOC);
    
    $negoci_id = $data_negId[0]['id'];
    
    // Es prepara la consulta
    $consulta = "INSERT INTO producte (nom, descripcio, preu, stock, descompte, imatge, categoria_id, negoci_id) VALUES('$nom', '$descripcio', '$preu', '$stock', '$descompte', '$imatge', '$categoria_id', '$negoci_id')";
    
    // S'executa la consulta i es registra el producte a la BD
    $res = $bd->query($consulta);
    //$boolea = $cons->execute();
    if ($res) {
        $_SESSION['insert'] = '';
    }

    header('location: index.php?accio=perfil');
     
?>