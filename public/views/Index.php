
<!DOCTYPE html>
<html>
  <head>
    <meta>
    <title>Contacts</title>

  </head>
  <body>
    <header>
      <table class="htable">
        <tr>
          <td>Contact Manager</td>
        </tr>
      </table>
      <form class="authorization" action="login.php" method="post">
              <input class="button" type="submit" name="Authorization" value="Authorization">
      </form>
      <form class="home" action="event.php" method="post">
              <input class="button" type="submit" name="login" value="Home">
      </form>
      <form class="registration" action="registration.php" method="post">
              <input class="button" type="submit" name="registration" value="Registration">
      </form>
    </header>
      <?php
        $authorized =false;
        if($authorized==true){
            echo '<h1>User Home page</h1>';
          }else{
            include'public/views/login.php';
        }
      ?>


<!--      <form  class="login" action="php/login.php" method="post">
        <input type="submit"  name="Singin" value="Sing in">
      </form>
      <form class="registration" action="php/registration.php" method="post">
        <input type="submit"  name="registration" value="Registration">
      </form>-->
  </body>
  <footer>
    <p>2007 Wise Engineering</p>
  </footer>
  <link rel="stylesheet" type="text/css" href="../public/css/main.css">

</html>
