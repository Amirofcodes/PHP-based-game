<?php
abstract class Hero
{
    protected string $name;
    protected int $health;
    protected int $strength;
    protected int $level;

    function __construct(string $name, int $health, int $strength, int $level = 1)
    {
        $this->name = $name;
        $this->health = $health;
        $this->strength = $strength;
        $this->level = $level;
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

    public function setLevel(int $level): void
    {
        $this->level = $level;
    }

    public function display()
    {
        echo "Hero Details:<br>";
        echo "Name: " . $this->getName() . "<br>";
        echo "Health: " . $this->getHealth() . "<br>";
        echo "Strength: " . $this->getStrength() . "<br>";
        echo "Level: " . $this->getLevel() . "<br>";
        echo "<br>";
    }
}

final class Warrior extends Hero
{
    private array $Moves;

    public function __construct(string $name, int $health, int $strength, array $Moves)
    {
        parent::__construct($name, $health, $strength);
        $this->Moves = $Moves;
    }

    public function getMoves(): array
    {
        return $this->Moves;
    }

    public function warriorAttack()
    {
        $randomMove = $this->Moves[array_rand($this->Moves)];
        echo $this->getName() . " attacks with " . $randomMove . "<br>";
    }

    public function display()
    {
        echo "Warrior Details:<br>";
        echo "Name: " . $this->getName() . "<br>";
        echo "Health: " . $this->getHealth() . "<br>";
        echo "Strength: " . $this->getStrength() . "<br>";
        echo "Level: " . $this->getLevel() . "<br>";
        echo "Moves: " . implode(', ', $this->getMoves()) . "<br>";
        echo "<br>";
        $this->warriorAttack();
        echo "<br>";
    }
}

final class Mage extends Hero
{
    private array $magicPowers;

    public function __construct(string $name, int $health, int $strength, array $magicPowers)
    {
        parent::__construct($name, $health, $strength);
        $this->magicPowers = $magicPowers;
    }

    public function getMoves(): array
    {
        return $this->magicPowers;
    }

    public function mageAttack()
    {
        $randomMove2 = $this->magicPowers[array_rand($this->magicPowers)];
        echo $this->getName() . " attacks with " . $randomMove2 . "<br>";
    }

    public function display()
    {
        echo "Mage Details:<br>";
        echo "Name: " . $this->getName() . "<br>";
        echo "Health: " . $this->getHealth() . "<br>";
        echo "Strength: " . $this->getStrength() . "<br>";
        echo "Level: " . $this->getLevel() . "<br>";
        echo "Magic Powers: " . implode(', ', $this->getMoves()) . "<br>";
        echo "<br>";
        $this->mageAttack();
        echo "<br>";
    }
}
