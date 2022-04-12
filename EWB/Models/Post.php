<?php
require_once(ROOT_PATH . "Models/Db.php");

class Posts extends Db{
  private $table = "posts";
  public function __construct($dbh = null){
    parent::__construct($dbh);
  }

  // postsテーブルから全てのデータを取得
  public function findAll($page=0):Array{
    $sql = "SELECT * FROM posts";
    $sql .= " LIMIT 20 OFFSET ". (20 * $page);
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $result = $sth->fetchAll(PDO::FETCH_ASSOC);
    return $result;
  }

  //投稿の件数
  public function countAll():Int {
    $sql = "SELECT count(*) AS count FROM posts";
    $sth = $this->dbh->prepare($sql);
    $sth->execute();
    $count = $sth->fetchColumn();
    return $count;
  }

  // postsテーブルから指定idに一致するデータを取得
  public function findById($id = 0):Array {
    $sql = "SELECT * FROM " . $this->table;
    $sql .= " Where id = :id";
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(":id", $id, PDO::PARAM_INT);
    $sth->execute();
    $result = $sth->fetch(PDO::FETCH_ASSOC);
    return $result;
  }

  // Postsテーブルから指定idを削除
  public function deleteId($id) {
    $sql = "UPDATE posts SET del_flg=1";
    $sql .= " Where id = :id";
    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(":id", $id, PDO::PARAM_INT);
    $sth->execute();
  }

  // Postsテーブルの指定idを編集
  public function editId($verifiedData) {
    $sql = "UPDATE posts SET ";
    $sql .= "title= :title, ";
    $sql .= "content= :content, ";
    $sql .= "genre= :genre, ";

    $sth = $this->dbh->prepare($sql);
    $sth->bindParam(":title", $verifiedData['title'], PDO::PARAM_INT);
    $sth->bindParam(":content", $verifiedData['content'], PDO::PARAM_INT);
    $sth->bindParam(":genre", $verifiedData['genre']);
    $sth->execute();
  }

}
