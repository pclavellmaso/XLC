<?php

    //if (count($_SESSION['cistella']['prods']) > 0) {
        unset($_SESSION['cistella']['prods']);
    //}
    $_SESSION['cistella']['qty'] = 0;

    $user_id = $_SESSION['usuari_id'];

    if (isset($_COOKIE[$user_id])) {
        setcookie($user_id, false, 1, '/');
    }

    header('location: index.php?accio=perfil_cistella');


?>