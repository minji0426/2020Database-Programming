<?php
  $link = mysqli_connect('localhost', 'root', 'rootroot', 'kmj');
  $query = "SELECT * FROM topic";
  $result = mysqli_query($link, $query);
  $list ='';
  while ($row = mysqli_fetch_array($result)) {
      $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
  }

  $article = array(
    'title' => '안녕하세요',
    'description' => '집에서 시간을 보내는 요즘 추천하는 닌텐도 게임'
  );
  $update_link = '';
  $delete_link = '';

  if (isset($_GET['id'])) {
      $query = "SELECT * FROM topic WHERE id = {$_GET['id']}";
      $result = mysqli_query($link, $query);
      $row = mysqli_fetch_array($result);
      $article = array(
      'title' => $row['title'],
      'description' => $row['description']
    );
      $update_link = '<a href="update.php?id='.$_GET['id'].'">update</a>';
      $delete_link = '
      <form action ="process_delete.php" method="POST">
        <input type="hidden" name="id" value="'.$_GET['id'].'">
        <input type="submit" value="delete">
      </form>
      ';
  }
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> 닌텐도 게임 추천 </title>
</head>
<body>
  <h1><a href="index.php"> 닌텐도 게임 추천 </a></h1>
  <ol> <?= $list ?> </ol>
  <a href="create.php">create</a>
  <?=$update_link?>
  <?=$delete_link?>
  <h2> <?= $article['title'] ?> </h2>
  <?= $article['description'] ?>
</body>
</html>
