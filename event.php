<!DOCTYPE html>
<html>
  <head>
    <meta>
    <title>Event page</title>
  </head>
  <header>
    <table class="htable">
      <tr>
        <td>Contact Manager</td>
      </tr>
    </table>
    <form class="authorization" action="php/login.php" method="post">
            <input class="button" type="submit" name="Authorization" value="Authorization">
    </form>
    <form class="home" action="event.php" method="post">
            <input class="button" type="submit" name="Login" value="Home">
    </form>
    <form class="registration" action="php/registration.php" method="post">
            <input class="button" type="submit" name="registration" value="Registration">
    </form>
  </header>
  <body>
    <form class="contactlist" action="addcontact.php" method="post">
      <table class="listtable">
        <tr class="listhead">
          <td>First Name</td>
          <td>Last Name</td>
          <td>E-mail</td>
          <td>Cellular</td>
          <td>Action</td>
        </tr>

      </table>
    </form>
  </body>
  <link rel="stylesheet" type="text/css" href="../css/main.css">
</html>
