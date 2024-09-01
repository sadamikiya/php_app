<?php
require_once('functions.php');
var_dump($_POST);  // ここを追記
exit;  // ここを追記
savePostedData($_POST);
header('Location: ./index.php');