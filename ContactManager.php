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

    public function createContact($contact){
        $pdo = DBConnect::getInstance()->getPDO();

        $req = 'INSERT INTO contact (name, email, phone_number) VALUES (:name, :email, :phone_number)';
        $stmt = $pdo->prepare($req);
        $stmt->execute(['name' => $contact->name(),
                        'email' => $contact->email(),
                        'phone_number' => $contact->phoneNumber()]);
        return $pdo->lastInsertId();
    }

    public function deleteContact($id){
        $pdo = DBConnect::getInstance()->getPDO();

        $req = 'DELETE FROM contact WHERE id = :id';
        $stmt = $pdo->prepare($req);
        $stmt->execute(['id' => $id]);
    }

} 