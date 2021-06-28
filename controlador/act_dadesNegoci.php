<?php
 
    if(isset($_SESSION['tipus_usuari'])) {
            
        $nomUsuari = $_SESSION['nom'];
    }

    // Agafem les dades del formulari
    $nom = mysqli_real_escape_string($bd, $_POST['nom']);
    $descripcio = mysqli_real_escape_string($bd, $_POST['descripcio']);
    $poblacio = mysqli_real_escape_string($bd, $_POST['poblacio']);
    $cp = mysqli_real_escape_string($bd, $_POST['cp']);
    $telefon = mysqli_real_escape_string($bd, $_POST['telefon']);

    // Actualitzem tots els camps s'hagin modificat o no
    $consulta = "UPDATE negoci n SET n.nom = '$nom', n.descripcio = '$descripcio', n.poblacio = '$poblacio', n.cp = '$cp', n.telefon = '$telefon' WHERE n.nom = '$nom'";

    $bd->query($consulta);

    $_SESSION['nom'] = $nom;
    $_SESSION['dades_NegociMod'] = '';
    
    header('location: /XLC/index.php?accio=perfil');
        
?>