<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>新規登録画面</title>
  <link rel="stylesheet" href="/css/complete.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https:/ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <!-- jQuery.jsの読み込み -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="/js/script1.js" defer></script>
</head>

<body>
  <!-- ====== フォーム ======= -->
  <section>
    <div class="outer-center" id="contact-box">
      <h1>新規登録</h1>
      <form action="check_member.php" method="post">
      <div class = "name">
      <label for ="nam">名前<span>*</span></label>
      <input id ="name" type="name"  name="name" placeholder="山田太郎" value="">
      </div>

      <div class = "email">
      <label for ="mail">メールアドレス<span>*</span></label>
      <input id ="email" type="email"  name="email" placeholder="test@test.co.jp" value="">
      </div>

      <div class = "password">
      <label for ="pass">パスワード<span>*</span></label>
      <input id ="password" type="password"  name="password"  value="">
      </div>

      <div class = "password2">
      <label for ="pass2">パスワード確認<span>*</span></label>
      <input id ="password2" type="password"  name="password2"  value="">
      </div>

      <?php
      $error = "";
      if (($_POST['password'] != $_POST['password2']) && ($_POST['password2'] != "")){
          $error = "入力が正しくありません。";
      }
       ?>
      <p><input class="login-btn" type="submit" value="新規登録"></p>

      </form>
    </div>
  </section>

</body>

</html>
