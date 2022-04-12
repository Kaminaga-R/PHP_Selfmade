$(function () {
  //index.php
  //削除ボタンを押したらポップアップ
  $(".delete-link").on("click", function () {
    $(".delete-clicked").show();
    var id = $(this).attr("value");
    $(".delete-yes").attr("value", id);
  });

  //削除ポップアップ消す
  $(".delete-no, .delete-yes").on("click", function () {
    $(".delete-clicked").hide();
  });

  //edit.php
  //更新ポップアップ消す
  $(".edit-ok").on("click", function () {
    $(".edit-clicked").hide();
  });
});
