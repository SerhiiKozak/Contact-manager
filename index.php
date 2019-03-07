<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Contacts</title>
  </head>
  <body>
<!--    <header>
      <h1>Welcome!</h1>
    </header>-->
      <?php
        $authorized =false;
        if($authorized==true){
            echo '<h1>User Home page</h1>';
          }else{
            include'php/login.php';
        }
      ?>


<!--      <form  class="login" action="php/login.php" method="post">
        <input type="submit"  name="Singin" value="Sing in">
      </form>
      <form class="registration" action="php/registration.php" method="post">
        <input type="submit"  name="registration" value="Registration">
      </form>-->
  </body>
  <link rel="stylesheet" href="/css/main.css">
</html>
