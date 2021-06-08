<?php

    // Agafem les dades del formulari
    $usuari_id = $_SESSION['usuari_id'];
    $descompte = mysqli_real_escape_string($bd, $_POST['descompte']);
    $data_fi = mysqli_real_escape_string($bd, $_POST['data_fi']);
    
    $ids = explode(',', $_POST['ids']);
    
    // Insertem promoció
    $cons_promo = "INSERT INTO promocio(descompte_add, data_inici, data_fi, negoci_id) VALUES('$descompte', CURDATE(), '$data_fi', '$usuari_id')";
    $bd->query($cons_promo);
    $lastId = $bd->insert_id;
    
    // Inserim totes les subpromocions (productes inclosos)
    foreach($ids as $id) {
        
        $cons_prod = "INSERT INTO subpromocio(producte_id, promocio_id) VALUES ('$id', '$lastId')";
        $ok = $bd->query($cons_prod);
    }

    if ($ok) {
        $_SESSION['new_promo'] = "";
    }

    header('location: /XLC/index.php?accio=perfil');
?>