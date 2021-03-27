<?php

    // Connexió base de dades
    //include("/XLC/ghmodel/bd.php");

    // Si s'ha donat al submit del login
    if (isset($_POST['login_user'])) {

        // S'agafen les dades del formulari
        $email = mysqli_real_escape_string($bd, $_POST['email']);
        $password = mysqli_real_escape_string($bd, $_POST['password']);
        $tipus_usuari = mysqli_real_escape_string($bd, $_POST['tipus_usuari_log']);


        $password = md5($password);

        if ($tipus_usuari == 'negoci') {

            $_SESSION['login'] = 'login_negoci';
            $query = "SELECT * FROM usuari_negoci WHERE correu='$email' AND contrasenya='$password'";

        } else {
            $_SESSION['login'] = 'login_client';
            $query = "SELECT * FROM usuari_client WHERE correu='$email' AND contrasenya='$password'";
        }

        $result = $bd->query($query);
        $rows = $result->num_rows;
        $info_usuari = $result->fetch_all(MYSQLI_ASSOC);
        print_r($info_usuari);

        if ($rows == 1) {

            $_SESSION['nom'] = $info_usuari[0]['nom'];
            $_SESSION['tipus_usuari'] = $tipus_usuari;
            $_SESSION['usuari_id'] = $info_usuari[0]['id'];

            header('location: index.php');

        } else {
            // Aixo fora i fer quelcom
            $_SESSION['login_inc'] = 'incorrecte';
            
            header('location: index.php?accio=registreLogin');
            //array_push($errors, "Wrong username/password combination");
        }
    }

?>