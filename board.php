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
        <?php require_once './result.php'; ?>
　　</body>
</html>

<?php
require_once './DbManager.php';


    if (isset($_POST['personal_name']) && ($_POST['contents'])) {
        if ($_POST['personal_name'] == "" || $_POST['contents'] == "") {
            print "未入力の項目があります。";
        } else {
            if (mb_strlen($_POST['personal_name']) > 11) {
                echo "名前は11文字以内で入力して下さい。";
            } elseif (mb_strlen($_POST['contents']) > 320) {
                echo "内容は320文字以内で入力して下さい。";
            } else {
            try {
//                データベースへの接続を確立
                $db = getDb();
                $id = $_POST['id'];
                $personal_name = $_POST['personal_name'];
                $contents = $_POST['contents'];
//                INSERT命令の準備
                $stt = $db->prepare('INSERT INTO post(id, name, contents) VALUES(:id, :name, :contents)');
//                INSERT命令にポストデータの内容をセット
                $stt->bindValue(1, $id);
                $stt->bindValue(2, $personal_name);
                $stt->bindValue(3, $contents);
//                INSERT命令を実行
                $stt->execute();
                $db = NULL;
                } catch (PDOException $e) {
                die("エラーメッセージ:{$e->getMessage()}");
                }
                }
        }
    }
?>

