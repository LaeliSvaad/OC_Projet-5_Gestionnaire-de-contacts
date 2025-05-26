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
        preg_match('/^detail [0-9]+$/', $line) === 1 => Command::detail($line),
        preg_match('/^create ([A-Za-z ]{1,120},)([a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,},)(\+[0-9]{11})$/', $line) === 1=> Command::create($line),
        preg_match('/^delete [0-9]+$/', $line) === 1 => Command::delete($line),
        preg_match('/^modify ([0-9]+,)([A-Za-z ]{1,120},)([a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,},)(\+[0-9]{11})$/', $line) === 1 => Command::modify($line),
        $line === "help" => Command::help(),
        default => print("Cette commande n'existe pas.\n")
    };
}
