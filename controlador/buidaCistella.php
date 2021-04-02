<?php

    if (isset($_SESSION['cistella']['prods'])) {
        unset($_SESSION['cistella']['prods']);
        $_SESSION['cistella']['qty'] = 0;
    }

    console_log('epepepep');

    header('location: index.php?accio=perfil_cistella');


?>