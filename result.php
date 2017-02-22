<?php
require_once './Encode.php';
require_once './DbManager.php';
?>
        <table border="2">
        <tr>
            <th>ID</th><th>投稿者</th><th>内容</th>
        </tr>
<?php
function getResult()
{
    try {
        $db = getDb();
//        select命令実行の準備
        $stt = $db->prepare('SELECT * from post');
//        select命令の実行
        $stt->execute();
//        レコードを連想配列の形式で結果内容を順に出力
        while ($row = $stt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <tr>
                <td><?php e($row['id']) ?></td>
                <td><?php e($row['name']) ?></td>
                <td><?php e($row['contents']) ?></td>
            </tr>
            <?php
        }
        $db = null;
    } catch (PDOException $e) {
        die("エラーメッセージ:{$e->getMessage()}");
    }
}
?>
      </table>
