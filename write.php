<?php
date_default_timezone_set('Asia/Tokyo');

$date = date('Y/m/d H:i:s');
$achievement_rate = $_POST['speed'];
$achievement = $_POST['achievement'];
$emotions = $_POST['emotions'];
$emotionsText = implode(' / ', $emotions);
$thoughts = $_POST['thoughts'];

$hours_mon = $_POST['hours_mon'];
$hours_tue = $_POST['hours_tue'];
$hours_wed = $_POST['hours_wed'];
$hours_thu = $_POST['hours_thu'];
$hours_fri = $_POST['hours_fri'];
$hours_sat = $_POST['hours_sat'];
$hours_sun = $_POST['hours_sun'];
$hours_sum = $_POST['hours_sum'];

$curriculum_title = $_POST['curriculum_title'];
$original_goal = $_POST['original_goal'];
$mentor_consultation = $_POST['mentor_consultation'];

$data = "記録日：".$date ."\n".
"①目標の達成率：".$achievement_rate ."\n".
"②目標の達成要因/未達要因：".$achievement ."\n".
"③今週を振り返って印象に残っている感情：".$emotionsText ."\n".
"④今週の感想・学び・今の気持ち：".$thoughts ."\n".
"①目標学習時間" ."\n".
"月：".$hours_mon ."\n".
"火：".$hours_tue ."\n".
"水：".$hours_wed ."\n".
"木：".$hours_thu ."\n".
"金：".$hours_fri ."\n".
"土：".$hours_sat ."\n".
"日：".$hours_sun ."\n".
"合計：".$hours_sum ."\n".
"②来週のカリキュラム達成目標：".$curriculum_title ."\n".
"③来週のオリジナル目標：".$original_goal ."\n".
"④メンターに相談したいこと：".$mentor_consultation ."\n".
"------------------------" ."\n";



file_put_contents('data/data.txt',$data, FILE_APPEND) .PHP_EOL;
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/write.css">
    
    <title>記録完了</title>
</head>

<body>
    <div class="swrite">
    <div class="swrite_inner">

        <div class="swrite_head">
        <div class="swrite_badge">✅ 記録が完了しました</div>
        <h1 class="swrite_title">学習の記録（送信内容）</h1>
        <p class="swrite_sub">送信された内容を保存しました。</p>
        </div>

        <!-- 今週の振り返り -->
        <section class="swrite_card">
        <div class="swrite_cardHead">
            <h2 class="swrite_cardTitle">今週の振り返り</h2>
            <span class="swrite_stamp">記録日：<?= $date ?></span>
        </div>

        <dl class="swrite_dl">
            <div class="swrite_row">
            <dt>① 目標の達成率</dt>
            <dd><strong><?= $achievement_rate ?>%</strong></dd>
            </div>

            <div class="swrite_row">
            <dt>② 達成要因 / 未達要因</dt>
            <dd class="swrite_pre"><?= $achievement ?></dd>
            </div>

            <div class="swrite_row">
            <dt>③ 印象に残っている感情</dt>
            <dd><?= $emotionsText ?></dd>
            </div>

            <div class="swrite_row">
            <dt>④ 感想・学び・今の気持ち</dt>
            <dd class="swrite_pre"><?= $thoughts ?></dd>
            </div>
        </dl>
        </section>

        <!-- 来週の目標 -->
        <section class="swrite_card">
        <div class="swrite_cardHead">
            <h2 class="swrite_cardTitle">来週の目標</h2>
            <span class="swrite_stamp">目標学習時間（h）</span>
        </div>

        <div class="swrite_tableWrap">
            <table class="swrite_table">
            <thead>
                <tr>
                <th>月</th><th>火</th><th>水</th><th>木</th><th>金</th><th>土</th><th>日</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td><?= $hours_mon ?></td>
                <td><?= $hours_tue ?></td>
                <td><?= $hours_wed ?></td>
                <td><?= $hours_thu ?></td>
                <td><?= $hours_fri ?></td>
                <td><?= $hours_sat ?></td>
                <td><?= $hours_sun ?></td>
                </tr>
                <tr>
                <td colspan="5" class="swrite_blank"></td>
                <td class="swrite_sumLabel">合計</td>
                <td class="swrite_sumVal"><?= $hours_sum ?> h</td>
                </tr>
            </tbody>
            </table>
        </div>

        <dl class="swrite_dl swrite_dl_mt">
            <div class="swrite_row">
            <dt>② 来週のカリキュラム達成目標</dt>
            <dd><?= $curriculum_title ?></dd>
            </div>
            <div class="swrite_row">
            <dt>③ 来週のオリジナル目標</dt>
            <dd class="swrite_pre"><?= $original_goal ?></dd>
            </div>
            <div class="swrite_row">
            <dt>④ メンターに相談したいこと</dt>
            <dd class="swrite_pre"><?= $mentor_consultation ?></dd>
            </div>
        </dl>

        <div class="swrite_actions">
            <a class="swrite_btn swrite_btn_primary" href="index.html">← フォームに戻る</a>
        </div>
        </section>

    </div>
    </div>
</body>
</html>