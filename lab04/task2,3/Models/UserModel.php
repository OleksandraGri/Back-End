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
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getInfo(): string {
        return "ID: {$this->id}, Name: {$this->name}, Email: {$this->email}";
    }
}
