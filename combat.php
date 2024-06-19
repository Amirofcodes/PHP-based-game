<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'index.php';
require_once 'heros.php';

// Database connection
$servername = "localhost";
$username = "root"; // default XAMPP username
$password = ""; // default XAMPP password
$dbname = "fight_game";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "<form method='post'>";
echo "Choose your hero:<br>";
echo "<select name='selected_hero'>";
echo "<option value='' disabled selected>Select your hero</option>";
foreach ($heroes as $index => $hero) {
    echo "<option value='{$index}'>" . $hero->getName() . "</option>";
}
echo "</select><br><br>";

echo "Choose opponent hero:<br>";
echo "<select name='opponent_hero'>";
echo "<option value='' disabled selected>Select opponent hero</option>";
foreach ($heroes as $index => $hero) {
    echo "<option value='{$index}'>" . $hero->getName() . "</option>";
}
echo "</select><br><br>";

echo "<input type='submit' name='fight' value='Fight'>";
echo "<input type='submit' name='reset' value='Reset'>";
echo "</form>";

function renderHealthBar($hero)
{
    $healthPercentage = ($hero->getHealth() / $hero->getMaxHealth()) * 100;
    echo "<div style='width: 100%; background-color: #ccc;'>";
    echo "<div style='width: {$healthPercentage}%; background-color: #4CAF50; height: 20px;'></div>";
    echo "</div>";
}

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

        echo "<div style='display: flex; align-items: flex-start;'>"; // Start of the container div

        echo "<div style='flex: 1;'>"; // Start of the fight log div
        while ($selectedHero->getHealth() > 0 && $opponentHero->getHealth() > 0) {
            // Selected hero attacks
            $attackMove = $selectedHero->getMoves()[array_rand($selectedHero->getMoves())];
            $moveIndex = array_search($attackMove, $selectedHero->getMoves()); // Store array_search result in a variable
            $damageMultiplier = rand(15, 25); // Store rand result in a variable
            $damage = ($moveIndex + 1) * $damageMultiplier; // Random damage multiplier
            $opponentHero->setHealth($opponentHero->getHealth() - $damage);
            echo "{$selectedHero->getName()} attacks with {$attackMove}, dealing {$damage} damage. {$opponentHero->getName()} health: {$opponentHero->getHealth()}<br>";

            // Check if opponent is still alive
            if ($opponentHero->getHealth() <= 0) {
                $winner = $selectedHero;
                $loser = $opponentHero;
                break;
            }

            // Opponent hero attacks
            $attackMove = $opponentHero->getMoves()[array_rand($opponentHero->getMoves())];
            $moveIndex = array_search($attackMove, $opponentHero->getMoves()); // Store array_search result in a variable
            $damageMultiplier = rand(15, 25); // Store rand result in a variable
            $damage = ($moveIndex + 1) * $damageMultiplier; // Random damage multiplier
            $selectedHero->setHealth($selectedHero->getHealth() - $damage);
            echo "{$opponentHero->getName()} attacks with {$attackMove}, dealing {$damage} damage. {$selectedHero->getName()} health: {$selectedHero->getHealth()}<br>";

            // Check if selected hero is still alive
            if ($selectedHero->getHealth() <= 0) {
                $winner = $opponentHero;
                $loser = $selectedHero;
                break;
            }
        }
        echo "</div>"; // End of the fight log div

        // Display the winner's gif and level up
        echo "<div style='flex: 1; text-align: center;'>";
        if (isset($winner)) {
            $winner->increaseLevel();
            $gifPath = "/website/images/" . strtolower($winner->getName()) . ".gif";
            echo "<h1 style='font-size: 2em; color: #FF0000;'>THE WINNER IS... {$winner->getName()}</h1>";
            echo "<img src='$gifPath' alt='{$winner->getName()}'>";
            echo "<p>Level Up! New Level: {$winner->getLevel()}</p>";

            // Insert fight result into database
            $stmt = $conn->prepare("INSERT INTO fight_results (winner, loser, winner_new_level) VALUES (?, ?, ?)");
            $winnerName = $winner->getName();
            $loserName = $loser->getName();
            $winnerNewLevel = $winner->getLevel();
            $stmt->bind_param("ssi", $winnerName, $loserName, $winnerNewLevel);
            $stmt->execute();
            $stmt->close();
        }
        echo "</div>"; // End of the winner's gif div

        echo "</div>"; // End of the container div
    }
}

$conn->close();
