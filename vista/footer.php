<link rel="stylesheet" href="/XLC/vista/footer.css">

<style>

    .footer_flex {
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        padding: 30px;
    }

    .esq_flex .dreta_flex {
        display: flex;
        flex-direction: column;
    }


</style>
    </div><!--tancament del div 'content' del header (tanca tota la pàgina)-->

    <div class="session">
        <?php
            echo 'Log Session: ';
            print_r($_SESSION);
        ?>
    </div>

    <div class="footer_flex bg-light">

        <div class="esq_flex">
            <p>Hola</p>
            <p>Ei</p>
            <p>Adeu</p>
        </div>
        
        <div class="dreta_flex">
            <p>Ep</p>
            <p>Op</p>
            <p>Ip</p>
        </div>

    </div>

</body>
</html>