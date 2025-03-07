<?php
require_once("config.php");
require_once("DBConnect.php");
require_once("ContactManager.php");
require_once("contact.php");

while (true) {
    $line = readline("Entrez votre commande : ");
    if($line === "list"){
        echo "Vous avez saisi : $line\n";
        $contactManager = New ContactManager();
        $contacts = $contactManager->findAll();
        foreach($contacts as $contact){
            echo $contact->toString();
        }
    }
    else if($line === "detail"){
        echo "Vous avez saisi : $line\n";
    }
    else if($line === "create"){
        echo "Vous avez saisi : $line\n";
    }
    else if($line === "delete"){
        echo "Vous avez saisi : $line\n";
    }
        
}  


/* la commande : docker exec -it apache_php php main.php */