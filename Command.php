<?php
class Command{
    
    public static function list(): void{
        $contactManager = New ContactManager();
        $contacts = $contactManager->findAll();
        foreach($contacts as $contact){
            echo $contact->toString();
        }
    }

    public static function detail(): void{
        echo "ouiiii!!!!\n";
    }

    public static function create(): void{
        echo "ouiiii!!!!2\n";
    }

    public static function delete(): void{
        echo "ouiiii!!!!3\n";
    }

    public static function help(): void{
        echo "ouiiii!!!!4\n";
    }
    
}