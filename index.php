<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>勉強会アンケート</title>
</head>
<body>
    <h1>勉強会アンケート</h1>

    <?php
    // 勉強会の日時を自動取得
    $date_time = date('Y年m月d日 H:i');
    ?>

    <form action="write.php" method="post">
        <label>勉強会日時: <input type="text" name="study_date" value="<?php echo $date_time; ?>" readonly></label><br><br>
        
        お名前: <input type="text" name="name" required><br><br>
        EMAIL: <input type="email" name="mail" required><br><br>

        今日の期待値は？<br>
        <input type="radio" name="expectation" value="1"> 1
        <input type="radio" name="expectation" value="2"> 2
        <input type="radio" name="expectation" value="3"> 3
        <input type="radio" name="expectation" value="4"> 4
        <input type="radio" name="expectation" value="5"> 5<br><br>

        勉強会が終わった後の満足度は？<br>
        <input type="radio" name="satisfaction" value="1"> 1
        <input type="radio" name="satisfaction" value="2"> 2
        <input type="radio" name="satisfaction" value="3"> 3
        <input type="radio" name="satisfaction" value="4"> 4
        <input type="radio" name="satisfaction" value="5"> 5<br><br>

        特に良かった内容、今後の学びになったこと:<br>
        <textarea name="good_content" rows="4" cols="50"></textarea><br><br>

        講師にメッセージを！<br>
        <textarea name="message" rows="4" cols="50"></textarea><br><br>

        次回も参加したいと思いますか？<br>
        <input type="radio" name="participation" value="はい"> はい
        <input type="radio" name="participation" value="いいえ"> いいえ
        <input type="radio" name="participation" value="内容によって"> 内容によって<br><br>
        
        <input type="submit" value="送信">
    </form>
</body>
</html>
