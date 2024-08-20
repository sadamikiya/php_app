<?php
require_once('connection.php');

function createData($post)
{
  createTodoData($post['content']);  // ここを追記
}
function getTodoList()
{
    return getAllRecords();
}