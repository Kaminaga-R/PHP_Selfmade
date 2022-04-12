<?php
require_once(ROOT_PATH .'/Models/Db.php');

class Check extends Db {
  public function __construct($dbh = null) {
    parent::__construct($dbh);
  }


   //登録
   public function insert() {
           $sql = 'INSERT INTO contacts (name,email,password,password2,created_at)
                   VALUES (:name,:email,:password,:password2,current_timestamp())';
           $sth = $this->dbh->prepare($sql);
           $sth->bindParam(':name', $_POST['name'], PDO::PARAM_STR);
           $sth->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
           $sth->bindParam(':password', $_POST['password'], PDO::PARAM_STR);
           $sth->bindParam(':password2', $_POST['password2'], PDO::PARAM_STR);
           $sth->execute();
           $result = $sth->fetchAll(PDO::FETCH_ASSOC);
           return $result;
    }



}


?>
