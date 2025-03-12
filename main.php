<?php
require_once("config.php");
require_once("DBConnect.php");
require_once("ContactManager.php");
require_once("Contact.php");
require_once("Command.php");

while (true) {
    $line = trim(readline("Entrez votre commande : "));

    match (true) {
        $line === "list" => Command::list(),
        preg_match('/^detail [0-9]*$/', $line) === 1 => Command::detail(),
        $line === "create" => Command::create(),
        $line === "delete" => Command::delete(),
        $line === "help" => Command::help(),
        default => print("Cette commande n'existe pas.\n")
    };
}  


/* la commande : docker exec -it apache_php php main.php */