<?php
$config['serveur'] = '10.50.0.44';
$config['login'] = 'sulayman';
$config['mdp'] = 'Pas-de-mdp22';
$config['bd'] = 'shopshop';

try{
$db = new PDO('mysql:host='.$config['serveur'].';dbname='.$config['bd'],$config['login'],$config['mdp']);
echo 'connexion réussi!';
}
catch(Exception $e){
    echo $e;
}
