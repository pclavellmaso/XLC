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

    if (isset($passAct)) {

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
    
    header('location: /XLC/index.php?accio=perfil');
        //Si camps contrasenyes buits i camps nom/correu no modificats(mirar com)
            //Fer el canvi en el boto per EDITAR
        
        //Si camp nom esta modificat(mirar com)
            //$nom = input...
            //$modificacions = true 

        //Si camp correu esta modificat(mirar com) && (format correu vàlid)
            //$correu = input... 
            //$modificacions = true

        //Si camp contrasenya_actual != buit
            //Si $contrasenya_nova == $confirma_contrasenya_nova
                //Si md5(contrasenya_actual) == $info_consulta['contrasenya']
                    //Fer update a la bd $bd->query($update)
                //ERROR CONTRASENYA ACTUAL ERRONEA
            //ERROR LES CONTRASENYES NO COINCIDEIXEN
        //

        //if(isset algun dels 3 blocs (nom, correu, contrasenyes))

        //Controlar si hi ha text en els camps de les contrasenyes

            //Fer consulta contrasenya usuari WHERE nom = $_SESSION['nom']
            //Fer md5(passworActual) == 
                //Si coincideix, mirar si les altres dues son iguals
                    //Si ho són, 
                    //Si no ho son validar-ho en directe amb jquery validate plugin
                //Si no, redirigir mateixa pagina amb missatge error o controlar-ho
                // d'alguna altra manera mes comode
        // 

        

?>