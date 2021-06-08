<?php

    $promo_id = $_POST['promo_id'];

    $eliminar_subpromos_cons = "DELETE FROM subpromocio WHERE promocio_id = ".$promo_id."";
    $bd->query($eliminar_subpromos_cons);

    $eliminar_cons = "DELETE FROM promocio WHERE id = ".$promo_id."";
    $bd->query($eliminar_cons);

    // Afegim flag a la sessió per mostrar missatge popup
    $_SESSION['eliminar_promo'] = '';

    header('location: index.php?accio=perfil');

?>