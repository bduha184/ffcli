<?php
require_once(__DIR__ . '/../Lib/Loader.php');
require_once(__DIR__ . '/../Lib/Utility.php');

$loader = new Loader();

$loader->regDirectory(__DIR__.'/../app');
$loader->register();

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
