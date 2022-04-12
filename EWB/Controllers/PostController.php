<?php
require_once(ROOT_PATH . "Models/Post.php");
require_once(ROOT_PATH . "Models/Admin.php");
require_once(ROOT_PATH . "Models/Users.php");
require_once(ROOT_PATH .'/Models/Check.php');

class PostController{
  private $request; //リクエストパラメータ（GET, POST）
  private $Posts; //Postモデル
  private $Admin; //Adminモデル
  private $Users; //Usersモデル
  private $Check; //Checkモデル

  public function __construct(){
    //リクエストパラメータの取得
    $this->request["get"] = $_GET;
    $this->request["post"] = $_POST;

    //モデルオブジェクトの生成
    $this->Posts = new Posts();

    //別モデルと連携
    $dbh = $this->Posts->get_db_handler();
    $this->Admin = new Admin($dbh);
    $this->Users = new Users($dbh);
    $this->Check = new Check($dbh);
  }

  public function index(){
    $page = 0;
    if(isset($this->request["get"]["page"])){
      $page = $this->request["get"]["page"];
    }

    $posts = $this->Posts->findAll($page);
    $post_count = $this->Posts->countAll();

    $params = [
      "posts" => $posts,
      "pages" => $post_count/20,
    ];
    return $params;
  }

  //ユーザーデータ一覧
  public function member() {
      $contacts = $this->Check->findAll();
      return $contacts;
  }

  //会員登録
  public function insert() {
      $insert = $this->Check->insert();
      return $insert;
  }

  //view.php用メソッド
  public function view(){
    if(empty($this->request["get"]["id"])){
      echo "指定のパラメータが不正です。このページは表示できません。";
      exit();
    }

    $posts = $this->Posts->findById($this->request["get"]["id"]);

    $params = [
      "posts" => $posts
    ];
    return $params;
  }

  //edit.php用メソッド
  //index.phpで指定したID情報を取得
  public function edit(){
    if(empty($this->request["get"]["id"])){
      echo "指定のパラメータが不正です。このページは表示できません。";
      exit();
    }
    $posts = $this->Posts->findById($this->request["get"]["id"]);

    $params = [
      "posts" => $posts
    ];
    return $params;
  }

  //validation
  public function editValidation(){
    if(isset($this->request["post"]["editID"])){
      $alert = "";
      $validateData = ["id" =>"id", "title" => "タイトル", "genre" => "ジャンル", "body" => "内容"];
      $verifiedData = [];

      //空入力のチェック & XSS対策
      foreach($validateData as $key => $value){
          if ($this->request["post"][$key] != null) {
            $modifiedValue = htmlspecialchars($this->request["post"][$key]);
            $verifiedData[$key] = $modifiedValue;
          }else{
            $verifiedData[$key] = null;
            $alert .=  "{$value}が入力されていません。<br>";
          }
      }
    }

      //空入力があった場合
      if($alert != null){
        return $alert;
      }else{
        $this->Posts->editID($verifiedData);
        $this->Posts->deletePostsTmp();
        $this->Posts->insertPostsTmp();
        return "更新が完了しました。";
      }
    }
  //User.php用メソッド
  //ログイン認証
  public function login($email, $password){
      $error = [];
      if($email != "" && $password != ""){
        $login = $this->Users->checkLogin($email);
        if($login != false){
          if(password_verify($password, $login["password"])){
            session_regenerate_id();
            $_SESSION["role"] = $login["role"];
            header("Location: index.php");
          }else{
            $error["failed"] = "入力が正しくありません。";
            return $error;
          }
        }else{
          $error["failed"] = "入力が正しくありません。";
          return $error;
        }
      }else{
        $error["blank"] = "入力されていない項目があります。";
        return  $error;
      }
    }

    public function isAdmin(){
      if(isset($_SESSION["role"])){
        if($_SESSION["role"] == 0){
          return true;
        }else{
          return false;
        }
      }else{
        header("Location: login.php");
        exit();
      }
  }
}
