<style>

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    .listFlex {
        display: flex;
        flex-wrap: wrap;
        justify-content: flex-start;
    }

    .prodFlex {
        display: flex;
        margin-bottom: 65px;
    }

    .prod_img {
        width: 150px;
        border-radius: 3%;
        height: auto;
    }

    .dreta {
        padding-left: 20px;
    }

    .afegirProducte {
        display: none;
    }

    .desplega {
        margin-top: 60px;
        margin-bottom: 45px;
    }

    input {
        background: transparent;
        border: none;
        border-bottom: 1px solid black;
    }

    /* Amagar fletxes dels input type number*/
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

</style>



<div>

    <?php

        $id = $_SESSION['usuari_id'];

        $consulta = "SELECT * FROM producte p JOIN negoci n on p.negoci_id = n.id JOIN usuari u on n.usuari_id = u.id WHERE u.id = ".$id."";

        $res = $bd->query($consulta);
        $prods = $res->fetch_all(MYSQLI_ASSOC);

    ?>

    
    <!-- Fer grid nice -->
    <div class="listFlex">

        <?php for ($i = 0; $i < count($prods); $i++) { ?>

            <div class="prodFlex">

                <img class="prod_img" src="/XLC/vista/img/<?php echo $prods[$i]['imatge']; ?>" alt="prod_img"></img>
                <div class="dreta">
                    <h4><?php echo $prods[$i]['nom']; ?></h4>
                    <h5><?php echo $prods[$i]['descripcio']; ?></h5>
                    <h5><?php echo $prods[$i]['preu']; ?> €</h5>
                    <h5>Descompte <?php echo $prods[$i]['descompte']; ?> %</h5>
                    <h5>Stock <?php echo $prods[$i]['stock']; ?> unitats</h5>
                    <h5>Categoria <?php echo $prods[$i]['categoria_id']; ?></h5>
                </div>

            </div>

        <?php } ?>

    </div>

    <h3 class="desplega">Afegir productes</h3>

    <div class="afegirProducte">
    
        <form method='post' action='index.php?accio=afegir_producte'>

            <?php// include('model/errors_form.php'); ?>
            
            <div class='camp_prod'>
                <label>Nom del producte</label>
                <input type='text' name='nom'>
            </div>
            
            <div class='camp_prod'>
                <label>Descripció del producte</label>
                <input type='text' name='descripcio'>
            </div>
            
            <div class='camp_prod'>
                <label>Preu</label>
                <input type='text' name='preu'>
            </div>
            
            <div class='camp_prod'>
                <label>Stock disponible</label>
                <input type='text' name='stock'>
            </div>
            
            <?php
                $query = "SELECT c.id, c.nom_categoria FROM categoria c";
                $result = $bd->query($query);
                $categories = $result->fetch_all(MYSQLI_ASSOC);
            ?>

            <div value='categoria'>Categoria</div>
            <select name="categoria">
            <?php console_log(count($categories)); ?>
                <?php for($i=0; $i < count($categories); ++$i) { ?>
                <option value="<?php echo $categories[$i]['id']; ?>"><?php echo $categories[$i]['nom_categoria']; ?></option>
                <?php } ?>
            </select>
            
            <div class='camp_prod'>
                <label>Descompte</label>
                <input type='number' min="0" max="100" name='descompte' value="0">
            </div>
            
            <div class='camp_prod'>
                <label>Selecciona una imatge</label>
                <input type='file' name='imatge'>
            </div>
            
            <div class=''>
                <button type='submit' class='' name='afegir_producte'>Afegir</button>
            </div>
            
        </form>
        
    </div>

</div>

<script>

    jQuery(document).ready(function(){

        jQuery(".desplega").click(function(){
            jQuery(".afegirProducte").toggle();
        });

    });

</script>