<?php

require_once '../../general/bulkwork/config.php';
require_once '../../general/bulkwork/auth.php';

session_start();

if(!isset($_SESSION['user_id'])) {
  header("Location:../../general/login.php");
}

if (auth([1], $link)) {

  echo <<<"EOT"
  <table>
    <tr>
      <th>Role</th>
      <th>Access Level</th>
    </tr>
  EOT;

  if ($stmt = $link->prepare('SELECT name, role_id FROM roles')) {
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($rolename, $level);

    while ($stmt->fetch) {
      echo <<<"EOT"
        <tr>
          <td>$rolename</td>
          <td>$level</td>
        <tr>
      EOT;
    }

  $stmt->close();
  }
  echo <<<"EOT"
  </table>

  <form action="role-add-work.php" method="post">

    <label>New role
      <input type="text" name="name" maxlength="20" required>
    </label>

    <label>Level
      <input type="number" name="level" required>
    </label>

    <input type="submit" value="Submit">
  </form>
  EOT;
}
?>
