<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <header>
    <table class="htable">
      <tr>
        <td>Contact Manager</td>
      </tr>
    </table>
    <form class="authorization" action="login.php" method="post">
            <input class="button" type="submit" name="Authorization" value="Authorization">
    </form>
    <form class="home" action="../event.php" method="post">
            <input class="button" type="submit" name="Login" value="Home">
    </form>
    <form class="registration" action="registration.php" method="post">
            <input class="button" type="submit" name="registration" value="Registration">
    </form>
  </header>
  <body>
    <form class="" action="addcontact.php" method="post">
      <h3>Information</h3>
      <table>
        <tr>
          <td>First Name:</td>
          <td> <input type="text" name="firstname"> </td>
        </tr>
        <tr>
          <td>Last Name:</td>
          <td> <input type="text" name="lastname"> </td>
        </tr>
        <tr>
          <td>E-mail:</td>
          <td> <input type="text" name="email"> </td>
        </tr>
        <tr>
          <td>Home:  </td>
          <td> <input type="text" name="home"> </td>
        </tr>
        <tr>
          <td>Work: </td>
          <td> <input type="text" name="work"> </td>
        </tr>
        <tr>
          <td>Cell: </td>
          <td> <input type="text" name="cell"> </td>
        </tr>
        <tr>
          <td>Adress 1:</td>
          <td> <input type="text" name="firstadress"> </td>
        </tr>
        <tr>
          <td>Adress 2:</td>
          <td> <input type="text" name="secondadress"> </td>
        </tr>
        <tr>
          <td>City:</td>
          <td> <input type="text" name="city"> </td>
        </tr>
        <tr>
          <td>State:</td>
          <td> <input type="text" name="state"> </td>
        </tr>
        <tr>
          <td>Zip:</td>
          <td> <input type="text" name="zip"> </td>
        </tr>
        <tr>
          <td>Country</td>
          <td> <input type="text" name="country"> </td>
        </tr>
        <tr>
          <td>Birth Date</td>
          <td></td>
        </tr>
      </table>
      <input type="submit" name="addcontact.php" value="Done">
    </form>

    <link rel="stylesheet" type="text/css" href="../css/main.css">
  </body>
</html>
