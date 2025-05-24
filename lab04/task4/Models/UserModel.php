<?php
namespace Models;

class UserModel {
    private int $id;
    private string $name;
    private string $email;

    public function __construct(int $id, string $name, string $email) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        echo "Користувача створено: {$this->name}<br>";
    }

    public function getInfo(): string {
        return "ID: {$this->id}, Name: {$this->name}, Email: {$this->email}";
    }

    public function greet(): void {
        echo "Привіт, {$this->name}!<br>";
    }
}
