<?php
  //ダイレクトアクセス禁止
  if(!($_SERVER["REQUEST_METHOD"] == "POST")){
    header('Location: member.php');
    exit();
  }

  require_once(ROOT_PATH . "Controllers/PostController.php");
  $check = new PostController();
  $check->registerMember();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>会員登録確認</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/confirm.css">
</head>

<body>
  <!-- ====== フォーム ======= -->
  <section>
    <div id="contact-box">
      <h2 class="contact-header">会員登録確認</h2>
      <form class="need-validation" action="" method="post">
        <p>下記の内容をご確認の上登録ボタンを押してください<br>内容を訂正する場合は戻るを押してください。</p>

        <div class="check-info">氏名</div>
        <div class="box-info">
          <p class="post-info"><?=htmlspecialchars($_POST["name"])?></p>
        </div>
        <input type="hidden" name="name" value="<?=$_POST["name"]?>">

        <div class="check-info">メールアドレス</div>
        <div class="box-info">
          <p class="post-info"><?=htmlspecialchars($_POST["email"])?></p>
        </div>
        <input type="hidden" name="email" value="<?=$_POST["email"]?>">

        <div class="check-info">パスワード</div>
        <div class="box-info">
          <p class="post-info">
            ************
          </p>
        </div>
        <input type="hidden" name="password" value="<?=$_POST["password"]?>">

        <div class="choice">
          <input class="next" type="submit" name="toComplete" value="登　録">
          <a class="back" href="javascript:history.back();">戻　る</a>
        </div>
      </form>
    </div>
  </section>

</body>
</html>
