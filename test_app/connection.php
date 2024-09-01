<?php
require_once('config.php');

// PDOクラスのインスタンス化
function connectPdo()
{
    try {
        return new PDO(DSN, DB_USER, DB_PASSWORD);
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }
}
// 新規作成処理
function createTodoData($todoText)
{
    $dbh = connectPdo();
    $sql = 'INSERT INTO todos (content) VALUES ("' . $todoText . '")';
    $dbh->query($sql);
}
function getAllRecords()
{
    $dbh = connectPdo();
    $sql = 'SELECT * FROM todos WHERE deleted_at IS NULL';
    return $dbh->query($sql)->fetchAll();
}
function getTodoTextById($id)
{
    $dbh = connectPdo();
    $sql = 'SELECT * FROM todos WHERE deleted_at IS NULL AND id = $id';
    $data = $dbh->query($sql)->fetch();
    return $data['content'];
}
function deleteTodoData($id)
{
    $dbh = connectPdo();  
    $now = date('Y-m-d H:i:s'); 

    // 論理削除を行うSQL文を準備
    $sql = "UPDATE todos SET deleted_at = '$now' WHERE id = $id";

    // SQL文を実行
    $dbh->query($sql);
}
