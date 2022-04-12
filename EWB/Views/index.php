<?php
session_start();
require_once(ROOT_PATH . "Controllers/PostController.php");
$posts = new PostController();
$isAdmin = $posts->isAdmin(); //管理ユーザーでない（false）場合は「編集」「削除」を表示しない
$post->delete(); //ID削除
$params = $post->index();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <title>オブジェクト指向 - 投稿一覧</title>
  <link rel="stylesheet" href="/css/base.css">
  <link rel="stylesheet" href="/css/style.css">
  <script src="/js/index.js"></script>
</head>
<body>
  <section>
    <!-- 投稿一覧 -->
    <h2>投稿一覧</h2>
    <table>
      <tr class=head-tr>
        <th>投稿者</th>
        <th>タイトル</th>
        <th>ジャンル</th>
      </tr>
      <?php
        foreach ($params['posts'] as $posts):
          if($player["del_flg"] == 0):
      ?>
      <tr>
        <td><?=$posts['name']?></td>
        <td><?=$posts['title']?></td>
        <td><?=$posts['genre']?></td>
        <td>
          <form action="view.php" method="post">
            <a type="submit" href="view.php?id=<?=$posts['id']?>" name="id" value="<?=$posts['id']?>">詳細</a>
          </form>
        </td>
        <?php if($isAdmin): ?>
        <td>
          <form action="view.php" method="post">
            <a type="submit" href="edit.php?id=<?=$posts['id']?>" name="editID" value="<?=$posts['id']?>">編集</a>
          </form>
        </td>
        <td>
          <p class="delete-link" value="<?=$posts['id']?>">削除</p>
        </td>
        <?php endif?>
      </tr>
      <?php
      endif;
      endforeach;
      ?>
    </table>


    <div class="paging">
      <?php
      for ($i=0; $i < $params["pages"]; $i++) {
        if(isset($_GET["pages"]) && $_GET["page"]== $i){
          echo $i + 1;
        }else{
          echo "<a class='page-link' href='?page=". $i . "'>". ($i+1) . "</a> ";
        }
      }
      ?>
    </div>
  </section>

</body>
</html>
