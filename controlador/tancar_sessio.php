<?php

    $cistella = $_SESSION['cistella'];

    setcookie($_SESSION['usuari_id'], serialize($cistella), time() + 21474836, '/');

    session_destroy();
    unset($_SESSION);
    

    header('location: index.php?');

    // Així seria el rollo MVC. El fitxer actual seria el intermig (diria que el model). En un futur ordenar-ho així.
    // El controlador és el que té tota la lògica pura, sense html. El model (aquest) redirigeix a les vistes.
    
    //include(/vista/vista_tancarSessio.php);

?>