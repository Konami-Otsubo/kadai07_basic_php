<?php
// データの受け取り
$name = $_POST['name'];
$mail = $_POST['mail'];
$expectation = isset($_POST['expectation']) ? $_POST['expectation'] : '未選択';
$satisfaction = isset($_POST['satisfaction']) ? $_POST['satisfaction'] : '未選択';
$good_content = $_POST['good_content'];
$message = $_POST['message'];
$participation = isset($_POST['participation']) ? $_POST['participation'] : '未選択';
$study_date = $_POST['study_date'];

// CSVファイルをShift-JISで開く
$file = fopen('data.csv', 'a');
if ($file === FALSE) {
    die("CSVファイルを開けませんでした。ディレクトリの書き込み権限を確認してください。");
}

// ファイルをロックして他のプロセスによる同時アクセスを防ぐ
if (flock($file, LOCK_EX)) {
    // ファイルが空の場合、BOMを追加しない（Shift-JISではBOMは不要）
    // データをShift-JISに変換
    $date = date('Y-m-d H:i:s'); // 現在時刻を取得

    // 文字列データをShift-JISに変換
    $data = [$study_date, $name, $mail, $expectation, $satisfaction, $good_content, $message, $participation, $date];
    $data_sjis = array_map(function($value) {
        return mb_convert_encoding($value, 'SJIS-win', 'UTF-8');
    }, $data);

    // CSVに書き込む
    fputcsv($file, $data_sjis);

    // ロック解除
    flock($file, LOCK_UN);
} else {
    die("ファイルをロックできませんでした。他のプロセスが使用中の可能性があります。");
}

fclose($file); // ファイルを閉じる

// 完了メッセージ
echo "アンケートが送信されました！<br>";
echo "<a href='index.php'>戻る</a>";
?>
