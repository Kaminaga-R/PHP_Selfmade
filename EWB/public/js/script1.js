$(function(){
   // #で始まるアンカーをクリックした場合に処理
   $('a[href^=#]').click(function() {
      // スクロールの速度
      var speed = 400; // ミリ秒
      // アンカーの値取得
      var href= $(this).attr("href");
      // 移動先を取得
      var target = $(href == "#" || href == "" ? 'html' : href);
      // 移動先を数値で取得
      var position = target.offset().top;
      // スムーススクロール
      $('body,html').animate({scrollTop:position}, speed, 'swing');
      return false;
   });
});

// ヘッダー
$(window).scroll(function() {
   if (70 < $(this).scrollTop()) {
       console.log($(this).scrollTop());
　　   $("#nav_motion").addClass("motion");
　    } else {
　　   $("#nav_motion").removeClass("motion");
　    }
});

// ページトップ
$('#pagetop').hide();
 $(window).scroll(function () {
  if ($(this).scrollTop() > 300) {
   $('#pagetop').fadeIn();
  } else {
   $('#pagetop').fadeOut();
  }
});

$('#pagetop').click(function () {
 $('body,html').animate({
  scrollTop: 0
 }, 700);
 return false;
});

// サインイン
$(function () {
   $('#login-show').click(function () {
     var id = $(this).data('id'); // 何番目のキャプション（モーダルウィンドウ）か認識
     $('.login-modal-wrapper, #login-modal[data-id="modal' + id + '"]').fadeIn();
   });
   // オーバーレイクリックでもモーダルを閉じる
   $('.login-modal-wrapper').click(function () {
     $('.login-modal-wrapper, #login-modal').fadeOut();
   });
});
// jsバリデーション
$(function(){
   $('#message').click(function (){
         /*各画面オブジェクト*/
         const name = document.getElementById('name');
         const email = document.getElementById('email');
         const password = document.getElementById('password');
         const reg = /^[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}.[A-Za-z0-9]{1,}$/;

         var message = [];
         /*入力値チェック*/
         if(name.value ==""){
            message.push('氏名は必須入力です。10文字以内でご入力ください。');
         }
         if(email.value==""){
            message.push('メールアドレスは正しくご入力ください。');
            }else if(!reg.test(email.value)){
            message.push('メールアドレスは正しくご入力ください。');
         }
         if(password.value=="") {
            message.push('パスワードを入力してください。');
         }
         if(password2.value=="") {
            message.push('パスワードを入力してください。');
         }else if(password.value!=password2.value) {
            message.push('パスワードが一致しません。');
         }
         if(message.length > 0) {
            alert(message.join("\n"));
            return false;
         }
   });
});

$(function OnLinkClick(){
   $('#delete').click(function(){
      if(!confirm('本当に削除しますか？')){
         /* キャンセルの時の処理 */
         return false;
      }else{
         /*　OKの時の処理 */
         location.href = 'index.html';
      }
   });
});


$(function OnLinkClick(){
   $('#button').click(function(){
      if(!confirm('編集しますか？')){
         /* キャンセルの時の処理 */
         return false;
      }else{
         /*　OKの時の処理 */
         location.href = 'index.html';
      }
   });
});
