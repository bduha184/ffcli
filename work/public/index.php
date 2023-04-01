<?php

require_once(__DIR__ . '/../app/Human.php');
require_once(__DIR__ . '/../app/Enemy.php');
require_once(__DIR__ . '/../app/Brave.php');

echo "処理のはじまりはじまり～！\n\n";

$tiida = new Human();
$goblin = new Enemy();
$brave = new Brave();

$tiida->name = "ティーダ";
$goblin->name = "ゴブリン";
$turn = 1;

while ($tiida->hitPoint > 0 && $goblin->hitPoint > 0) {
    echo "*** $turn ターン目 ***\n\n";
    echo $tiida->name . ':' . $tiida->hitPoint . '/' . $tiida::MAX_HITPOINT . "\n";
    echo $goblin->name . ':' . $goblin->hitPoint . '/' . $goblin::MAX_HITPOINT . "\n";

    echo "\n";

    $tiida->doAttack($goblin);
    echo "\n";
    $goblin->doAttack($tiida);
    echo "\n";

    $turn++;
}

echo "★★★ 戦闘終了 ★★★\n\n";
echo $tiida->name . ":" . $tiida->hitPoint . "/" . $tiida::MAX_HITPOINT . "\n";
echo $goblin->name . ":" . $goblin->hitPoint . "/" . $goblin::MAX_HITPOINT . "\n\n";
