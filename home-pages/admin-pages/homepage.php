<?php

require_once "../../general/bulkwork/config.php";
require_once "../../general/bulkwork/auth.php";

session_start();
 print_r (auth([1], $link));
if(!isset($_SESSION['user_id'])){
  header("Location:../../general/login.php");
}

if (auth([1], $link)) {
  echo <<<"EOT"
  <!DOCTYPE html>
  <html lang="en" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title>Admin Homescreen</title>
    </head>

    <body>
      <header>
        <h1>Admin Home</h1>
          <nav class="nav">
            <main class ='admin-links'>
          </nav>
      </header>

          <nav>
            <a href="../register-approval/approval.php">Approve registration</a>
            <a href="#"></a>
            <a href="#"></a>
            <a href="#"></a>
            <a href="#"></a>
          </nav>

        </main>

    </body>
  </html>
  EOT;
}

?>
