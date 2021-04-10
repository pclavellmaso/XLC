<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

img {
    width: 100;
}

.prodFlex {
    padding: 15px;
    display: flex;
    margin-bottom: 100px;
}

.right {
    margin-left: 30px;
}

.promoFlex {
    background: grey;
}

.contingut {
    margin: 100 20 100 20;
}

.promoFlex {
    border-radius: 5px;
}

.add {
    border: none;
    background: lightgray;
    padding: 15px;
    font-size: 18px;
    border-radius: 3px;
    margin-left: auto;
    cursor: pointer;
    display: inline;
}

.altres {
    margin-top: 80px;
}

</style>

<?php include "header.php";?>

<?php
    
    $id_promo = $_POST['id_promo'];

    $cons_promo = "SELECT * FROM promocio p WHERE p.id = '$id_promo'";
    $res_promo = $bd->query($cons_promo);
    $data_promo = $res_promo->fetch_all(MYSQLI_ASSOC);

    $cons_subpromo = "SELECT p.imatge, p.nom, p.preu, p.id FROM subpromocio sp, producte p WHERE sp.producte_id = p.id and sp.promocio_id = ".$data_promo[0]['id']."";
    $res_subpromo = $bd->query($cons_subpromo);
    $data_subpromo = $res_subpromo->fetch_all(MYSQLI_ASSOC);

?>

<div class="contingut">

    <div class="promoFlex">

        <p><?php echo $data_promo[0]['data_fi']; ?></p>
        <p><?php echo $data_promo[0]['descompte_add']; ?>%</p>

        <?php 
        $id_prods = array();
        for ($i = 0; $i < count($data_subpromo); $i++) { ?>


            <div class="prodFlex">

                <div class="left">

                    <img src="/XLC/vista/img/<?php echo $data_subpromo[$i]['imatge']; ?>" alt="">
                </div>

                <div class="right">
                    <p><?php echo $data_subpromo[$i]['nom']; ?></p>
                    <p><?php echo $data_subpromo[$i]['preu']; ?></p>
                </div>
                
            </div>

            

        <?php 
        array_push($id_prods, $data_subpromo[$i]['id']); }
        $id_prods = implode(",", $id_prods); ?>

    </div>

    <form action="index.php?accio=afegir_cistella" method="post">
        <input type="text" name ="id_prods" value="<?php echo $id_prods; ?>" hidden>
        <input type="text" name ="data_fi" value="<?php echo $data_promo[0]['data_fi']; ?>" hidden>
        <input type="text" name ="descompte" value="<?php echo $data_promo[0]['descompte_add']; ?>" hidden>
        <input type="text" name ="promocio" value="promocio" hidden>
        <input type="text" name ="promo_id" value="<?php echo $data_promo[0]['id']; ?>" hidden>
        <input type="number" min="1" max="15" name ="promo_qty" value="1">
        <button type="submit" class="add">Afegir a la cistella</button>
    </form>

    <div class="altres">Productes relacionats etc...</div>

</div>

<script>

    jQuery(".add").click(function() {

        //alert("Afegit correctament! (canviar akesta bullshit)")
    })

</script>
























<?php include "footer.php";?>