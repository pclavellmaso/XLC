
<?php include('model/bd.php');

if(isset($_SESSION)){
    $nom = $_SESSION['nom'];
}

$consulta = "SELECT * FROM negoci n JOIN usuari u on n.usuari_id = u.id WHERE u.nom = '".$nom."'";

$consulta_res = $bd->query($consulta);

$info = $consulta_res->fetch_all(MYSQLI_ASSOC);

?>

<div>

    <h2>Consulta o modifica les teves dades</h2><br>
    
        <h3>Nom del negoci</h3>
            <p><?php echo $info[0]["nom"]; ?></p><br>
        <h3>Descripció del negoci</h3>
            <p><?php echo $info[0]['descripcio']; ?></p><br>
        <h3>Població</h3>
            <p><?php echo $info[0]['poblacio']; ?></p><br>
        <h3>CP</h3>
            <p><?php echo $info[0]['cp']; ?></p><br>
        <h3>Telèfon</h3>
            <p><?php echo $info[0]['telefon']; ?></p><br>
    
    <!-- ajax -->
    <h2><?php echo 'EDITAR'; ?><h2>

</div>