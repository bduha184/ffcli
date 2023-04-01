<?php

require_once(__DIR__ . '/../app/Human.php');
require_once(__DIR__ . '/../app/Enemy.php');
require_once(__DIR__ . '/../app/Brave.php');

echo "処理のはじまりはじまり～！\n\n";

$tiida = new Brave('ティーダ');
$goblin = new Enemy('ゴブリン');
// $brave = new Brave();

$turn = 1;

while ($tiida->getHitPoint() > 0 && $goblin->getHitPoint() > 0) {
    echo "*** $turn ターン目 ***\n\n";
    echo $tiida->getName() . ':' . $tiida->getHitPoint() . '/' . $tiida::MAX_HITPOINT . "\n";
    echo $goblin->getName() . ':' . $goblin->getHitPoint() . '/' . $goblin::MAX_HITPOINT . "\n";

    echo "\n";

    $tiida->doAttack($goblin);
    echo "\n";
    $goblin->doAttack($tiida);
    echo "\n";

    $turn++;
}

echo "★★★ 戦闘終了 ★★★\n\n";
echo $tiida->getName() . ":" . $tiida->getHitPoint() . "/" . $tiida::MAX_HITPOINT . "\n";
echo $goblin->getName() . ":" . $goblin->getHitPoint() . "/" . $goblin::MAX_HITPOINT . "\n\n";
