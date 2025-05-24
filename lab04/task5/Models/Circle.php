<?php
namespace Models;

class Circle {
    private float $x;
    private float $y;
    private float $radius;

    public function __construct(float $x, float $y, float $radius) {
        $this->x = $x;
        $this->y = $y;
        $this->radius = $radius;
    }

    public function getX(): float {
        return $this->x;
    }

    public function getY(): float {
        return $this->y;
    }

    public function getRadius(): float {
        return $this->radius;
    }

    public function setX(float $x): void {
        $this->x = $x;
    }

    public function setY(float $y): void {
        $this->y = $y;
    }

    public function setRadius(float $radius): void {
        if ($radius <= 0) {
            throw new \InvalidArgumentException("Радіус повинен бути більше нуля.");
        }
        $this->radius = $radius;
    }

    public function __toString(): string {
        return "Коло з центром в ({$this->x}, {$this->y}) і радіусом {$this->radius}";
    }
}
