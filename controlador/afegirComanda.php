
<?php

    $array_elements = $_SESSION['cistella']['prods'];

    $subtotal = $_POST['subtotal'];
    $usuari_id = $_SESSION['usuari_id'];
    
    // Afegim comanda a la bd
    $cons_comanda = "INSERT INTO comanda(usuari_id, total, data) VALUES ('$usuari_id', '$subtotal', CURDATE())";
    $bd->query($cons_comanda);
    $comanda_id = $bd->insert_id;


    for ($i = 0; $i < count($array_elements); $i++) {

        if (isset($array_elements[$i]['qty_promo'])) {

            $subtotal = 0;
            console_log($array_elements);
            
            foreach ($array_elements[$i] as $producte) {
                
                if (gettype($producte) == 'array') {

                    $subtotal += $producte['preu'];
                }
            }
            
            $quantitat = $array_elements['qty_promo'];
            $promo_id = $array_elements[$i]['id'];

            // OJU CAMP PRODUCTE ID, SESTA INTRODUINT UNA PROMO, REVISARHO
            $cons_subc = "INSERT INTO subcomanda(quantitat, subtotal, producte_id, comanda_id) VALUES ('$quantitat', '$subtotal', '$promo_id', '$comanda_id')";
            $bd->query($cons_subc);

        }else {

            $quantitat = $array_elements[$i]['prod_qty'];
            $subtotal = $array_elements[$i]['preu'] * $quantitat;
            $prod_id = $array_elements[$i]['id'];
            
            $cons_subc = "INSERT INTO subcomanda(quantitat, subtotal, producte_id, comanda_id) VALUES ('$quantitat', '$subtotal', '$prod_id', '$comanda_id')";
            $bd->query($cons_subc);
        }

    }






    unset($_SESSION['cistella']['prods']);
    $_SESSION['cistella']['qty'] = 0;
?>


<?php header('location: index.php') ?>