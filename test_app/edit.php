<?php
require_once('functions.php');
$todo = getSelectedTodo($_GET['id']);
setToken(); // 追記
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>編集</title>
</head>
<body>
<?php if (!empty($_SESSION['err'])): ?> // 追記
    <p><?= $_SESSION['err']; ?></p> // 追記
  <?php endif; ?> // 追記
  <form action="store.php" method="post">
    <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
    <input type="text" name="content" value="<?= $todo ?>">
    <input type="submit" value="更新">
  </form>
  <div>
    <a href="index.php">一覧へもどる</a>
  </div>
  <?php unsetError(); ?> // 追記
</body>
</html>