<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
        <link rel="stylesheet" href="/css/main.css">
    <title>Login</title>
  </head>
  <body>
    <form class="flogin" action="php/userlogin.php" method="post">
      <h2>Login form</h2>
      <table>
        <tr>
          <td>Login</td>
          <td><input type="text" name="login"></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input type="text" name="password"></td>
        </tr>
        <tr>
          <td><input type="submit"  value="Login"></td>
        </tr>
      </table>
    </form>
  </body>
</html>
