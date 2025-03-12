<?php
class ContactManager{

    public function findAll(): ?array{
        $pdo = DBConnect::getInstance()->getPDO();

        $sql = "SELECT * FROM contact";
        $result = $pdo->query($sql);
        $contacts = [];

        while ($contact = $result->fetch()) {
            $currentContact = new Contact();
            $currentContact->setName($contact["name"]);
            $currentContact->setEmail($contact["email"]);
            $currentContact->setPhoneNumber($contact["phone_number"]);
            $currentContact->setId($contact["id"]);
            $contacts[] = $currentContact;
        }
        return $contacts;
    }

    public function findById(int $id): ?Contact{
        $pdo = DBConnect::getInstance()->getPDO();

        $sql = "SELECT * FROM contact WHERE id = :id";
        $stmt = $pdo->prepare("id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $contact = $stmt->fetch();

        $currentContact = new Contact();
        $currentContact->setName($contact["name"]);
        $currentContact->setEmail($contact["email"]);
        $currentContact->setPhoneNumber($contact["phone_number"]);
        return $currentContact;
    
    }

    public function createContact($contact){
        $pdo = DBConnect::getInstance()->getPDO();

        $req = 'INSERT INTO contact (name, email, phone_number) VALUES (:name, :email, :phone_number)';
        foreach($contact as $property => $value){
            $stmt = $pdo->prepare(":{$propery}", $value, PDO::PARAM_STR);
        }
        $stmt->execute();
        return $pdo->lastInsertId();
    }

    public function deleteContact($id){
        $pdo = DBConnect::getInstance()->getPDO();

        $req = 'DELETE FROM contact WHERE id = :id';
        $stmt = $pdo->prepare($req);
        $stmt->execute(['id' => $id]);
    }

} 