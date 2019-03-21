<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <base href="http://contactmanager/">
  </head>
  <body>
    <header>
      <table class="htable">
        <tr>
          <td>Contact Manager</td>
        </tr>
      </table>
      <form class="authorization" action="index.php" method="post">
              <input class="button" type="submit" name="Authorization" value="Authorization">
      </form>
      <form class="home" action="event.php" method="post">
              <input class="button" type="submit" name="Login" value="Home">
      </form>
      <form class="registration" action="registration.php" method="post">
              <input class="button" type="submit" name="registration" value="Registration">
      </form>
    </header>
    <form  class="loginform" class="flogin" action="controllers/Login.php" method="post">
      <h3>Autorization</h3>
      <table class="logintable">
        <tr>
          <td>Login:</td>
          <td><input type="text" name="login"></td>
        </tr>
        <tr>
          <td>Password:</td>
          <td><input type="text" name="password"></td>
        </tr>
        <tr>
          <td></td>
          <td> <a href="">Forgot Password?</a> </td>
        </tr>
        <tr>
          <td></td>
          <td><a href="http://contactmanager/controllers/Registration.php">Register Now!</a></td>
        </tr>
        <tr>
          <td></td>
          <td><input type="submit"  value="Login"></td>
        </tr>
      </table>
    </form>
  </body>
  <link rel="stylesheet" type="text/css" href="css/main.css">
</html>
