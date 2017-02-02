<?php
require_once '../Encode.php';
require_once '../DbManager.php';
?>
<html>
    <head>
        <title>投稿表示</title>
    </head>
    <body>
        <table border="2">
        <tr>
        <th>投稿者</th><th>内容</th>
        </tr>
<?php
    try {
        $db =getDb();
        $stt = $db->prepare('SELECT * from post');
        $stt->execute();
        while($row = $stt->fetch(PDO::FETCH_ASSOC)) {
?>
    <tr>
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