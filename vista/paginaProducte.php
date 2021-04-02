<?php include('header.php'); ?>

<style>

.prodFlex {
    display: flex;
}

.esquerre {
    flex: 0 0 34%;
}

img {
    width: 100%;
}

.esquerre {
    flex: 0 0 21%;
    height: 400px;
    overflow: hidden;
}

.prodFlex {
    padding-top: 60px;
}

.dreta {
    margin-left: 50px;
}

.info_nom {
    font-weight: bold;
}

.info_preu {
    font-weight: bold;
}

</style>

<?php 

    $id = $_GET['id'];

    $cons_prod = "SELECT p.id, p.nom, p.descripcio, p.preu, p.imatge, p.descompte, c.nom_categoria FROM producte p, categoria c WHERE p.id = '$id' and c.id = p.categoria_id";
    $res_prod = $bd->query($cons_prod);
    $data_prod = $res_prod->fetch_all(MYSQLI_ASSOC);

?>

<div class="continut">


    <div class="prodFlex">

        <div class="esquerre">
            <img src="/XLC/vista/img/<?php echo $data_prod[0]['imatge']; ?>" alt="">
        </div>

        <div class="dreta">
            <div class="info">
                <p class="info_nom"><?php echo $data_prod[0]['nom']; ?></p>
                <p class="info_cate"><?php echo $data_prod[0]['nom_categoria']; ?></p>
                <p class="info_descripcio"><?php echo $data_prod[0]['descripcio']; ?></p>
                <p class="info_preu"><?php echo $data_prod[0]['preu']; ?> €</p>
                <p class="info_descompte"><?php echo $data_prod[0]['descompte']; ?> % Rebaixat</p>
            </div>
        </div>

    </div>

    <form action="index.php?accio=afegir_cistella" method="post">
        <input type="text" name ="id_prod" value="<?php echo $data_prod[0]['id']; ?>" hidden>
        <input type="number" min="1" max="15" name ="prod_qty" value="1">
        <button type="submit" class="add">Afegir a la cistella</button>
    </form>


</div>



<?php include('footer.php'); ?>