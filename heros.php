<?php
require_once 'index.php';

// Add heroes
$heroes = [
    // Warriors
    new Warrior('Vegeta', 800, 800, ['Final Flash', 'Big Bang Attack', 'Galick Gun', 'Shine Attack', 'Spirit Bomb'], 1),
    new Warrior('Goku', 8000, 1000, ['Kamehameha', 'Dragon Fist', 'Spirit Bomb', 'Instant Transmission'], 1),
    new Warrior('Thor', 800, 850, ['Mjolnir Strike', 'Thunderbolt', 'Hammer Throw', 'Asgardian Rage'], 1),
    new Warrior('Hulk', 9000, 900, ['Smash', 'Thunder Clap', 'Ground Pound', 'Roar'], 1),
    new Warrior('Captain America', 700, 750, ['Shield Throw', 'Super Soldier Punch', 'Kick', 'Shield Block'], 1),
    new Warrior('Iron Man', 700, 699, ['Repulsor Blast', 'Unibeam', 'Missiles', 'Punch'], 1),
    new Warrior('Black Panther', 650, 600, ['Claw Strike', 'Kick', 'Pounce', 'Stealth Attack'], 1),
    new Warrior('Naruto', 500, 500, ['Rasengan', 'Shadow Clone', 'Nine-Tails Cloak', 'Chidori'], 1),
    new Warrior('Sasuke', 450, 500, ['Chidori', 'Fireball Jutsu', 'Amaterasu', 'Susanoo'], 1),
    new Warrior('Luffy', 400, 490, ['Gum-Gum Pistol', 'Gum-Gum Bazooka', 'Gum-Gum Gatling', 'Gear Fourth'], 1),

    // Mages
    new Mage('Doctor Strange', 300, 500, ['Mystic Arts', 'Shield Spell', 'Time Manipulation', 'Energy Blast'], 1),
    new Mage('Scarlet Witch', 300, 450, ['Chaos Magic', 'Telekinesis', 'Energy Projection', 'Reality Warp'], 1),
    new Mage('Loki', 700, 800, ['Illusion', 'Mind Control', 'Energy Blast', 'Teleport'], 1),
    new Mage('Raven', 300, 400, ['Soul Self', 'Darkness Manipulation', 'Teleport', 'Energy Blast'], 1),
    new Mage('Zatanna', 400, 300, ['Spell Casting', 'Telekinesis', 'Teleport', 'Healing'], 1),
    new Mage('Erza Scarlet', 300, 540, ['Requip Magic', 'Sword Magic', 'Telekinesis', 'Healing'], 1),
    new Mage('Natsu Dragneel', 400, 600, ['Fire Dragon Roar', 'Fire Dragon Iron Fist', 'Lightning Flame Dragon Mode', 'Teleport'], 1)
];
