<?php
require_once 'CleaningHouse.php';

abstract class Human implements CleaningHouse {
    private $height;
    private $weight;
    private $age;

    public function __construct($height, $weight, $age) {
        $this->height = $height;
        $this->weight = $weight;
        $this->age = $age;
    }

    public function getHeight() {
        return $this->height;
    }

    public function setHeight($height) {
        $this->height = $height;
    }

    public function getWeight() {
        return $this->weight;
    }

    public function setWeight($weight) {
        $this->weight = $weight;
    }

    public function getAge() {
        return $this->age;
    }

    public function setAge($age) {
        $this->age = $age;
    }

    abstract protected function messageAtBirth();
    
    public function birthChild() {
        echo "Народилася дитина! <br>";
        $this->messageAtBirth();
    }

    public function cleanRoom() {
        echo "Людина прибирає кімнату. <br>";
    }

    public function cleanKitchen() {
        echo "Людина прибирає кухню. <br>";
    }
}
?>
