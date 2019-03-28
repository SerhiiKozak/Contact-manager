  <body>

      <?php
        $authorized =false;
        if($authorized==true){
            echo '<h1>User Home page</h1>';
          }else{
            include (ROOT_PATH . '/views/Login.php');
        }
      ?>
  </body>
  <footer>
    <p>2007 Wise Engineering</p>
  </footer>
  <link rel="stylesheet" type="text/css" href="css/main.css">

</html>
