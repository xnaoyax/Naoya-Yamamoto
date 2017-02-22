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
        $stt = $db->prepare('INSERT INTO post VALUES (?,?,?)');
//    直近のINSERT命令で取得したオートインクリメント値を取得
        if ($stt->execute([null, $_POST['personal_name'], $_POST['contents']])) {
            $a = '追加に成功しました。';

            return print $a;
        } else {
            $a = '追加に失敗しました。';
            return print $a;
        }
        $db = null;
    } catch (PDOException $e) {
        die("エラーメッセージ:{$e->getMessage()}");
    }
}