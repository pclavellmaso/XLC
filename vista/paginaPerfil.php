<link rel="stylesheet" href="vista/paginaPerfil.css">

<?php include "header.php"; ?>

    <div id="contentFlex">

        <div id="leftFlex">

            <?php
                
                if(isset($_SESSION['pass_err']) && $_SESSION['pass_err'] == 'yes') {

                    echo '<p style="color: red;">Error a l\'actualitzar la contrasenya: Contrasenya actual invàlida</p>';
                }
            ?>

            <?php
                
                if(isset($_SESSION['new_promo']) && $_SESSION['new_promo'] == 'yes') {

                    echo '<p style="color: green;">Promoció creada!</p>';
                }
            ?>

            <p id="dades_personals" class="menu_item">Dades personals</p>

            <?php if(isset($_SESSION['tipus_usuari']) and $_SESSION['tipus_usuari'] == 'negoci') { ?>
            
                <p id="dades_negoci" class="menu_item">Dades negoci</p>
                </br>
                <p id="consul_prods" class="menu_item">Consultar productes</p>
                <p id="consul_proms" class="menu_item">Consultar promocions</p>

            <?php }else { ?>
                
                <p id="compres" class="menu_item">Registre de compres</p>
                </br>
                <p id="punts" class="menu_item">Els meus punts</p>

            <?php } ?>

        </div>

        <div id="rightFlex">

            <div id="contingut">
            </div>

        </div>


    </div>





    <!-- $( "div.third" ).replaceWith( $( ".first" ) ); -->
    

<script>

    // Per defecte carrega la pàgina de les dades personals
    $.ajax({url: "index.php?accio=perfil_personal", success: function(result){
        $("#contingut").hide().html(result).fadeIn(400);
    }});

    jQuery(document).ready(function() {

        $("#dades_personals").click(function(){
            $.ajax({url: "index.php?accio=perfil_personal", success: function(result){
                $("#contingut").hide().html(result).fadeIn(400);
            }});
        });

        $("#dades_negoci").click(function(){
            $.ajax({url: "index.php?accio=perfil_negoci.php", success: function(result){
                $("#contingut").hide().html(result).fadeIn(400);
            }});
        });

        $("#consul_prods").click(function(){
            $.ajax({url: "index.php?accio=perfil_productes", success: function(result){
                $("#contingut").html(result);
            }});
        });


        jQuery("#consul_proms").on('click', function() {
            $.ajax({url: "index.php?accio=perfil_promos", success: function(result){
                $("#contingut").html(result);
            }});
        });

    });

</script>

<?php include "footer.php";?>

