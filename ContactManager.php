<?php
class ContactManager{

    public function findAll(): ?array{
        $pdo = DBConnect::getInstance()->getPDO();

        $sql = "SELECT * FROM contact";
        $result = $pdo->query($sql);
        $contacts = [];

        while ($contact = $result->fetch()) {
            $contacts[] = $contact;
        }
        return $contacts;
    }

} 