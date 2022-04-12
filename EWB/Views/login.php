<?php
session_start();
if(isset($_SESSION["role"])){
  header("Location: index.php");
}

require_once(ROOT_PATH . "Models/Users.php");
require_once(ROOT_PATH . "Models/Admin.php");
$posts = new PostController();
$form = [
  "email" => "",
  "password" => ""
];

if($_SERVER["REQUEST_METHOD"] = "POST" && isset($_POST["login"])){
  $form["email"] = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
  $form["password"] = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
  $loginError = $posts->login($form["email"], $form["password"]);
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/base.css">
  <link rel="stylesheet" href="/css/style.css">
  <title>ログイン画面</title>
</head>
<body>
  <section class="login-section">
    <h2 class="outer-center">ログイン</h2>
    <div class="outer-center">
      <form class="login-form" action="" method="post">
        <dl>
          <dt>メールアドレス</dt>
          <dd>
            <input type="text" name="email" value="<?= htmlspecialchars($form["email"], ENT_QUOTES) ?>">
          </dd>
          <dt>パスワード</dt>
          <dd>
            <input type="password" name="password" value="<?= htmlspecialchars($form["password"], ENT_QUOTES) ?>">
          </dd>
          <?php if(isset($loginError["blank"])):?>
          <dt class="login-error"><?= $loginError["blank"] ?></dt>
          <?php endif?>
          <?php if(isset($loginError["failed"])):?>
          <dt class="login-error"><?= $loginError["failed"] ?></dt>
          <?php endif?>
        </dl>
        <div>
          <input class="login-btn" type="submit" name="login" value="ログイン">
        </div>
        <div>
          <input class="login-btn" type="button" name="member" onclick="location.href='member.php'" value="新規登録">
        </div>
        <div>
          <input class="reset-btn" type="button" name="reset" onclick="location.href='reset.php'" value="パスワードを忘れた方はこちら">
        </div>
      </form>
    </div>
  </section>

</body>
</html>
