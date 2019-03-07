<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
        <link rel="stylesheet" href="/css/main.css">
    <title>Create new Account</title>
  </head>
  <body>
    <h2>Registration Form</h2>
    <form class="fregistration" action="SqlClass.php" method="post">
      <table>
        <tr>
          <td>First Name</td>
          <td><input type="text" name="firstname"></td>
        </tr>
        <tr>
          <td>Last Name</td>
          <td> <input type="text" name="lastname"></td>
        </tr>
        <tr>
          <td>Login</td>
          <td> <input type="text" name="login"></td>
        </tr>
        <tr>
          <td>Email</td>
          <td> <input type="text" name="email"> </td>
        </tr>
        <tr>
          <td>Password</td>
          <td> <input type="text" name="password"></td>
        </tr>
        <tr>
          <td>Confirm Password</td>
          <td> <input type="text" name="cpassword"></td>
        </tr>
        <tr>
          <td> <input type="submit"  value="Create Account"> </td>
        </tr>
      </table>
    </form>
  </body>
</html>
