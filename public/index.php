<?php
echo "<h1 style='color:green;'>CECI EST LE BON INDEX</h1>";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
$page = isset($_GET['page']) ? $_GET['page'] : 'accueil';

/* Initialisation de TWIG */  
require_once '../lib/vendor/autoload.php'; 
require_once '../config/routes.php'; 
require_once '../config/connexion.php';
require_once '../config/parametres.php';
require_once '../src/modele/_classes.php';

$loader = new \Twig\Loader\FilesystemLoader('../src/vue/');  
$twig = new \Twig\Environment($loader); 
$twig->addGlobal('session', $_SESSION);

$db = connect($config);
$contenu = getPage($db); 
$contenu($twig, $db); 
