<?php

    $array_elements = $_SESSION['cistella']['prods'];

    $subtotal = $_POST['subtotal'];
    $usuari_id = $_SESSION['usuari_id'];
    
    $punts_compra = $_POST['punts_compra'];
    $punts_usr_act = $_SESSION['punts_usuari'] + $punts_compra;

    // Afegim comanda a la bd
    $cons_comanda = "INSERT INTO comanda(usuari_id, total, data, punts_acumulats, punts_usr_act) VALUES (".$usuari_id.", ".$subtotal.", CURDATE(), ".$punts_compra.", ".$punts_usr_act.")";
    $bd->query($cons_comanda);
    $comanda_id = $bd->insert_id;


    for ($i = 0; $i < count($array_elements); $i++) {

        // Si es tracta d'una promoció
        if (isset($array_elements[$i]['qty_promo'])) {

            $subtotal = 0;
            
            foreach ($array_elements[$i] as $producte) {
                
                if (gettype($producte) == 'array') {

                    $subtotal += $producte['preu'];

                    // Actualitzem el numero de productes venuts del negoci en qüestió (el producte està associat a un negoci)
                    $prod_id = $producte['id'];

                    $cons_idNegoci = "SELECT p.negoci_id FROM producte p WHERE p.id = ".$prod_id."";
                    $res_idNegoci = $bd->query($cons_idNegoci);
                    $data_idNegoci = $res_idNegoci->fetch_all(MYSQLI_ASSOC);
                    
                    $id_negoci = $data_idNegoci[0]['negoci_id'];

                    $act_prods = "UPDATE negoci SET productes_venuts=productes_venuts + 1 WHERE id=".$id_negoci."";
                    $bd->query($act_prods);
                }
            }
            
            $quantitat = $array_elements['qty_promo'];
            $promo_id = $array_elements[$i]['id'];

            // OJU CAMP PRODUCTE ID, SESTA INTRODUINT UNA PROMO, REVISARHO
            $cons_subc = "INSERT INTO subcomanda(quantitat, subtotal, producte_id, comanda_id, descompte_aplicat, subtotal_final) VALUES ('$quantitat', '$subtotal', '$promo_id', '$comanda_id')";
            $bd->query($cons_subc);

        // Si es tracta d'un producte
        }else {
            
            if ($array_elements[$i]['descompte_add'] > 0) {
                $descompte_aplicat = $array_elements[$i]['descompte_add'];
            } else {
                $descompte_aplicat = $array_elements[$i]['descompte'];
            }

            $quantitat = $array_elements[$i]['prod_qty'];
            $prod_id = $array_elements[$i]['id'];
            $subtotal = $array_elements[$i]['preu'] - ($array_elements[$i]['preu'] * ($descompte_aplicat / 100));
            $subtotal_final = $subtotal * $quantitat;
            
            $cons_subc = "INSERT INTO subcomanda(quantitat, subtotal, producte_id, comanda_id, descompte_aplicat, subtotal_final) VALUES ('$quantitat', '$subtotal', '$prod_id', '$comanda_id', '$descompte_aplicat', $subtotal_final)";
            $bd->query($cons_subc);

            // Actualitzem el numero de productes venuts del negoci en qüestió (el producte està associat a un negoci)
            $cons_idNegoci = "SELECT p.negoci_id FROM producte p WHERE p.id = ".$prod_id."";
            $res_idNegoci = $bd->query($cons_idNegoci);
            $data_idNegoci = $res_idNegoci->fetch_all(MYSQLI_ASSOC);
            
            $id_negoci = $data_idNegoci[0]['negoci_id'];

            $act_prods = "UPDATE negoci SET productes_venuts=productes_venuts + 1 WHERE id=".$id_negoci."";
            $bd->query($act_prods);
        }

    }

    //Actualitzem punts de la BD  i a la sessió
    $actpunts_cons = "UPDATE usuari SET punts=punts + ".$_POST['punts_compra']." WHERE id=".$_SESSION['usuari_id']."";
    $bd->query($actpunts_cons);

    $_SESSION['punts_usuari'] += $punts_compra;

    //Actualitzem punts totals de la BD
    if ($_POST['punts_compra'] > 0) {
        $actpuntsT_cons = "UPDATE usuari SET punts_totals=punts_totals + ".$_POST['punts_compra']." WHERE id=".$_SESSION['usuari_id']."";
        $bd->query($actpuntsT_cons);
    }
    

    unset($_SESSION['cistella']['prods']);
    $_SESSION['cistella']['qty'] = 0;

    $_SESSION['compra'] = '';
    header('location: index.php')
    
?>