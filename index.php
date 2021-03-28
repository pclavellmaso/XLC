<?php

// Si incloem la base de dades aquí estarà disponible a totes les pàgines
include("model/bd.php");

// Si iniciem $_SESSION aquí tindrem la informació disponible a totes les pàgines
session_start();

//Display errors if any
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("model/debug.php");

if (isset($_GET['accio'])) {
    $accio = $_GET['accio'];
} else if (isset($_POST['accio'])) {
    $accio = $_POST['accio'];
} else {
    $accio = null;
}

$accio = explode('.', $accio)[0];

switch ($accio) {
    case 'registreLogin':
        include('vista/registreLogin.php');
        break;

    case 'val_registreLogin':
        include('controlador/validacio_registreLogin.php');
        break;
    
    case 'val_login':
        include('controlador/validacio_login.php');

        break;
    case 'logout':
        include('vista/tancar_sessio.php');
        break;

    case 'perfil':
        include('vista/paginaPerfil.php');
        break;

    case 'perfil_personal':
        include('vista/perfilPersonal.php');
        break; 

    case 'act_dadesPersonals':
        include('controlador/act_dadesPersonals.php');
        break;

    case 'perfil_negoci':
        include('vista/perfilNegoci.php');
        break;

    case 'perfil_productes':
        include('vista/perfilProductes.php');
        break;

    case 'sobre_projecte':
        include('vista/sobreProjecte.php');
        break;

    case 'mur_promos':
        include('vista/murPromocions.php');
        break;

    case 'llista_negocis':
        include('vista/llistaNegocis.php');
        break;

    case 'afegir_producte':
        include('controlador/validacio_producte.php');
        break;

    default:
        include('vista/inici.php');
        break;
}
