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
    background: #FDFDFD;
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

.afegirProd {
    border: none;
    color: white;
    padding: 1em;
    font-size: 1em;
    border-radius: 2px;
    background: #EFA243;
    margin-right: auto;
    cursor: pointer;
    margin-top: 1em;
}

select, .afegirProd {
    margin-left: 1em;
}

.formFlex {
    margin-top: 2em;
    display: flex;
}

.camp_prod {
    margin: 1em 0;
    padding: 1em;
}

.formTitle {
    margin: 2em 0;
    text-align: left;
}

.newImg {
    width: 100%!important;
    height: auto!important;
}

.newImgWrap {
    width: 25em;
}

</style>

<div>

    <?php

        $id = $_SESSION['usuari_id'];

        $consulta = "SELECT distinct p.id, p.nom, c.nom_categoria, p.stock, p.imatge FROM producte p, categoria c, negoci n, usuari u WHERE p.categoria_id = c.id and p.negoci_id = n.id and n.usuari_id = ".$id."";

        $res = $bd->query($consulta);
        $prods = $res->fetch_all(MYSQLI_ASSOC);
    ?>

    <h1 style="margin-bottom: 1em;">Catàleg actualitzat dels teus productes</h1>

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

        <div class="form_wrap">

            <h2 class="formTitle">Afegeix un nou producte</h2>
        
            <form id="ifFormProd" class="formFlex" method='post' action='index.php?accio=afegir_producte'>    
                
                <div>
                
                    <div class='camp_prod'>
                        <input type='text' name='nom' placeholder="Nom del producte" required>
                    </div>
                    
                    <div class='camp_prod'>
                        <textarea style="margin-bottom: 1em;" rows="5" cols="25" name="descripcio">Descripció del producte</textarea>
                    </div>
                    
                    <div class='camp_prod'>
                        <input type='text' name='preu' placeholder="Preu" required>
                    </div>
                    
                    <div class='camp_prod'>
                        <input type='text' name='stock' placeholder="Stock disponible" required>
                    </div>
                    
                    <?php
                        $query = "SELECT c.id, c.nom_categoria FROM categoria c";
                        $result = $bd->query($query);
                        $categories = $result->fetch_all(MYSQLI_ASSOC);
                    ?>

                    <div class='camp_prod'>
                        <p>Descompte</p>
                        <input type='number' min="0" max="100" name='descompte' value="0" placeholder="Descompte" required>
                    </div>

                    <select name="categoria">
                        <?php for($i=0; $i < count($categories); ++$i) { ?>
                        <option value="<?php echo $categories[$i]['id']; ?>"><?php echo $categories[$i]['nom_categoria']; ?></option>
                        <?php } ?>
                    </select>

                </div>
                
                <div>
                    <div class='camp_prod'>
                        <p>Selecciona una imatge</p>
                        <input type='file' name='imatge' onchange="readURL(this);" required>
                    </div>
                </div>

                <div>
                    <div class="newImgWrap">
                        <img class="newImg" style="opacity: 0;" id="imatgeProd" src="#">
                    </div>
                </div>
                
            </form>

            <button type='submit' form="ifFormProd" class='afegirProd' name='afegir_producte'>Afegir</button>

        </div>
        
    </div>

</div>

<script>
 
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imatgeProd')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            jQuery("#imatgeProd").css('opacity', '1')

            reader.readAsDataURL(input.files[0]);
        }
    }

    jQuery(document).ready(function(){

        jQuery(".btn_desplega").click(function(){

            let $this = jQuery(this);
            $this.toggleClass('See');
            
            if($this.hasClass('See')){
                $this.html('<h3>Cancela</h3>');			
            } else {
                $this.html('<h3>Afegir nou producte al catàleg</h3>');
            }

            jQuery(".afegirProducte").fadeToggle(450);
        });

    });

</script>