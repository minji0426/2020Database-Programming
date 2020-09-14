<?php
  $link = mysqli_connect('localhost','root','k5669203','tra');
  $query = "SELECT * FROM film";
  $result = mysqli_query($link, $query);
  $list = '';
  while($row = mysqli_fetch_array($result)){
    $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
  }

  $article = array(
    'title' => '안녕하세요',
    'mainactors' => '집에서 시간을 보내는 요즘 추천하는 게임: 모여봐요 동물의 숲.'
  );

  if(isset($_GET['id']) ) {
    $query = "SELECT * FROM film WHERE id={$_GET['id']}";
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);
    $article = array(
      'title' => $row['title'],
      'description' => $row['description']
    );
  }
?>


 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>flower</title>
   </head>
   <body>
     <h1><a href="index.php">game</a></h1>
     <ol><?= $list ?></ol>
     <a href="create.php">create</a>
     <h2><?= $article['title'] ?></h2>
     <?= $article['description'] ?>
   </body>
 </html>
