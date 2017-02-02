<?php
function getDb()
{
    $dsn = 'mysql:dbname=board1; host=127.0.0.1';
    $usr = 'root';
    $pass = '';

    try {
        $db = new PDO($dsn, $usr, $pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $db->exec('SET NAMES utf8');
        //print 'データベースの接続に成功しました。';
    } catch (PDOException $e) {
        die ("データベースへの接続に失敗しました。:{$e->getMessage()}");
    }
    return $db;

}

//functionで定義。上の一文で実行。