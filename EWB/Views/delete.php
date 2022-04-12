
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>削除確認</title>
  <link rel="stylesheet" href="/css/base.css">
  <link rel="stylesheet" href="/css/style.css">
  <link rel="stylesheet" href="/css/confirm.css">
  <link rel="stylesheet" href="/css/check.css">
  <link rel="stylesheet" href="/css/edit.css">
</head>
<body>
  <header>
    <div id="menu" class="menu-list">
      <div class="menu-left">
        <a href="index2.php">
          <img class="logo-img" src="/img/logo.png" alt="ロゴ">
        </a>
      </div>
  </header>

  <section class="post-info">
    <h2><span style="color: red">本当に削除しますか？</h2>
    <table>
      <tr>
        <td>投稿者</td>
        <td>1</td>
      </tr>
      <tr>
        <td>タイトル</td>
        <td>テスト1</td>
      </tr>
      <tr>
        <td>ジャンル</td>
        <td>雑学</td>
      </tr>
      <tr>
        <td>内容</td>
        <td>ここに内容が表示されます。</td>
      </tr>
    </table>

    <div class="choice">
      <a class="back" href="javascript:history.back();">戻　る</a>
    </div>
    <div class="choice">
      <p></p>
    </div>
    <div class="choice">
      <button class="input-dl" type="button" onclick="location.href='complete_delete.php';">削　除</button>
    </div>

  </section>


</body>
</html>
