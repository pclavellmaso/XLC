<?php

    // S'agafen les dades del formulari
    $nom = mysqli_real_escape_string($bd, $_POST['nom']);
    $descripcio = mysqli_real_escape_string($bd, $_POST['descripcio']);
    $preu = mysqli_real_escape_string($bd, $_POST['preu']);
    $stock = mysqli_real_escape_string($bd, $_POST['stock']);
    $descompte = mysqli_real_escape_string($bd, $_POST['descompte']);
    $imatge = mysqli_real_escape_string($bd, $_POST['imatge']);
    $categoria_id = mysqli_real_escape_string($bd, $_POST['categoria']);
    $negoci_id = $_SESSION['usuari_id'];
    
    // Es prepara la consulta
    $consulta = "INSERT INTO producte (nom, descripcio, preu, stock, descompte, imatge, categoria_id, negoci_id) VALUES('$nom', '$descripcio', '$preu', '$stock', '$descompte', '$imatge', '$categoria_id', '$negoci_id')";
    
    // S'executa la consulta i es registra el producte a la BD
    $res = $bd->query($consulta);
    //$boolea = $cons->execute();
    if ($res) {
        $_SESSION['insert'] = 'yes'; 
    }
    
    header('location: index.php?accio=perfil');
     
?>