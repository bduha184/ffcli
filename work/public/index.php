<?php
require_once(__DIR__ . '/../app/Lives.php');
require_once(__DIR__ . '/../app/Human.php');
require_once(__DIR__ . '/../app/Enemy.php');
require_once(__DIR__ . '/../app/Brave.php');
require_once(__DIR__ . '/../app/BlackMage.php');
require_once(__DIR__ . '/../app/WhiteMage.php');
require_once(__DIR__ . '/../app/Message.php');

echo "処理のはじまりはじまり～！\n\n";

$members = [];
$members[] = new Brave('ティーダ');
$members[] = new BlackMage('ユウナ');
$members[] = new WhiteMage('ルールー');

$enemies = [];
$enemies[] = new Enemy('ゴブリン', '20');
$enemies[] = new Enemy('ボム', '25');
$enemies[] = new Enemy('モルボル', '30');

$turn = 1;

$isFinishFlg = false;

$messageObj = new Message;

function isFinish($objects){

    $deathCnt = 0;

    foreach ($objects as $object) {
        if ($object->getHitPoint() > 0) {
            return false;
        }
        $deathCnt++;
    }
    if ($deathCnt === count($objects)) {
        return true;
    }
}

while (!$isFinishFlg) {
    echo "*** $turn ターン目 ***\n\n";

    //味方の全滅チェック

    $messageObj->displayStatusMessage($members);
    $messageObj->displayStatusMessage($enemies);

    $messageObj->displayAttachMessage($members, $enemies);
    $messageObj->displayAttachMessage($enemies, $members);

    $isFinishFlg = isFinish($members);
    if($isFinishFlg){
        $message = 'GAME OVER ...'."\n";
        break;
    }

    $isFinishFlg = isFinish($enemies);
    if($isFinishFlg){
        $message =  $message = '♪♪♪ファンファーレ♪♪♪'."\n";
        break;
    }


    $turn++;
}

echo "★★★ 戦闘終了 ★★★\n\n";

echo $message;

// 仲間の表示
$messageObj->displayStatusMessage($members);

// 敵の表示
$messageObj->displayStatusMessage($enemies);
