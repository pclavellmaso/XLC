<link rel="stylesheet" href="vista/paginaPerfil.css">

<?php include "header.php"; ?>

    <div id="contentFlex">

        <div id="leftFlex">

            <?php
                
                if(isset($_SESSION['pass_err']) && $_SESSION['pass_err'] == 'yes') {

                    echo '<p style="color: red;">Error a l\'actualitzar la contrasenya: Contrasenya actual invàlida</p>';
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

                <p>En aquest espai pots consultar etc...</p>

            </div>

        </div>


    </div>





    <!-- $( "div.third" ).replaceWith( $( ".first" ) ); -->
    

<script>

    jQuery(document).ready(function() {

        $("#dades_personals").click(function(){
            $.ajax({url: "index.php?accio=perfil_personal", success: function(result){
                $("#contingut").html(result);
            }});
        });

        $("#dades_negoci").click(function(){
            $.ajax({url: "index.php?accio=perfil_negoci.php", success: function(result){
                $("#contingut").html(result);
            }});
        });

        $("#consul_prods").click(function(){
            $.ajax({url: "index.php?accio=perfil_productes", success: function(result){
                $("#contingut").html(result);
            }});
        });


        jQuery("#consul_proms").on('click', function() {
            jQuery("#contingut").html("<p>INFO PROMOCIONS</p>");
        });

    });

</script>

<?php include "footer.php";?>

