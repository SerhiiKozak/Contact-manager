<?php

class LoginModel extends Model
{
  public function createSession() {
    session_start();
    $userlogin=$_POST['login'];
    $userpassword=$_POST['password'];
    if ( ! empty( $_POST ) ) {
      if ( isset($userlogin) && isset($userpassword)) {
        $sql="SELECT id, login, password FROM Users WHERE login='$userlogin'";
        $result=Model::createConnect($sql)->fetchAll(\PDO::FETCH_ASSOC);
        $data=$result['0'];

        $dblogin=$data['login'];
        $dbpassword=$data['password'];
        $userid=$data['id'];

        if ( password_verify( $userpassword, $dbpassword ) ) {
          $_SESSION['user_id']=$userid;
        }
      }
    }
  }

}
