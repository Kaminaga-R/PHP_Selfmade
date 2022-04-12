$(function () {
  //コンタクトフォームの入力チェック
  $(".input-btn").click(function () {
    var name = $("#name").val();
    var email = $("#email").val();
    var password = $("#password").val();
    var password2 = $("#password2").val();
    var alertMessage = "";

    validateName(name);
    validateEmail(email);
    validatePassword(password);
    validatePassword2(password2);

    if ($("#name-validation").text() != "") {
      alertMessage += $("#name-validation").text();
    }
    if ($("#email-validation").text() != "") {
      alertMessage += $("#email-validation").text();
    }
    if ($("#password-validation").text() != "") {
      alertMessage += $("#password-validation").text();
    }
    if ($("#password2-validation").text() != "") {
      alertMessage += $("#password2-validation").text();
    }


    if (alertMessage != "") {
      alert(alertMessage);
    } else {
      $(".need-validation").submit();
    }
  });

  function isValidName(name) {
    if (name) {
      var length = name.length <= 10;
      var reg = new RegExp(/^[^\x20-\x7e]+$/);
      var res = reg.test(name);
      return length && res;
    } else {
      return false;
    }
  }

  function isValidEmail(email) {
    if (email) {
      var reg =
        /^[a-zA-Z0-9_.+-]+@([a-zA-Z0-9][a-zA-Z0-9-]*[a-zA-Z0-9]*\.)+[a-zA-Z]{2,}$/;
      var res = reg.test(email);
      return res;
    } else {
      return false;
    }
  }

  function isValidPassword(password) {
    if (password) {
      return true;
    } else {
      return false;
    }
  }

  function isValidPassword2(password2) {
    if (password2) {
      return true;
    } else {
      return false;
    }
  }


  function validateName(name) {
    if (!isValidName(name)) {
      var string = "氏名は必須入力です。10文字以内でご入力ください。\n";
      $("#name-validation").text(string);
    } else {
      $("#name-validation").text("");
    }
  }

  function validateEmail(email) {
    if (!isValidEmail(email)) {
      var string = "メールアドレスは正しくご入力ください。\n";
      $("#email-validation").text(string);
    } else {
      $("#email-validation").text("");
    }
  }

  function validatePassword(password) {
    if (!isValidPassword(password)) {
      var string = "パスワードは必須入力です。\n";
      $("#password-validation").text(string);
    } else {
      $("#password-validation").text("");
    }
  }

  function validatePassword2(password2) {
    if (!isValidPassword2(password2)) {
      var string = "パスワードは必須入力です。\n";
      $("#password2-validation").text(string);
    } else {
      $("#password2-validation").text("");
    }
  }

});
