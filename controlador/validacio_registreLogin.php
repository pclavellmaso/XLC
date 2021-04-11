<?php
    
    // Validació Registre

    if (isset($_POST['reg_user'])) {
        
        // S'agafen les dades del formulari
        $tipus_usuari = mysqli_real_escape_string($bd, $_POST['tipus_usuari_reg']);
        $nom = mysqli_real_escape_string($bd, $_POST['username']);
        $email = mysqli_real_escape_string($bd, $_POST['email']);
        $password_1 = mysqli_real_escape_string($bd, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($bd, $_POST['password_2']);
        
        // Depenenent si l'usuari és de tipus negoci, es recullen les dades addicionals
        if($tipus_usuari == 'negoci') { 
            
            $nom_negoci = mysqli_real_escape_string($bd, $_POST['nom_negoci']);
            $desc_negoci = mysqli_real_escape_string($bd, $_POST['desc_negoci']);
            $poblacio = mysqli_real_escape_string($bd, $_POST['poblacio']);
            $cp = mysqli_real_escape_string($bd, $_POST['cp']);
            $telefon = mysqli_real_escape_string($bd, $_POST['telefon']);
        }
        
        $consulta = "SELECT * FROM usuari u WHERE u.correu = '$email' or u.nom = '$nom'";
        
        $res = $bd->query($consulta);
        
        if($res) { 
            $rows = $res->num_rows;
        }

        if($rows > 0) {
            
            //Error, usuari (correu) ja registrat
            $_SESSION['signin_inc'] = '';
            header('location: index.php?accio=registreLogin');
        
        }else {

            // Si no hi ha cap error, es registra l'usuari a la bd
            
            // Encriptació de la contrasenya abans d'afegir-la a la bd
            $password = md5($password_1);

            // Creació instància usuari
            $consulta = "INSERT INTO usuari(nom, correu, contrasenya, tipus) VALUES('$nom', '$email', '$password', '$tipus_usuari')";

            $bd->query($consulta);

            // Creació instància negoci
            if ($tipus_usuari == 'negoci') {
                
                $consulta_id = "SELECT u.id FROM usuari u WHERE u.correu = '".$email."'";
                $res_id = $bd->query($consulta_id);

                $info = $res_id->fetch_all(MYSQLI_ASSOC);                
                $id = $info[0]['id'];

                $consulta = "INSERT INTO negoci(nom, descripcio, poblacio, cp, telefon, usuari_id) VALUES('$nom_negoci', '$desc_negoci', '$poblacio', '$cp', '$telefon', '$id')";

                $bd->query($consulta);
            }
            
            
            $_SESSION['registre'] = 'registreComplet';
            
            header('location: index.php?accio=registreLogin');
        } 
    }

    // Validació Login

    if (isset($_POST['login_user'])) {

        // S'agafen les dades del formulari
        $email = mysqli_real_escape_string($bd, $_POST['email']);
        $password = mysqli_real_escape_string($bd, $_POST['password']);

        $password = md5($password);

        // Login usuari

        $consulta = "SELECT * FROM usuari WHERE correu='$email' AND contrasenya='$password'";
        $res = $bd->query($consulta);
        
        $rows = $res->num_rows;
        $info_usuari = $res->fetch_all(MYSQLI_ASSOC);

        if ($rows == 1) {

            $_SESSION['nom'] = $info_usuari[0]['nom'];
            $_SESSION['tipus_usuari'] = $info_usuari[0]['tipus'];
            $_SESSION['usuari_id'] = $info_usuari[0]['id'];
            $_SESSION['usuari_correu'] = $info_usuari[0]['correu'];
            $_SESSION['cistella']['qty'] = 0;

            // COOKIE MANAGEMENT
            $user_id = $info_usuari[0]['id'];

            if (isset($_COOKIE[$user_id])) {
        
                $cistella = unserialize($_COOKIE[$user_id]);
                $_SESSION['cistella'] = $cistella;
                $_SESSION['cistella']['qty'] = $cistella['qty'];

            }
            
            
            header('location: index.php');
        
        }else {
            // Si hi ha errors, redirigim a la pàgina de registre/login mostrant missatge d'error
            $_SESSION['login_inc'] = '';
            header('location: index.php?accio=registreLogin');
        }
    }

?>