<?php

  require_once(ROOT_PATH . "Controllers/PostController.php");
  $check = new PostController();
  $check->registerPost();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>会員登録確認</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/confirm.css">
</head>
<header>
  <div id="menu" class="menu-list">
    <div class="menu-left">
      <a href="index2.php">
        <img class="logo-img" src="/img/logo.png" alt="ロゴ">
      </a>
    </div>
</header>

<body>
  <!-- ====== フォーム ======= -->
  <section>
    <div id="contact-box">
      <h2 class="contact-header">会員登録確認</h2>
      <form class="need-validation" method="post" action="complete_post.php">
        <p>下記の内容をご確認の上登録ボタンを押してください<br>
          内容を訂正する場合は戻るを押してください。</p>
        <div class="check-info">タイトル</div>
        <div class="box-info">
          <p class="post-info"><?=htmlspecialchars($_POST["title"])?></p>
        </div>
        <input type="hidden" name="title" value="<?=$_POST["title"]?>">

        <div class="check-info">ジャンル</div>
        <div class="box-info">
          <p class="post-info"><?=htmlspecialchars($_POST["genre"])?></p>
        </div>
        <input type="hidden" name="genre" value="<?=$_POST["genre"]?>">

        <div class="check-info">内容</div>
        <div class="box-info">
          <p class="post-info">
            <?=nl2br(htmlspecialchars($_POST["body"]));?>
          </p>
        </div>
        <input type="hidden" name="body" value="<?=$_POST["body"]?>">

        <div class="choice">
          <input class="next" type="submit" name="toComplete" value="投　稿">
          <a class="back" href="javascript:history.back();">戻　る</a>
        </div>
      </form>
    </div>
  </section>

</body>
</html>
