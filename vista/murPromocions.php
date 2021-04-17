<!--<link rel="stylesheet" href="murPromocions.css">-->

<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

.slick-list.draggable {
    height: 100px;
}

.your-class.slick-initialized.slick-slider {
width: 150px;
}

.llistaFlex {
 margin-top: 100px;
}

.promoFlex {
    display: flex;
    padding: 20px;
    width: 75%;
}

.left {
width: 30%;
}

.promoFlex {
  display: flex;
  padding: 20px;
  width: 75%;
  background-color: grey;
  margin-top: 20px;
  border-radius: 3px;
}


.left {
  width: 30%;
}


.right {
  width: 70%;
}


.right_top {
  display: flex;
}

.capçalera {
 padding-top: 60px;
 text-align: center;
}

.descripcio {
 margin-top: 45px;
 width: 50%;
 /*! text-align: center; */margin-left: auto;
 margin-right: auto;
}



.right_top > div:nth-child(1) > p:nth-child(1) {
  margin: 0;
}


.right_top > div:nth-child(1) > p:nth-child(2) {
  margin: 0;
}


.right_top > div:nth-child(2) {
  margin-right: ;
  margin-left: auto;
}


.right_bottom > div:nth-child(1) > p:nth-child(1) {
  margin: 0;
  margin-top: 20px;
}


.right_bottom > div:nth-child(1) > p:nth-child(2) {
  margin: 0;
}


.right_bottom {
  display: flex;
}


.right_bottom > div:nth-child(2) {
  margin-top: 20px;
  margin-left: auto;
}


.llistaFlex {
  display: flex;
  flex: ;
  flex-direction: column;
  justify-content: ;
  align-content: ;
  align-items: center;
}


.slick-prev.slick-arrow {
  display: inline;
}

.slick-list.draggable {
}

.slick-prev.slick-arrow {
  display: inline-block;
}


.slick-next {
  display: inline-block;
}


.slick-track {
  /* width: 125270000px; */
  width: 100px;
  display: inline;
}


div.slick-slide:nth-child(1) {
  /* width: 17895700px; */
  width: 100px;
}


div.slick-slide:nth-child(2) {
  /* width: 17895700px; */
  width: 100px;
}


div.slick-slide:nth-child(7) {
  /* width: 17895700px; */
  width: 100px;
}


div.slick-slide:nth-child(6) {
  /* width: 17895700px; */
  width: 100px;
}


div.slick-slide:nth-child(5) {
  /* width: 17895700px; */
  width: 100px;
}


div.slick-slide:nth-child(4) {
  /* width: 17895700px; */
  width: 100px;
}


div.slick-slide:nth-child(3) {
  /* width: 17895700px; */
  width: 100px;
}


.slick-slider {
  /* display: block; */
  display: inline;
}

</style>

<?php include "header.php";?>

<?php

    

    $cons_promos = "SELECT distinct p.id, n.nom, p.descompte_add, p.data_fi  FROM promocio p, usuari u, negoci n";
    $res_promos = $bd->query($cons_promos);
    $data_promos = $res_promos->fetch_all(MYSQLI_ASSOC);



?>

<div class="contingut">

    <div class=capçalera>

        <div class="titol_promos">
            <h1>MUR DE PROMOCIONS</h1>
        </div>

        <div class="descripcio">
            <h4>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </h4>
        </div>

    </div>

    <div class="llistaFlex">

        <?php for ($i = 0; $i < count($data_promos); $i++) { ?>

            <?php
            
                $cons_subpromo = "SELECT p.imatge, p.nom, p.preu FROM subpromocio sp, producte p WHERE sp.producte_id = p.id and sp.promocio_id = ".$data_promos[$i]['id']."";
                $res_subpromo = $bd->query($cons_subpromo);

                $data_subpromo = $res_subpromo->fetch_all(MYSQLI_ASSOC);

            ?>

            <div class="promoFlex">

                <div class="left">

                    <div class="carousel">

                        <div class="your-class">

                            <?php for ($k = 0; $k < count($data_subpromo); $k++) { ?>

                                <img src="/XLC/vista/img/<?php echo $data_subpromo[$k]['imatge']; ?>" alt="">
                            <?php } ?>

                        </div>

                    </div>

                </div>

                <div class="right">

                    <div class="right_top">

                        <div>
                            <p><?php echo $data_promos[$i]['nom']; ?></p>

                            <?php

                                $prods = '';
                                $preu = 0;
                                for ($k = 0; $k < count($data_subpromo); $k++) {

                                    $prods .= $data_subpromo[$k]['nom'] . ', ';
                                    $preu += $data_subpromo[$k]['preu'];
                                }

                                // Descompte aplicat al preu total dels productes, no individualment, pensarho un xic
                                $preu_desc = $preu - ($preu * ($data_promos[$i]['descompte_add'] / 100));
                            ?>

                            <p>Inclou: <?php echo $prods; ?></p>

                        </div>

                        <div>
                            COR
                        </div>

                    </div>

                    <div class="right_bottom">

                        <div>
                            <p>Finalitza el <?php echo $data_promos[$i]['data_fi']; ?></p>

                                <?php
                                    $descompte = $data_promos[$i]['descompte_add'];
                                ?>

                            <p>Preu amb descompte (<?php echo $data_promos[$i]['descompte_add']; ?>) : <?php echo $preu_desc; ?> € | Preu antic: <?php echo $preu; ?> €</p>
                        </div>

                        <form action="index.php?accio=pagina_promo" method="post">
                            
                            <input type="text" name="id_promo" value="<?php echo $data_promos[$i]['id']; ?>" hidden>
                            <button type="submit">Veure més</button>
                        
                        </form>

                    </div>

                </div>

            </div>

        <?php } ?>

        

    </div>

</div>

<?php include "footer.php";?>

<script>

    $(document).ready(function(){
        $('.your-class').slick();
    });
	

</script>