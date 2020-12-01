<?php

echo <<< "EOT"
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>

  <body>

  <header>
    <a href="../index.html">Back</a>

    <nav class="nav">
      <a href="../index.html">Home</a>
      </nav>
  </header>

    <h1>Login</h1>

    <form class="" action="bulkwork/login-work.php" method="post">
      <label for="email">E-mail:</label>
      <input type="text" name="email" value="">
        <br>
      <label for="password">Password:</label>
      <input type="text" name="password1" value="">

      <input id="submit" type="submit" value="Submit">
    </form>

  </body>
</html>
EOT;

session_start();
if(isset($_SESSION['error'])){
  echo $_SESSION['error'];
  unset( $_SESSION['error'] );
}

?>
