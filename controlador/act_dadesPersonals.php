<?php
 
    //EN TEORIA tenim la connexió a la bd feta passant per l'index.php
    if(isset($_SESSION['tipus_usuari'])) {
            
        $nomUsuari = $_SESSION['nom'];
        $correuUsuari = $_SESSION['usuari_correu'];
    }


    // Agafem les dades del formulari
    $nom = mysqli_real_escape_string($bd, $_POST['nom']);
    $correu = mysqli_real_escape_string($bd, $_POST['correu']);
    $passAct = mysqli_real_escape_string($bd, $_POST['passAct']);
    $passNova = mysqli_real_escape_string($bd, $_POST['pass1']);
    $passNova2 = mysqli_real_escape_string($bd, $_POST['pass2']);

    // Com a mínim la consulta introduirà el nom i correu (modificats o no, easy mode)
    $consulta = "UPDATE usuari SET nom = '$nom', correu = '$correu' WHERE correu = '$correuUsuari'";

    $cons_pass = "SELECT u.contrasenya FROM usuari u WHERE u.correu = '$correuUsuari'";
    $cons_pass_res = $bd->query($cons_pass);
    $passBd = $cons_pass_res->fetch_all(MYSQLI_ASSOC);
    
    if (!empty($passAct)) {

        $passAct = md5($passAct);

        if($passBd[0]['contrasenya'] == $passAct) {
            $passNova = md5($passNova);
            $consulta = "UPDATE usuari u SET u.nom = '$nom', u.correu = '$correu', u.contrasenya = '$passNova'  WHERE u.correu = '$correuUsuari'";
        }else {
            // Error contrasenyes no coincideixen
            $_SESSION['pass_err'] = 'yes';
            header('location: /XLC/index.php?accio=perfil');
        }

        
    }

    $bd->query($consulta);
    $_SESSION['nom'] = $nom;
    $_SESSION['usuari_correu'] = $correu;
    $_SESSION['dades_mod'] = '';
    
    header('location: /XLC/index.php?accio=perfil');
        
?>