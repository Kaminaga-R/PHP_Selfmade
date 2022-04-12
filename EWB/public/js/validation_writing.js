$(function () {
  //コンタクトフォームの入力チェック
  $(".input-btn").click(function () {
    var title = $("#title").val();
//    var genre = $("#genre").val();
    var body = $("#body").val();
    var alertMessage = "";

    validateTitle(title);
//    validateEmail(genre);
    validateBody(body);

    if ($("#title-validation").text() != "") {
      alertMessage += $("#title-validation").text();
    }
//    if ($("#genre-validation").text() != "") {
//      alertMessage += $("#genre-validation").text();
//    }
    if ($("#body-validation").text() != "") {
      alertMessage += $("#body-validation").text();
    }


    if (alertMessage != "") {
      alert(alertMessage);
    } else {
      $(".need-validation").submit();
    }
  });

  function isValidTitle(title) {
    if (title) {
      return true;
    } else {
      return false;
    }
  }

/*  function isValidGenre(genre) {
    if (genre) {
      return true;
    } else {
      return false;
    }
  }*/

  function isValidBody(body) {
    if (body) {
      return true;
    } else {
      return false;
    }
  }



  function validateTitle(title) {
    if (!isValidTitle(title)) {
      var string = "タイトルは必須入力です。\n";
      $("#title-validation").text(string);
    } else {
      $("#title-validation").text("");
    }
  }

/*  function validateGenre(genre) {
    if (!isValidGenre(genre)) {
      var string = "ジャンルを選択してください。\n";
      $("#genre-validation").text(string);
    } else {
      $("#genre-validation").text("");
    }
  }*/

  function validateBody(body) {
    if (!isValidBody(body)) {
      var string = "内容は必須入力です。\n";
      $("#body-validation").text(string);
    } else {
      $("#body-validation").text("");
    }
  }


});
