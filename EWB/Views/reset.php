<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>新規登録画面</title>
  <link rel="stylesheet" href="/css/complete.css">
  <link rel="stylesheet" href="/css/header_contact.css">
  <link rel="stylesheet" href="/css/footer.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https:/ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
  <!-- ====== フォーム ======= -->
  <section>
    <div id="contact-box">
      <form action="complete_reset.php" method="post">
      <p>氏名 <input type="text" name="user_name" required></p>
      <p>メールアドレス <input type="text" name="email" required></p>
      <p>新規パスワード <input type="password" name="password" required></p>
      <p>パスワード確認用 <input type="password" name="password2" required></p>
      <?php
      if($password!=$password2){ //もしパスワード1とパスワード2の値が異なるなら
        print 'パスワードが一致しません。<br />';
      }
       ?>
      <p><input type="submit" value="パスワード再設定"></p>
      </form>
    </div>
  </section>

</body>

</html>
