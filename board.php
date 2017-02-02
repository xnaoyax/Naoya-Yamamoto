<html lang="ja">
<html>
    <head>
        <meta charset = "UTF-8">
        <title>山本直弥の掲示板</title>
    </head>
　　<body>
        <h1>掲示板</h1>
        <p>名前、メッセージを入力して投稿して下さい。</p>
        <form method = "POST" action = "</php print($_SERVER['PHP_SELF7']) ?>">
            名前<input type = "text" name = "personal_name"><br><br>
            本文<textarea name = "contents" cols = "40" rows = "8"></textarea><br><br>
            <input type = "submit" name = "submit" value = "投稿">
        </form>
　　</body>
</html>

<?php
require_once './result.php';
require_once './DbManager.php';
$db = getDb();
    if (isset($_POST['personal_name']) && ($_POST['contents'])) {
        $personal_name = $_POST['personal_name'];
        $contents = $_POST['contents'];
        $contents = nl2br($contents);
        print ('<p>投稿者:' . $personal_name . '</p>');
        print ('<p>内容:</p>');
        print ('<p>' . $contents . '</p>');

        $pdo = new PDO('mysql:host=127.0.0.1;dbname=board1;charset=utf8', 'root', '');
        $sql = $pdo->prepare('insert into post values(null, ?, ?)');
    if ($sql->execute(array($_REQUEST['personal_name'], $_REQUEST['contents']))) {
        echo '投稿に成功しました。';
    } else {
        echo '投稿に失敗しました。';
    }
}
?>

