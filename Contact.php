<?php
class Contact{

    private int $id;
    private string $name;
    private string $email;
    private string $phoneNumber;

    public function getId(): ?int{
        return $this->id;
    }

    public function getName(): ?string{
        return $this->name;
    }

    public function getEmail(): ?string{
        return $this->email;
    }

    public function getPhoneNumber(): ?string{
        return $this->phoneNumber;
        
    }

    public function setId(int $id): void{
        $this->id = $id;
    }

    public function setName(string $name): void{
       $this->name = $name;
    }

    public function setEmail(string $email): void{
        $this->email = $email;
    }

    public function setPhoneNumber(string $phoneNumber): void{
        $this->phoneNumber = $phoneNumber;
    }

    public function toString(): string{
        return "Contact numéro ". $this->id ." : Nom: " . $this->name . ", Adresse email: " . $this->email . ", Numéro de téléphone: " . $this->phoneNumber . "\n"; 
    }

}