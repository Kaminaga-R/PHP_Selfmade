<?php
session_start();
if(!(isset($_SESSION["role"]) && $_SESSION["role"] == 0)){
  header("Location: index.php");
}
require_once(ROOT_PATH . "Controllers/PostController.php");
$player = new PostController();
$verifiedData = $player->editValidation();
$params = $player->edit();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="/css/base.css">
  <link rel="stylesheet" href="/css/style.css">
  <script src="/js/index.js"></script>
  <title>投稿編集</title>
</head>
<body>
  <section>
    <!-- 更新時のポップアップ -->
    <?php
    if($verifiedData != null):?>
    <div class="edit-clicked">
      <div class="overlay">
        <div class="edit-confirm outer-center">
          <div>
            <div>
              <p class="edit-error"><?= $verifiedData ?></p>
            </div>
            <div class="outer-around">
              <button class="edit-ok">OK</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php endif;?>

    <!-- 情報編集 -->
    <h2>投稿内容編集</h2>
    <form action="edit.php?id=<?=$params['player']['id']?>" method="post">
      <input type="hidden" name="id" value="<?=$params["player"]["id"]?>">
      <table>
        <tr>
          <td>タイトル</td>
          <td>
            <select name="country_id">
              <?php
              foreach ($params["country_names"] as $country_id => $country_name){
                if($country_id == $params["player"]["country_id"]){
                  echo "<option value={$country_id} selected>$country_name</option>";
                }else{
                  echo "<option value={$country_id}>$country_name</option>";
                }
              }
              ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>内容</td>
          <td>
            <input type="text" name="uniform_num" value="<?=$params["player"]["uniform_num"]?>">
          </td>
        </tr>
        <tr>
          <td>ジャンル</td>
          <td>
            <select action="edit.php" name="position">
              <?php
              $positions = ["生活", "雑学", "生物", "その他"];
              foreach ($positions as $position) {
                if($position == $params["player"]["position"]){
                  echo "<option value={$position} selected>$position</option>";
                }else{
                  echo "<option value={$position}>$position</option>";
                }
              }
              ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>名前</td>
          <td>
            <input type="text" name="name" value="<?=$params["player"]["name"]?>">
          </td>
        </tr>
        <tr>
          <td>所属</td>
          <td>
            <input type="text" name="club" value="<?=$params["player"]["club"]?>">
          </td>
        </tr>
        <tr>
          <td>誕生日</td>
          <td>
            <input type="date" name="birth" value="<?=$params["player"]["birth"]?>">
          </td>
        </tr>
        <tr>
          <td>身長</td>
          <td>
            <input type="text" name="height" value="<?=$params["player"]["height"]?>">
          </td>
        </tr>
        <tr>
          <td>体重</td>
          <td>
            <input type="text" name="weight" value="<?=$params["player"]["weight"]?>">
          </td>
        </tr>
      </table>
      <div>
        <input class="button-link" type="submit" name="editID" value="編集">
        <button class="button-link" type="button" onclick="location.href='index.php';">戻る</button>
      </div>
    </form>
  </section>
</body>
</html>
