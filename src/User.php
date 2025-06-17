<?php

class User {

    private string $name;
    private string $email;

    public function __construct(string $name, string $email){
        $this->name=$name;
        $this->email=$email;
    }

    public function getName(): string{
        return $this->name;
    }
     public function getEmail(): string{
        return $this->email;
    }

     public function setName(string $name): void{
        $this->name=$name;
    }
     public function setEmail(string $email): void{
         $this->email=$email;
    }

    public function save(PDO $pdo): bool{
        $stmt = $pdo->prepare("INSERT INTO users(name,email) VALUES (:name, :email)");
        return $stmt->execute([
            ':name'=> $this->name,
            ':email'=> $this->email,
        ]);
    }
}