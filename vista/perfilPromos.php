<style>

* {
    padding: 0px;
    margin: 0px;
    box-sizing: border-box;
}

.llistaFlex {
    width: 100%;
    border-radius: 5px;
    height: 70vh;
    overflow-y: auto;
    padding-right: 30px;
}

/* width */
.llistaFlex::-webkit-scrollbar {
  width: 2px;
}

/* Track */
.llistaFlex::-webkit-scrollbar-track {
  background: gray; 
}
 
/* Handle */
.llistaFlex::-webkit-scrollbar-thumb {
  background: lightgrey; 
}

.prodFlex {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    justify-content: flex-start;
    background-color: lightgrey;
    border-radius: 3px 3px 3px 3px;
    padding: 10px;
    margin-bottom: 10px;
    box-shadow: 2px 2px #888888;
}

.right {
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    padding-left: 40px;
    width: 30%;
}

.data {
    margin-top: 7px;
}

.desc {
    padding-top: 15px;
}

.preu {
    display: inline-block;
    margin-top: 12px;
}

.descompte {
    margin-top: 8px;
}


.flex_img {
    border-radius: 5px;
    background: #b5b0b0;
    width: 10%;
    display: flex;
    margin-left: 20px;
}

img {
    width: 100%;
    margin: auto;
    border-radius: 5px;
    background: transparent;
}

.inputHide {
    display: none;
}

.inputHide + .check_label {
    cursor: pointer;
}



.check_label {
    margin: 0px;
}

.check_label:before {
    content: "";
    width: 20px;
    height: 20px;
    background-color: transparent;
    display: inline-block;
    border-radius: 2px 2px 2px 2px;
    height: 20px;
    border: 1px solid grey;
}

.inputHide:checked + .check_label:before {
    background-color: gray;
}

.btn_crear {
    transition: 0.4s;
    margin-top: 60px;
    background-color: transparent;
    border: none;
    font-size: 20px;
    cursor: pointer;
}

.btn_crear:hover {
    font-size: 22px;
}

.input_descmp, .input_data_fi {
    display: inline-block;
    background: transparent;
    border:none;
    border-bottom: 1px solid black;
}


</style>


<?php

    $usuari_id = $_SESSION['usuari_id'];

    $cons_prods = "SELECT * FROM producte p WHERE p.negoci_id = '$usuari_id'";
    $res_prods = $bd->query($cons_prods);
    $data_prods = $res_prods->fetch_all(MYSQLI_ASSOC);
    
?>






<form action="/XLC/index.php?accio=crear_promo" method="post">


    <div class="llistaFlex">

    <?php for ($i = 0; $i < count($data_prods); $i++) { ?>

        <div class="prodFlex">
    
            <div class="flex">
                <input class="inputHide" id="<?php echo $i; ?>" name="ids[]" type="checkbox" value="<?php echo $data_prods[$i]['id']; ?>">
                <label class="check_label" for="<?php echo $i; ?>"></label>
            </div>
            
            <div class="flex_img">
                <img src="/XLC/vista/img/<?php echo $data_prods[$i]['imatge']; ?>">
            </div>
            
            <div class="right">

                <div>
                    <h3><?php echo $data_prods[$i]['nom']; ?></h3>
                    <h6 class="data">AFEGIT EL 25/01/2020</h6>
                    <h6 class="preu"><?php echo $data_prods[$i]['preu']; ?> €</h6>
                    <h6 class="descompte">DESCOMPTE: <?php echo $data_prods[$i]['descompte']; ?> %</h6>
                </div>
                

                <!--Guardar pels informes <h5>24u. venudes</h5>-->
            </div>

            <div class="right2">
                <h5 class="desc"><?php echo $data_prods[$i]['descripcio']; ?></h5>
            </div>

        </div>

    <?php } ?>

    </div>

    <h3 style="display: inline-block; margin-top: 15px;">Aplicar descompte del</h3>
    <input name="descompte" value="" class="input_descmp" type="number">

    <h3 style="margin-top: 15px;">Data de finalització (deixar buit si indefinida)</h3>
    <input name="data_fi" value="" class="input_data_fi" type="date">

    <button style="display: block; margin-top: 15px;" class="btn_crear" type="submit" disabled>Crear Promoció</button>

</form>


<script>

    jQuery(document).ready(function() {

        jQuery("input[type=checkbox]").click(function() {

            if (jQuery("input[type=checkbox]:checked").length > 0) {
            
                jQuery(".btn_crear").prop('disabled', false);
            }else {
                jQuery(".btn_crear").prop('disabled', true);
            }
        })
        
    })
    

    

</script>