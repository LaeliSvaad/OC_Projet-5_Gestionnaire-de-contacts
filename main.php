<?php
/*while (true) {
    $line = readline("Entrez votre commande : ");
    if($line === "list")
        echo "Vous avez saisi : $line\n";
}  */
require_once("config.php");
require_once("DBConnect.php");

$db = DBConnect::getInstance(); // Récupération de l'instance singleton
$pdo = $db->getPDO(); // Récupération de l'objet PDO

var_dump($pdo);