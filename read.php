<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>アンケート結果</title>
</head>
<body>
    <h1>アンケート結果</h1>
    <table border="1">
        <tr>
            <th>お名前</th>
            <th>EMAIL</th>
            <th>今日の期待値</th>
            <th>満足度</th>
            <th>良かった内容</th>
            <th>メッセージ</th>
            <th>次回の参加希望</th>
            <th>送信日時</th>
        </tr>

        <?php
        if (($file = fopen('data.csv', 'r')) !== FALSE) {
            while (($data = fgetcsv($file)) !== FALSE) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($data[0]) . "</td>";
                echo "<td>" . htmlspecialchars($data[1]) . "</td>";
                echo "<td>" . htmlspecialchars($data[2]) . "</td>";
                echo "<td>" . htmlspecialchars($data[3]) . "</td>";
                echo "<td>" . htmlspecialchars($data[4]) . "</td>";
                echo "<td>" . htmlspecialchars($data[5]) . "</td>";
                echo "<td>" . htmlspecialchars($data[6]) . "</td>";
                echo "<td>" . htmlspecialchars($data[7]) . "</td>";
                echo "</tr>";
            }
            fclose($file);
        }
        ?>
    </table>

    <br><br>
    <a href="index.php">アンケートフォームに戻る</a>
</body>
</html>
