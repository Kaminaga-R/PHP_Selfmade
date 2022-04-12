<?php
require_once(ROOT_PATH .'Controllers/PostController.php');
$writing = new Postcontroller();
$params = $writing->index();

function e($s) {
    return htmlspecialchars($s, ENT_QUOTES, "UTF-8");
  }
 ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/base.css">
  <title>新規投稿</title>
  <!-- jQuery.jsの読み込み -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="/js/script1.js" defer></script>

</head>

<header>
  <div class="logo">
    <a href="index.php"><img src="/img/logo.png"></a>
  </div>

</header>

<div class="contact">
  <h1>新規投稿</h1>
<form action="writing_check.php" method="post">
 <!--ここにテキストフィールドやチェックボックスなどのhtmlタグを書いてい-->
<div class ="Top">
  <h2>投稿前に類似した投稿がないか確認してください</h2>
  <p><span>*</span>は必須項目となります。</p>
</div>

<div class ="form">
<div class = "title">
<label for ="title">タイトル<span>*</span></label>
<input id ="title" type="text"  name="title"  value="">
</div>

<div class = "genre">
<label for ="genre">ジャンル<span>*</span></label>
<select name='choose'>
  <option value='know'>知恵袋</option>
  <option value='trivia'>雑学</option>
  <option value='other'>その他</option>
</select>
</div>

<div class = "form1">
  <div class ="body">
    <label for="body">内容</label>
    <textarea id="body" name="body"></textarea>
  </div>
  <button id="btn" class="btn" name="btn" type="submit">確&emsp;認</button>
</div>
</div>
</div>


    </table>
</div>
</form>
</div>

<?php include ( dirname(__FILE__) . '/footer.php' ); ?>
