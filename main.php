<?php
require_once("config.php");
require_once("DBConnect.php");
require_once("ContactManager.php");

while (true) {
    $line = readline("Entrez votre commande : ");
    if($line === "list"){
        echo "Vous avez saisi : $line\n";
        $contactManager = New ContactManager();
        $contacts = $contactManager->findAll();
        var_dump($contacts);
    }
        
}  
