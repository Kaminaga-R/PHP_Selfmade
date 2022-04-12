<?php
  //ダイレクトアクセス禁止
  $referer = $_SERVER['HTTP_REFERER'];
  $url = "edit.php";
  if(!strstr($referer,$url)){
    header("Location: login.php");
    exit;
  }

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <title>編集完了画面</title>
  <link rel="stylesheet" href="/css/complete.css">
  <link rel="stylesheet" href="/css/header_contact.css">
  <link rel="stylesheet" href="/css/footer.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https:/ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="/js/header.js"></script>
</head>

<body>
  <!-- ====== フォーム ======= -->
  <section>
    <div id="contact-box">
      <h2 class="contact-header">編集完了</h2>
      <div class=need-validation>
        <p>編集が完了しました。</p>
        <a id="toTop" href="index.php">投稿内容へ戻る</a>
      </div>
    </div>
  </section>

</body>

</html>
