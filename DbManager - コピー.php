<?php
function getDb()
{
    $dsn = 'mysql:dbname=board1; host=127.0.0.1';
    $usr = 'root';
    $pass = '';
    try {
        $db = new PDO($dsn, $usr, $pass);
        $db->exec('SET NAMES utf8');
        print '接続に成功しました。';
    } catch (PDOException $e) {
        die ("データベースへの接続エラー:{$e->getMessage()}");
    }
    return $db;
}

