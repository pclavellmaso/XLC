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

/* INFO COMPRA */

.info_compra {
    margin-top: 2em;
    padding: 1em;
    border-radius: 5px;
    border: 4px solid rgba(0,0,0, 0.1);
}

.add {
    border: none;
    color: white;
    padding: 1em;
    font-size: 1em;
    border-radius: 2px;
    margin-left: auto;
    position: relative;
    background: #EFA243;
    display: block;
}

.descomptes {
    display: flex;
}

.descompte {
    margin-right: 1.5em;
    font-size: 1.5em;
    font-weight: bold;
    color: rgba(0,0,0, 0.5);
    cursor: pointer;
    transition: 0.4s;
    border: none;
}

.descompte:hover, .descompte:focus {
    color: #EFA243;
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

    <div class="info_compra">

        <?php
            // Codi per temes de variar els descomptes segons el preu o alguna cosa aixi, pq no sempre siguin els mateixos tres
            /*$cons_desc = "SELECT p.descompte, p.preu FROM producte p WHERE p.id = '$id'";
            $res_desc = $bd->query($cons_desc);
            $data_desc = $res_prod->fetch_all(MYSQLI_ASSOC);

            if () {


            }*/
        
        ?>

        <form class="desc_form" action="index.php?accio=afegir_cistella" method="post">
            
            <input type="text" name ="id_prod" value="<?php echo $data_prod[0]['id']; ?>" hidden>
            <input type="number" min="1" max="15" name ="prod_qty" value="1">

            <div class="descomptes">

                <div data-value="5" tabindex="1" class="descompte">5 %</div>
                <div data-value="10" tabindex="1" class="descompte">10 %</div>
                <div data-value="15" tabindex="1" class="descompte">15 %</div>

                <input class="desc_final" name="desc_final" type="text" value="" hidden>
            
            </div>
            
        </form>

        <button class="add" value="ep">Afegir a la cistella</button>

    </div>
    


</div>

<script>

    jQuery(document).ready(function() {

        let value = 0
        jQuery(".descompte").focus(function() {

            value = document.activeElement.dataset.value
        })

        jQuery(".add").click(function() {

            jQuery(".desc_final").val(value)
            jQuery(".desc_form").submit()
        })
        
    })

</script>

<?php include('footer.php'); ?>