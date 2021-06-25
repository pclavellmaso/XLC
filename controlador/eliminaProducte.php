<?php

$id_prod = $_GET['id'];

// Si està inclòs en alguna subpromoció (subarticle de la promoció)
$subpromo = "SELECT * FROM subpromocio WHERE producte_id = ".$id_prod."";
$res = $bd->query($subpromo);
$rows = count($res->fetch_all(MYSQLI_ASSOC));

// Si és el cas, abans d'esborrar el producte de les subpromocions ens quedem amb els ids de les promocions que el contenen
if ($rows > 0) {

    $promo_ids = "SELECT sp.promocio_id FROM subpromocio sp WHERE sp.producte_id = ".$id_prod."";
    $promo_ids = $bd->query($promo_ids);
    $promo_ids = $promo_ids->fetch_all(MYSQLI_ASSOC);

    // Ens quedem amb els id's de les promocions per esborrar-les posteriorment en cas que es quedin només amb un sol producte
    if (count($promo_ids) >= 1) {
        
        for ($i = 0; $i < count($promo_ids); $i++) {

            // Doncs, eliminem les subpromocions que tenen associat aquest producte (restriccions de FK)
            $eliminar_subpromo = "DELETE FROM subpromocio WHERE producte_id = ".$id_prod."";
            $bd->query($eliminar_subpromo);

            // Mirem amb quants elements s'ha quedat cada promoció que el contenia després d'esborrar les subpromocions
            $promo_qty = "SELECT * FROM subpromocio WHERE promocio_id = ".$promo_ids[$i]['promocio_id']."";
            $promo_qty = $bd->query($promo_qty);
            $promo_qty = $promo_qty->fetch_all(MYSQLI_ASSOC);
            $promo_qty = count($promo_qty);

            // Si només li queda un producte, eliminem la promoció
            if (($promo_qty) < 2) {
                $bd->query('SET foreign_key_checks = 0');
                $eliminar_promo = "DELETE FROM promocio WHERE id = ".$promo_ids[$i]['promocio_id']."";
                $bd->query($eliminar_promo);
                $bd->query('SET foreign_key_checks = 1');
            }
        }
    }
} 


// No fem cas de la FK de subcomanda, ens cal per registre de compres dels clients
$bd->query('SET foreign_key_checks = 0');
// Eliminem el producte directament
$eliminar_prod = "DELETE FROM producte WHERE id = ".$id_prod."";
$res = $bd->query($eliminar_prod);
// Activem restricció de nou
$bd->query('SET foreign_key_checks = 1');

if ($res) {
    $_SESSION['eliminar_producte'] = '';
}

header('location: index.php?accio=perfil');

?>