<?php

    if ($_SESSION['cistella']['prods'] == null) {

        $_SESSION['cistella']['prods'] = array();
    }

    $index_prod = $_POST['index_prod'];

    // Cas d'incrementar la quantitat de cert producte
    if ($_POST['mod_prod'] == 'afegir_promo') {
        
        $_SESSION['cistella']['prods'][$index_prod]['qty_promo'] += 1;
        $_SESSION['cistella']['qty'] += 1;
        header('location: index.php?accio=perfil_cistella');
        exit();

    }else if ($_POST['mod_prod'] == 'afegir_prod') {

        $_SESSION['cistella']['prods'][$index_prod]['prod_qty'] += 1;
        $_SESSION['cistella']['qty'] += 1;
        header('location: index.php?accio=perfil_cistella');
        exit();
    }
        
    

    // Cas de decrementar la quantitat de cert producte
    if ($_POST['mod_prod'] == 'eliminar_promo') {

        //$index_prod = $_POST['index_prod'];

        if ($_SESSION['cistella']['prods'][$index_prod]['qty_promo'] == 1) {
            unset($_SESSION['cistella']['prods'][$index_prod]);
            $_SESSION['cistella']['qty'] -= 1;
        }else {
            $_SESSION['cistella']['prods'][$index_prod]['qty_promo'] -= 1;
            $_SESSION['cistella']['qty'] -= 1;
        }
        header('location: index.php?accio=perfil_cistella');
        exit();

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

        $id_prods = $_POST['id_prods'];
        $promo_qty = $_POST['promo_qty'];
        $promo_id = $_POST['promo_id'];

        $id_prods = explode(',', $id_prods);

        $promocio = array();

        for ($i = 0; $i < count($id_prods); $i++) {
            
            // Agafem cada producte de la promocio a la base de dades
            $cons_prod = "SELECT * FROM producte p WHERE p.id = ".$id_prods[$i]."";
            $res_prod = $bd->query($cons_prod);
            $data_prod = $res_prod->fetch_all(MYSQLI_ASSOC);
            
            // l'afegim a l'array de la promocio
            array_push($promocio, $data_prod[0]);

        }

        $promocio['qty_promo'] = $promo_qty;
        $promocio['promo_id'] = $promo_id;
        // Afegim tota la promocio amb els subarrays de productes a la sessió, i augmentem el número d'elements de la cistella
        array_push($_SESSION['cistella']['prods'], $promocio);

        $_SESSION['cistella']['qty'] += $promo_qty;

    // Si hem d'afegir un únic producte (control més d'1 unitat)
    }else {

        $cons_prod = "SELECT * FROM producte p WHERE p.id = ".$_POST['id_prod']."";
        $res_prod = $bd->query($cons_prod);
        $data_prod = $res_prod->fetch_all(MYSQLI_ASSOC);

        $data_prod[0]['prod_qty'] = $_POST['prod_qty'];
        array_push($_SESSION['cistella']['prods'], $data_prod[0]); 

        $_SESSION['cistella']['qty'] += $_POST['prod_qty'];


        // de moment redirigeix a inici, revisarr
        header('location: index.php');
        exit();
    }


    header('location: index.php?accio=mur_promos');


?>