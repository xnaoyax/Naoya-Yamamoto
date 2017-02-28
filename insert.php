<?php
require_once './DbManager.php';
?>

<?php
function getData()
{
    try {
//    データベースへの接続を確立
        $db = getDb();
//    postテーブルに対して新規にレコードを挿入
        $stt = $db->prepare('INSERT INTO post (name, contents) VALUES (:name,:contents)');
        $stt->bindValue (':name', $_POST['personal_name']);
        $stt->bindValue (':contents', $_POST['contents']);
//    INSERT命令で取得したオートインクリメント値を取得
        if ($stt->execute()) {
            $message = '追加に成功しました。';

            return print $message;
        } else {
            $message = '追加に失敗しました。';
            return print $message;
        }
        $db = null;
    } catch (PDOException $e) {
        die("エラーメッセージ:{$e->getMessage()}");
    }
}