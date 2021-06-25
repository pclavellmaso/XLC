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
    flex-direction: column;
    padding: 1em;
    flex: 0 0 20%;
}

h4 {
    margin-bottom: 0.3em;
}

.prod_img {
    width: 100%;
    border-radius: 2px;
    height: auto;
}

.dreta {
    margin-top: 0.5em;
}

.afegirProducte {
    display: none;
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

.prodFlex:hover .edit_wrap {
    opacity: 1;
}

.back {
    position: relative;
}

.edit_wrap {
    width: 100%;
    height: 100%;
    background: #dfdfdf;
    position: absolute;
    opacity: 0;
    transition: 0.4s;
    z-index: 1;
    border-radius: 2px;
}

.edit_mod, .edit_del {
    padding: 0.5em;
    color: white;
    margin: 0;
    text-align: center;
    cursor: pointer;
    font-weight: 400;
}

.edit_mod {
    background: rgba(239, 162, 67, 0.5);
    color: black;
    transition: 0.4s;
}

.edit_mod:hover {
    background: #EFA243;
    color: white;
}

.edit_del {
    background: rgba(179, 0, 27, 0.5);
    color: black;
    transition: 0.4s;
}

.edit_del:hover {
    background: #B3001B;
    color: white;
}

a {
    transition: 0.4s;
}

.edit_del:hover a {
    color: white!important;
}

.btn_desplega {
    border: none;
    border-radius: 2px;
    width: 100%;
    cursor: pointer;
    padding: 1em;
    margin-bottom: 0!important;
    background: #EFA243;
    color: white;
}

.btn_desplega > h3 {
    margin: 0!important;
    font-size: 1.3em;
}

</style>



<div>

    <?php

        $id = $_SESSION['usuari_id'];

        $consulta = "SELECT distinct p.id, p.nom, c.nom_categoria, p.stock, p.imatge FROM producte p, categoria c, negoci n, usuari u WHERE p.categoria_id = c.id and p.negoci_id = n.usuari_id and n.usuari_id = ".$id."";

        $res = $bd->query($consulta);
        $prods = $res->fetch_all(MYSQLI_ASSOC);
    ?>

    
    <!-- Fer grid nice -->
    <div class="listFlex">

        <?php for ($i = 0; $i < count($prods); $i++) { ?>

            <div class="prodFlex">

                <img class="prod_img" src="/XLC/vista/img/<?php echo $prods[$i]['imatge']; ?>" alt="prod_img"></img>
                <div class="back">
                    <div class="edit_wrap">
                        <p class="edit_mod">Edita</p>
                        <p class="edit_del"><a href="index.php?accio=eliminaProducte&id=<?php echo $prods[$i]['id']; ?>">Elimina</a></p>
                    </div>
                    <div class="dreta">
                        <h4><?php echo ucfirst($prods[$i]['nom']); ?></h4>
                        <h5><?php echo $prods[$i]['nom_categoria']; ?></h5>
                        <h5><?php echo $prods[$i]['stock']; ?> unitats en stock</h5>
                    </div>
                </div>

            </div>

        <?php } ?>

    </div>

    <button class="btn_desplega"><h3>Afegir nou producte al catàleg</h3></button>

    <div class="afegirProducte">
    
        <form method='post' action='index.php?accio=afegir_producte'>
            
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

        jQuery(".btn_desplega").click(function(){
            jQuery(".afegirProducte").toggle(450);
        });

    });

</script>