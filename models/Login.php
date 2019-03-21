<?php
require_once '../constants.php';
require_once 'model.php';
require_once (LIB_PATH.'/Query.php');


class LoginModel extends Model
{
  public function createSession() {
    $userlogin=$_POST['login'];
    $userpassword=$_POST['password'];
    if ( ! empty( $_POST ) ) {
      if ( isset($userlogin) && isset($userpassword)) {
        $sql="SELECT id, login, password FROM Users WHERE login='$userlogin'";
        $result=Model::createConnect($sql);
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
