<?php
require_once './Encode.php';
require_once './DbManager.php';
require_once './insert.php';
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset = "UTF-8">
    <title>山本直弥の掲示板</title>
</head>
　　<body>
<h1>掲示板</h1>
<p>名前、メッセージを入力して投稿して下さい。</p>
<p>名前は11文字以内、メッセージは320文字以内で入力してください。</p>
<form method = "POST" action = "<?php print($_SERVER['PHP_SELF']) ?>">
    名前<input type = "text" name = "personal_name" maxlength= "11"><br><br>
    本文<textarea name = "contents" cols = "40" rows = "8" maxlength="320"></textarea><br><br>
    <input type = "submit" name = "submit" value = "投稿">
</form>

<?php
if (isset($_POST['personal_name'], $_POST['contents'])) {
    if ($_POST['personal_name'] === "" && $_POST['contents']=== "") {
        echo "名前と本文の両方を入力して下さい。";
    } elseif ($_POST['personal_name'] === "") {
        echo "名前を入力して投稿して下さい。";
    } elseif ($_POST['contents']=== "") {
        echo "本文を入力して投稿して下さい。";
    } else {
        getData();
    }
}
?>


<table border="2">
    <tr>
        <th>ID</th><th>投稿者</th><th>内容</th>
    </tr>
    <?php
    try {
        $db =getDb();
//        select命令実行の準備
        $stt = $db->prepare('SELECT * from post');
//        select命令の実行
        $stt->execute();
//        レコードを連想配列の形式で結果内容を順に出力
        while($row = $stt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <tr>
                <td><?php e($row['id']) ?></td>
                <td><?php e($row['name']) ?></td>
                <td><?php e($row['contents']) ?></td>
            </tr>
            <?php
        }
        $db = null;
    } catch(PDOException $e) {
        die("エラーメッセージ:{$e->getMessage()}");
    }

    ?>
</table>
　　</body>
</html>

