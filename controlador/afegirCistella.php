<?php

    if (!isset($_SESSION['cistella']['prods'])) {

        $_SESSION['cistella']['prods'] = array();
    }

    // Bloc de modificar la quantitat de cert article prèviament afegit a la cistella
    if(isset($_POST['mod_article'])) {

        // Si es tracta d'una promoció, incrementem els comptadors de la promoció i dels elements de la cistella
        if ($_POST['mod_article'] == 'mod_promo') {

            // Ens guardem l'index del producte en l'array de $_SESSION['cistella']['prods'] per a poder modificar els seus valors (pe. nombre d'unitats)
            $index_promo = $_POST['index_promo'];
            
            // Cas increment
            if (isset($_POST['inc_promo'])) {
                
                $_SESSION['cistella']['prods'][$index_promo]['qty_promo'] += 1;
                $_SESSION['cistella']['qty'] += $_POST['promo_articles'];
            } elseif (isset($_POST['dec_promo'])) {
                
                // Si actualment només hi ha aquest element, i es borra, esborrar l'array de la sessió
                // i drecrementar nombre d'elements de la cistella
                if ($_SESSION['cistella']['prods'][$index_promo]['qty_promo'] == 1) {
                    unset($_SESSION['cistella']['prods'][$index_promo]);
                    $_SESSION['cistella']['qty'] -= $_POST['promo_articles'];

                // Si n'hi ha més, només decrementar el comptador de la promoció i el nombre d'elements de la cistella
                }else {
                    
                    $_SESSION['cistella']['prods'][$index_promo]['qty_promo'] -= 1;
                    //console_log($_SESSION['cistella']['prods'][$index_prod]['qty_promo']);exit();
                    $_SESSION['cistella']['qty'] -= $_POST['promo_articles'];
                }
            }
            
            header('location: index.php?accio=perfil_cistella');
            exit();

        // Si es tracta d'un producte
        }elseif ($_POST['mod_article'] == 'mod_prod') {

            // Ens guardem l'index del producte en l'array de $_SESSION['cistella']['prods'] per a poder modificar els seus valors (pe. nombre d'unitats)
            $index_prod = $_POST['index_prod'];

            // Cas increment
            if (isset($_POST['inc_prod'])) {

                $_SESSION['cistella']['prods'][$index_prod]['punts_extra'] += 50;

                $_SESSION['cistella']['prods'][$index_prod]['prod_qty'] += 1;
                $_SESSION['cistella']['qty'] += 1;

            // cas decrement
            } elseif (isset($_POST['dec_prod'])) {

                if ($_SESSION['cistella']['prods'][$index_prod]['prod_qty'] == 1) {
                    unset($_SESSION['cistella']['prods'][$index_prod]);
                    $_SESSION['cistella']['qty'] -= 1;
                }else {

                    $_SESSION['cistella']['prods'][$index_prod]['punts_extra'] -= 50;

                    $_SESSION['cistella']['prods'][$index_prod]['prod_qty'] -= 1;
                    $_SESSION['cistella']['qty'] -= 1;
                }
            }
            
            header('location: index.php?accio=perfil_cistella');
            exit();
        }
            
    // Bloc d'afegir a la cistella un article nou
    } else {

        // Si hem d'afegir una promoció amb diversos productes
        if (isset($_POST['promocio'])) {

            // Agafem els ids de les subpromocions (productes) de la promoció
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
            $promocio['promo_articles'] = $_POST['promo_articles'];
            $promocio['promo_id'] = $_POST['promo_id'];
            
            /*$cons_data = "SELECT p.data_fi FROM promocio p WHERE p.id = ".$_POST['promo_id']."";
            $res_data = $bd->query($cons_prod);
            $data = $res_prod->fetch_all(MYSQLI_ASSOC);*/
            
            $promocio['data_fi'] = $_POST['data_fi'];
            $promocio['descompte'] = $_POST['descompte'];

            // Afegim tota la promocio amb els subarrays de productes a la sessió, i augmentem el número d'elements de la cistella
            array_push($_SESSION['cistella']['prods'], $promocio);

            // Incrementem el nombre d'elements de la cistella 
            $_SESSION['cistella']['qty'] += $_POST['promo_articles'];

            $_SESSION['inc_cistella'] = '';
            header('location: index.php?accio=mur_promos');
            exit();

        // Si hem d'afegir un únic producte
        }else {

            // Seleccionem les dades del producte en qüestió de la bd
            $cons_prod = "SELECT * FROM producte p WHERE p.id = ".$_POST['id_prod']."";
            $res_prod = $bd->query($cons_prod);
            $data_prod = $res_prod->fetch_all(MYSQLI_ASSOC);
            
            if (isset($_POST['prod_qty_add'])) {
                $qty = $_POST['prod_qty_add'];
            } else {
                $qty = $_POST['prod_qty'];
            }
            
            // Afegim camp extra a data_prod incloent la quantitat (1 per defecte obv)
            $data_prod[0]['prod_qty'] = $qty;
            
            // Comprovem si el producte ja existeix a la cistella
            for ($i = 0; $i < count($_SESSION['cistella']['prods']); $i++) {

                // Confirmació que l'article sigui un producte (molt cutre, mirant que tingui camp prod_algo xD)
                if (isset($_SESSION['cistella']['prods'][$i]['prod_qty'])) {
                    
                    // Si el producte ja existeix a la cistella, només incrementem la seva quantitat (prod_qty)
                    //A més a més els descomptes addicionals, si en tenen, ha de ser iguals, sinó es tracta com un article individual
                    if ($_SESSION['cistella']['prods'][$i]['id'] == $_POST['id_prod'] && isset($_SESSION['cistella']['prods'][$i]['descompte_add']) && $_SESSION['cistella']['prods'][$i]['descompte_add'] == $_POST['descompte_add']) {

                        $_SESSION['cistella']['prods'][$i]['prod_qty'] += $qty;
                        
                        // Increment numero d'articles de la cistella
                        $_SESSION['cistella']['qty'] += $qty;

                        $_SESSION['inc_cistella'] = '';
                        header('location: index.php?accio=pagina_producte&id='.$_POST['id_prod'].'');
                        exit();
                    }
                }
            }
            // Si arriba fins aquí vol dir que el producte no existeix a la cistella
            
            

            // PSEUDO CALCUL DE PUNTS QUE ES PASSEN X $POST
            //Same shiat (cas de productes amb descompte addicional)
            //$_SESSION['epepep'] = $_POST['desc_final'];

            // Afegim camp extra al resultat (quantitat d'unitats del mateix producte)
            $data_prod[0]['prod_qty'] = $qty;

            //Afegim els punts aplicats i els extra en cas de productes sense descompte per defecte
            //El descompte addicional també
            $data_prod[0]['punts_extra'] = $_POST['punts_extra'];
            $data_prod[0]['punts_aplicats'] = $_POST['punts_aplicats'];
            $data_prod[0]['descompte_add'] = $_POST['descompte_add'];

            // Afegim el producte a la sessió
            array_push($_SESSION['cistella']['prods'], $data_prod[0]);

            // Incrementem el nombre d'elements de la cistella segons el número d'unitats del producte
            $_SESSION['cistella']['qty'] += $qty;
            
            // "Actualitzem la pàgina" (amb el id del mateix producte)
            $_SESSION['inc_cistella'] = '';
            header('location: index.php?accio=pagina_producte&id='.$_POST['id_prod'].'');
            exit();
        }
    }

?>