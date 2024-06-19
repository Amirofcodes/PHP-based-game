<?php

abstract class Hero
{

    public function __construct(protected string $name, protected int $health, protected int $strength, protected int $level = 1)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getHealth(): int
    {
        return $this->health;
    }

    public function setHealth(int $health): void
    {
        $this->health = $health;
    }

    public function getStrength(): int
    {
        return $this->strength;
    }

    public function getLevel(): int
    {
        return $this->level;
    }

    public function increaseLevel(): void
    {
        $this->level += 1;
    }

    public function getMaxHealth(): int
    {
        return $this->health;
    }
}

final class Warrior extends Hero
{
    private array $moves;

    public function __construct(string $name, int $health, int $strength, array $moves, int $level = 1)
    {
        parent::__construct($name, $health, $strength, $level);
        $this->moves = $moves;
    }

    public function getMoves(): array
    {
        return $this->moves;
    }

    public function warriorAttack()
    {
        $randomMove = $this->moves[array_rand($this->moves)];
        echo $this->name . " attacks with " . $randomMove . "<br>";
    }

    public function display()
    {
        echo "Warrior Details:<br>";
        echo "Name: " . $this->name . "<br>";
        echo "Health: " . $this->health . "<br>";
        echo "Strength: " . $this->strength . "<br>";
        echo "Level: " . $this->level . "<br>";
        echo "Moves: " . implode(', ', $this->moves) . "<br>";
        echo "<br>";
        $this->warriorAttack();
        echo "<br>";
    }
}

final class Mage extends Hero
{
    private array $magicPowers;

    public function __construct(string $name, int $health, int $strength, array $magicPowers, int $level = 1)
    {
        parent::__construct($name, $health, $strength, $level);
        $this->magicPowers = $magicPowers;
    }

    public function getMoves(): array
    {
        return $this->magicPowers;
    }

    public function mageAttack()
    {
        $randomMove = $this->magicPowers[array_rand($this->magicPowers)];
        echo $this->name . " attacks with " . $randomMove . "<br>";
    }

    public function display()
    {
        echo "Mage Details:<br>";
        echo "Name: " . $this->name . "<br>";
        echo "Health: " . $this->health . "<br>";
        echo "Strength: " . $this->strength . "<br>";
        echo "Level: " . $this->level . "<br>";
        echo "Magic Powers: " . implode(', ', $this->magicPowers) . "<br>";
        echo "<br>";
        $this->mageAttack();
        echo "<br>";
    }
}
