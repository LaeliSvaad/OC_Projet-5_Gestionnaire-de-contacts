<?php

/**
 * Classe qui permet de se connecter à la base de données.
 * Cette classe est un singleton. Cela signifie qu'il n'est pas possible de créer plusieurs instances de cette classe.
 * Pour récupérer une instance de cette classe, il faut utiliser la méthode getInstance().
 */

class DBConnect {

    private static ?DBConnect $instance = null;
    private ?\PDO $connection = null; // Ajout de "?" pour autoriser null
    private $error;

    private function __construct() {
        try {
            $dsn = "mysql:host=". DB_HOST . ":" . DB_PORT .";dbname=". DB_NAME .";charset=utf8mb4";
            $this->connection = new PDO($dsn, DB_USER, DB_PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $this->error = "Erreur de connexion : " . $e->getMessage();
            $this->connection = null; 
        }
    }

    public static function getInstance(): ?DBConnect {
        if (self::$instance === null) {
            self::$instance = new DBConnect();
        }
        return self::$instance;
    }

    public function getPDO(): ?\PDO {
        if ($this->connection === null) {
            echo $this->error;
        }
        return $this->connection;
    }
}


