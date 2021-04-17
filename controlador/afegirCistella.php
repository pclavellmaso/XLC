<?php

    if ($_SESSION['cistella']['prods'] == null) {

        $_SESSION['cistella']['prods'] = array();
    }

    // Ens guardem l'index del producte en l'array de $_SESSION['cistella']['prods'] per a poder modificar els seus valors (pe. nombre d'unitats)
    $index_prod = $_POST['index_prod'];

    // Cas d'incrementar la quantitat de cert producte
    // Si es tracta d'una promoció, incrementem els comptadors de la promoció i dels elements de la cistella
    if ($_POST['mod_prod'] == 'afegir_promo') {
        
        $_SESSION['cistella']['prods'][$index_prod]['qty_promo'] += 1;
        $_SESSION['cistella']['qty'] += 1;

        header('location: index.php?accio=perfil_cistella');
        exit();

    // Si es trcta d'un producte, incrementem comptador producte i elements de la cistella
    }else if ($_POST['mod_prod'] == 'afegir_prod') {

        $_SESSION['cistella']['prods'][$index_prod]['prod_qty'] += 1;
        $_SESSION['cistella']['qty'] += 1;

        header('location: index.php?accio=perfil_cistella');
        exit();
    }
        
    // Cas de decrementar la quantitat de certa promoció
    if ($_POST['mod_prod'] == 'eliminar_promo') {

        // Si actualment només hi ha aquest element, i es borra, esborrar l'array de la sessió
        // i drecrementar nombre d'elements de la cistella
        if ($_SESSION['cistella']['prods'][$index_prod]['qty_promo'] == 1) {
            unset($_SESSION['cistella']['prods'][$index_prod]);
            $_SESSION['cistella']['qty'] -= 1;

        // Si n'hi ha més, només decrementar el comptador de la promoció i el nombre d'elements de la cistella
        }else {
            $_SESSION['cistella']['prods'][$index_prod]['qty_promo'] -= 1;
            $_SESSION['cistella']['qty'] -= 1;
        }
        header('location: index.php?accio=perfil_cistella');
        exit();

    // El mateix procediment però per a productes
    }else if ($_POST['mod_prod'] == 'eliminar_prod') {

        if ($_SESSION['cistella']['prods'][$index_prod]['prod_qty'] == 1) {
            unset($_SESSION['cistella']['prods'][$index_prod]);
            $_SESSION['cistella']['qty'] -= 1;
        }else {
            $_SESSION['cistella']['prods'][$index_prod]['prod_qty'] -= 1;
            $_SESSION['cistella']['qty'] -= 1;
        }
        header('location: index.php?accio=perfil_cistella');
        exit();
    }

    // Si hem d'afegir una promoció amb possibles diversos productes
    if (isset($_POST['promocio'])) {

        // Agafem els ids de la promoció i dels seus productes
        $id_prods = $_POST['id_prods'];

        // Creem array amb els ids separats en posicions
        $id_prods = explode(',', $id_prods);

        // Array on es guarden tots els productes de la promoció
        $promocio = array();

        for ($i = 0; $i < count($id_prods); $i++) {
            
            // Agafem cada producte de la promocio a la base de dades
            $cons_prod = "SELECT * FROM producte p WHERE p.id = ".$id_prods[$i]."";
            $res_prod = $bd->query($cons_prod);
            $data_prod = $res_prod->fetch_all(MYSQLI_ASSOC);
            
            // l'afegim a l'array de la promocio
            array_push($promocio, $data_prod[0]);
        }

        // S'afegeixen quatre camps extres en el resultat de la consulta (per al printeig a la pàgina de la cistella)
        $promocio['qty_promo'] = $_POST['promo_qty'];
        $promocio['promo_id'] = $_POST['promo_id'];
        
        $cons_data = "SELECT p.data_fi FROM promocio p WHERE p.id = ".$_POST['promo_id']."";
        $res_data = $bd->query($cons_prod);
        $data = $res_prod->fetch_all(MYSQLI_ASSOC);
        
        $promocio['data_fi'] = $_POST['data_fi'];
        $promocio['descompte'] = $_POST['descompte'];

        // Afegim tota la promocio amb els subarrays de productes a la sessió, i augmentem el número d'elements de la cistella
        array_push($_SESSION['cistella']['prods'], $promocio);

        // Incrementem el nombre d'elements de la cistella 
        $_SESSION['cistella']['qty'] += $_POST['promo_qty'];

    // Si hem d'afegir un únic producte
    }else {

        // Seleccionem les dades del producte en qüestió de la bd
        $cons_prod = "SELECT * FROM producte p WHERE p.id = ".$_POST['id_prod']."";
        $res_prod = $bd->query($cons_prod);
        $data_prod = $res_prod->fetch_all(MYSQLI_ASSOC);

        // Afegim camp extra al resultat (quantitat d'unitats del mateix producte)
        $data_prod[0]['prod_qty'] = $_POST['prod_qty'];

        // Afegim el producte a la sessió
        array_push($_SESSION['cistella']['prods'], $data_prod[0]); 

        // Incrementem el nombre d'elements de la cistella segons el número d'unitats del producte
        $_SESSION['cistella']['qty'] += $_POST['prod_qty'];

        $_SESSION['epepep'] = $_POST['desc_final'];
        // "Actualitzem la pàgina" (amb el id del mateix producte)
        header('location: index.php?accio=pagina_producte&id='.$_POST['id_prod'].'');
        exit();
    }

    header('location: index.php?accio=mur_promos');

?>