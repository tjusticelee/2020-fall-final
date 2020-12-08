<?php

require_once "../../general/bulkwork/config.php";
require_once "../../general/bulkwork/auth.php";

session_start();

if(!isset($_SESSION['user_id'])) {
  header("Location:../../general/login.php");
}

if (auth([2], $link)) {
  echo <<<"EOT"
  <head>
    <title>Supervisor Homescreen</title>
  </head>

  <body>
    <header>
      <h1>Supervisor Home</h1>

      <nav class="nav">

      </nav>
    </header>

    <main class ='super-links'>
        <nav>
          <a href="../register-approval/approval.php">Approve registration</a>
          <a href=""></a>
          <a href="#"></a>
          <a href="#"></a>
          <a href="#"></a>
        </nav>

      </main>

    </body>
  EOT;
}

?>
