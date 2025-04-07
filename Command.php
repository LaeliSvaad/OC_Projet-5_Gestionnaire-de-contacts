<?php
class Command{
    
    public static function list(): void{
        $contactManager = New ContactManager();
        $contacts = $contactManager->findAll();
        foreach($contacts as $contact){
            echo $contact;
        }
    }

    public static function detail($user_command): void{
        $user_command_array = explode(" ", $user_command);
        $id = $user_command_array[1];
        $contactManager = New ContactManager();
        $contact = $contactManager->findById($id);
        if($contact == null){
            echo "Ce contact n'existe pas.\n";
            return;
        }
        echo $contact;
    }

    public static function create($user_command): void{
        $user_command_params = substr($user_command, 7);
        $contact_infos = explode(",", $user_command_params);
        $contact = New Contact();
        $contactManager = New ContactManager();
        $contact->setName($contact_infos[0]);
        $contact->setEmail($contact_infos[1]);
        $contact->setPhoneNumber($contact_infos[2]);  
        $contact->setId($contactManager->createContact($contact));     
        echo $contact;
    }

    public static function modify($user_command): void{
        $user_command_params = substr($user_command, 7);
        $contact_infos = explode(",", $user_command_params);
        $contact = New Contact();
        $contactManager = New ContactManager();
        $contact->setName($contact_infos[1]);
        $contact->setEmail($contact_infos[2]);
        $contact->setPhoneNumber($contact_infos[3]);
        $contact->setId($contact_infos[0]);
        $result = $contactManager->modifyContact($contact);
        echo $result . " contact modifié.\n";
    }

    public static function delete($user_command): void{
        $user_command_array = explode(" ", $user_command);
        $id = $user_command_array[1];
        $contactManager = New ContactManager();
        $result = $contactManager->deleteContact($id);
        echo $result . " contact supprimé.\n";
    }

    public static function help(): void{
        echo file_get_contents("commands_description.txt") . "\n";
    }
    
}