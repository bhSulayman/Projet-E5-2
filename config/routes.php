<?php

function getPage($db)
{
    $lesPages = [
        'accueil' => 'accueilControleur',
        'inscrire' => 'inscrireControleur',
        'mentions' => 'mentionsControleur',
        'connexion' => 'connexionControleur',
        'deconnexion' => 'deconnexionControleur',
        'apropos' => 'aproposControleur',
        'produit' => 'produitControleur',
        // 'homme' => 'hommeControleur',
        // 'femme' => 'femmeControleur',
        // 'enfant' => 'enfantControleur',
        'compte' => 'compteControleur',
        'panier' => 'panierControleur',
        'maintenance' => 'maintenanceControleur'
    ];

    if ($db != null) {
        $page = isset($_GET['page']) ? $_GET['page'] : 'accueil';

        if (!isset($lesPages[$page])) {
            $page = 'accueil';
        }

        $controllerName = $lesPages[$page];

        return function ($twig, $db) use ($controllerName) {
            require_once "../src/controleur/{$controllerName}.php";
        };
    } else {
        return function ($twig, $db) {
            require_once "../src/controleur/maintenanceControleur.php";
        };
    }
}
