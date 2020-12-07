<?php
require_once "../../general/bulkwork/config.php";
require_once "../../general/bulkwork/auth.php";

session_start();

if (!isset($_SESSION['role_id'])) {
  header("Location: ../../login.php");
}

if (auth([1, 2], $link)) {
  echo <<<"EOT"
  <head>
    <link rel="stylesheet" href="">
  </head>

  <body>
    <header>
      <a href="logout">Log out</a>

      <nav class="nav">
        <a href="home.php"> Home </a>
      </nav>
    </header>

    <section class = 'app-form'>
      <h1> Request approval</h1>
        <form action='approval-work.php' method='post'>

        <table class='kitty'>
          <tr>
            <th>Name</th>
            <th>Role</th>
            <th>Confirm</th>
            <th>Deny</th>
          </tr>
  EOT;

  if ($stmt = $link -> prepare('SELECT user_id, firstName, lastName, role_id
                              FROM users JOIN roles ON users.role_id = role.role_id
                              WHERE confirm = 0')) {
    $stmt -> execute();
    $stmt -> store_result();
    $stmt -> bind_result($user_id, $firstName, $lastName, $role_id);

    while ($stmt ->fetch()) {
      echo <<<"EOT"
      <tr>
        <td> $firstName $lastName </td>
        <td>$role_id</td>
        <td><input type='checkbox' name='confirm[]' value=$user_id</td>
        <td><input type='checkbox' name='deny[]' value=$user_id</td>
      EOT;
    }

    $stmt->close();

  }
  echo <<<"EOT"
          </table>
          <input type='submit' value='Submit'>
        </form>
      </section>
      <footer>
        <p>Retirement Home</p>
      </footer>
    </body>
    EOT;
}

?>
