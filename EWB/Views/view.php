<?php
require_once(ROOT_PATH . "Controllers/PostController.php");
$posts = new PostController();
$params = $posts->view();
$isAdmin = $posts->isAdmin();
$postInfo = $params["Posts"];
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>投稿詳細</title>
  <link rel="stylesheet" href="/css/base.css">
  <link rel="stylesheet" href="/css/style.css">
</head>
<body>
  <section class="post-info">
    <h2>投稿詳細</h2>
    <table>
      <tr>
        <td>投稿者</td>
        <td><?=$postInfo['user']?></td>
      </tr>
      <tr>
        <td>タイトル</td>
        <td><?=$postInfo['title']?></td>
      </tr>
      <tr>
        <td>ジャンル</td>
        <td><?=$postInfo['genre']?></td>
      </tr>
      <tr>
        <td>内容</td>
        <td><?=$postInfo['content']?></td>
      </tr>
      <tr>
        <td>閲覧数</td>
        <td><?=$postInfo['view']?></td>
      </tr>
      <tr>
        <td>いいね</td>
        <td><?=$postInfo['good']?></td>
      </tr>
    </table>
    <div class=top-link>
      <button class="button-link" type="button" onclick="location.href='index.php';">戻る</button>
    </div>
  </section>

  <tr>
    <?php if($isAdmin): ?>
    <td>
      <form action="edit.php" method="post">
        <a type="submit" href="edit.php?id=<?=$posts['id']?>" name="editID" value="<?=$posts['id']?>">編集</a>
      </form>
    </td>
    <td>
      <p class="delete-link" value="<?=$posts['id']?>">削除</p>
    </td>
  <?php endif?>
  </tr>

</body>
</html>
