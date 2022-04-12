<?php
require_once(ROOT_PATH . "Controllers/PostController.php");

class Users extends Db{
  public function __construct($dbh = null){
    parent::__construct($dbh);
  }

  // Usersテーブルから指定idに一致するデータを取得
  public function checkLogin($email) {
    $sql = "SELECT id,　user_name, email, password, role FROM Users WHERE email = :email";
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(":email", $email, PDO::PARAM_STR);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

}
