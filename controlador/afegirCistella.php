<?php

    if (!isset($_SESSION['cistella']['prods'])) {

        $_SESSION['cistella']['prods'] = array();
    }

    // Bloc d'incrementar o decrementar la quantitat de cert article prèviament afegit a la cistella
    if(isset($_POST['mod_prod'])) {

        // Cas d'incrementar quantitat
        // Si es tracta d'una promoció, incrementem els comptadors de la promoció i dels elements de la cistella
        if ($_POST['mod_prod'] == 'afegir_promo') {
            
            // Ens guardem l'index del producte en l'array de $_SESSION['cistella']['prods'] per a poder modificar els seus valors (pe. nombre d'unitats)
            $index_prod = $_POST['index_prod'];

            $_SESSION['cistella']['prods'][$index_prod]['qty_promo'] += 1;
            $_SESSION['cistella']['qty'] += 1;

            header('location: index.php?accio=perfil_cistella');
            exit();

        // Si es tracta d'un producte, incrementem comptador producte i elements de la cistella
        }else if ($_POST['mod_prod'] == 'afegir_prod') {

            // Ens guardem l'index del producte en l'array de $_SESSION['cistella']['prods'] per a poder modificar els seus valors (pe. nombre d'unitats)
            $index_prod = $_POST['index_prod'];

            $_SESSION['cistella']['prods'][$index_prod]['prod_qty'] += 1;
            $_SESSION['cistella']['qty'] += 1;

            header('location: index.php?accio=perfil_cistella');
            exit();
        }
            
        // Cas de decrementar quantitat
        // Si es tracta d'una promoció
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

        // Si es tracta d'un producte
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
    // Bloc d'afegir a la cistella un article nou
    } else {

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

            header('location: index.php?accio=mur_promos');
            exit();

        // Si hem d'afegir un únic producte
        }else {

            // Seleccionem les dades del producte en qüestió de la bd
            $cons_prod = "SELECT * FROM producte p WHERE p.id = ".$_POST['id_prod']."";
            $res_prod = $bd->query($cons_prod);
            $data_prod = $res_prod->fetch_all(MYSQLI_ASSOC);
            
            // Afegim camp extra a data_prod incloent la quantitat (1 per defecte obv)
            $data_prod[0]['prod_qty'] = 1;

            // Si la cistella no està buida,
            if ($_SESSION['cistella']['qty'] > 0) {
                
                // Comprovem si el producte ja existeix a la cistella
                for ($i = 0; $i < count($_SESSION['cistella']['prods']); $i++) {

                    // Confirmació que l'article sigui un producte
                    if (isset($_SESSION['cistella']['prods'][$i]['prod_qty'])) {
                        
                        // Si el producte ja existeix a la cistella, només incrementem la seva quantitat (prod_qty)
                        if ($_SESSION['cistella']['prods'][$i]['id'] == $_POST['id_prod']) {

                            $_SESSION['cistella']['prods'][$i]['prod_qty'] += 1;
                            
                            // Increment numero d'articles de la cistella
                            $_SESSION['cistella']['qty'] += 1;

                            header('location: index.php?accio=pagina_producte&id='.$_POST['id_prod'].'');
                            exit();
                            
                        // Si no existeix a la cistella, l'afegim de manera normal a la SESSIÓ/cistella
                        }
                    }
                }
                            
                // Afegim camp extra al resultat (quantitat d'unitats del mateix producte)
                //La linia above es pel cas de que s'afegeixi un producte amb una quantitat mes gran que 1 (de moment només pel cas dels productes amb descompte addicional (botons + -), en un futur ferho tambe pels productes amb descompte per defecte (no addicional))
                //$data_prod[0]['prod_qty'] = $_POST['prod_qty'];

                // Incrementem el nombre d'elements de la cistella segons el número d'unitats del producte
                //Same shiat (en el cas que es pugui incrementar la quantitat en el moment dafegir a la cistella (pagina producte))
                //$_SESSION['cistella']['qty'] += $_POST['prod_qty'];

                //Same shiat (cas de productes amb descompte addicional)
                //$_SESSION['epepep'] = $_POST['desc_final'];

                // Afegim el producte a la sessió
                array_push($_SESSION['cistella']['prods'], $data_prod[0]);

                // Incrementem numero d'articles a la cistella
                $_SESSION['cistella']['qty'] += 1;

                header('location: index.php?accio=pagina_producte&id='.$_POST['id_prod'].'');
                exit();        
                
            // Si la cistella està buida, afegim el producte sense comprovar si ja existeix o no
            } else {
                
                // Afegim camp extra al resultat (quantitat d'unitats del mateix producte)
                //La linia above es pel cas de que s'afegeixi un producte amb una quantitat mes gran que 1 (de moment només pel cas dels productes amb descompte addicional (botons + -), en un futur ferho tambe pels productes amb descompte per defecte (no addicional))
                //$data_prod[0]['prod_qty'] = $_POST['prod_qty'];


                // Incrementem el nombre d'elements de la cistella segons el número d'unitats del producte
                //Same shiat (en el cas que es pugui incrementar la quantitat en el moment dafegir a la cistella (pagina producte))
                //$_SESSION['cistella']['qty'] += $_POST['prod_qty'];

                //Same shiat (cas de productes amb descompte addicional)
                //$_SESSION['epepep'] = $_POST['desc_final'];

                // Afegim el producte a la sessió
                array_push($_SESSION['cistella']['prods'], $data_prod[0]);

                // Incrementem numero d'articles a la cistella   
                $_SESSION['cistella']['qty'] += 1;
            }

            
            
            // "Actualitzem la pàgina" (amb el id del mateix producte)
            header('location: index.php?accio=pagina_producte&id='.$_POST['id_prod'].'');
            exit();
        }
    }

?>