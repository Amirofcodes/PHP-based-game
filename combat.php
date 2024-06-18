<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'index.php';
require_once 'heros.php';

echo "<form method='post'>";
echo "Choose your hero:<br>";
echo "<select name='selected_hero'>";
foreach ($heroes as $index => $hero) {
    echo "<option value='{$index}'>" . $hero->getName() . "</option>";
}
echo "</select><br><br>";

echo "Choose opponent hero:<br>";
echo "<select name='opponent_hero'>";
foreach ($heroes as $index => $hero) {
    echo "<option value='{$index}'>" . $hero->getName() . "</option>";
}
echo "</select><br><br>";

echo "<input type='submit' name='fight' value='Fight'>";
echo "<input type='submit' name='reset' value='Reset'>";
echo "</form>";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['reset'])) {
        // Just reload the page to reset the form and clear the fight log
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } elseif (isset($_POST['fight'])) {
        $selectedHeroIndex = $_POST['selected_hero'];
        $opponentHeroIndex = $_POST['opponent_hero'];
        $selectedHero = $heroes[$selectedHeroIndex];
        $opponentHero = $heroes[$opponentHeroIndex];

        echo "<h2>Combat Start!</h2>";

        echo "<h3>{$selectedHero->getName()} vs {$opponentHero->getName()}</h3>";

        while ($selectedHero->getHealth() > 0 && $opponentHero->getHealth() > 0) {
            // Selected hero attacks
            $attackMove = $selectedHero->getMoves()[array_rand($selectedHero->getMoves())];
            $damage = (array_search($attackMove, $selectedHero->getMoves()) + 1) * (rand(15, 25)); // Random damage multiplier
            $opponentHero->setHealth($opponentHero->getHealth() - $damage);
            echo "{$selectedHero->getName()} attacks with {$attackMove}, dealing {$damage} damage. {$opponentHero->getName()} health: {$opponentHero->getHealth()}<br>";

            // Check if opponent is defeated
            if ($opponentHero->getHealth() <= 0) {
                echo "{$opponentHero->getName()} is defeated! {$selectedHero->getName()} wins and levels up!<br>";
                $selectedHero->setLevel($selectedHero->getLevel() + 1);
                $winner = $selectedHero->getName();
                break;
            }

            // Opponent hero attacks
            $attackMove = $opponentHero->getMoves()[array_rand($opponentHero->getMoves())];
            $damage = (array_search($attackMove, $opponentHero->getMoves()) + 1) * (rand(15, 25)); // Random damage multiplier
            $selectedHero->setHealth($selectedHero->getHealth() - $damage);
            echo "{$opponentHero->getName()} attacks with {$attackMove}, dealing {$damage} damage. {$selectedHero->getName()} health: {$selectedHero->getHealth()}<br>";

            // Check if selected hero is defeated
            if ($selectedHero->getHealth() <= 0) {
                echo "{$selectedHero->getName()} is defeated! {$opponentHero->getName()} wins and levels up!<br>";
                $opponentHero->setLevel($opponentHero->getLevel() + 1);
                $winner = $opponentHero->getName();
                break;
            }
        }

        // Display the winner's gif
        if (isset($winner)) {
            $gifPath = "/website/images/" . strtolower($winner) . ".gif";
            echo "<img src='$gifPath' alt='$winner'>";
        }
    }
}
