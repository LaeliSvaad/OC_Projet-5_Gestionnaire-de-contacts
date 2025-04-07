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
        $stmt = $pdo->prepare($sql); 
        $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
        $stmt->execute(); 
        
        $contact = $stmt->fetch(PDO::FETCH_ASSOC); 
  
        if($contact != false){
            $currentContact = new Contact();
            $currentContact->setId($contact["id"]);
            $currentContact->setName($contact["name"]);
            $currentContact->setEmail($contact["email"]);
            $currentContact->setPhoneNumber($contact["phone_number"]);
            return $currentContact;
        }
        else{
            return null;
        }

    }

    public function createContact(Contact $contact): int{
        $pdo = DBConnect::getInstance()->getPDO();

        $req = 'INSERT INTO contact (name, email, phone_number) VALUES (:name, :email, :phoneNumber)';
        $stmt = $pdo->prepare($req);
        foreach($contact as $property => &$value){
            $stmt->bindParam(":{$property}", $value, PDO::PARAM_STR);   
        }
        $stmt->execute();
        return $pdo->lastInsertId();
    }

    public function modifyContact(Contact $contact): int{
        $pdo = DBConnect::getInstance()->getPDO();

        $req = 'UPDATE contact SET name = :name, email = :email, phone_number = :phoneNumber WHERE id = :id';
        $stmt = $pdo->prepare($req);
        foreach($contact as $property => &$value){
            $stmt->bindParam(":{$property}", $value, PDO::PARAM_STR);
        }
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function deleteContact(int $id): int{
        $pdo = DBConnect::getInstance()->getPDO();

        $req = 'DELETE FROM contact WHERE id = :id';
        $stmt = $pdo->prepare($req);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT); 
        $stmt->execute();
        return $stmt->rowCount();
    }

} 