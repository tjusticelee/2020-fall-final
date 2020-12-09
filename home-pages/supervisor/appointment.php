<?php

require_once "../../general/bulkwork/config.php";
require_once "../../general/bulkwork/auth.php";

session_start();

if(!isset($_SESSION['user_id'])) {
  header("Location:../../general/login.php")
}

if (auth([1, 2], $link)) {
  echo <<<"EOT"
    <head>
      <title>Create appointment</title>
    </head>

    <body>
      <header>
      </header>

      <form class='form-style' action='appointment-work.php' method='post'>
        <input type="submit">
          <label> patient ID
            <input type='text' id='patid' name='id' required>
          </label>

          <label> patient name
            <input type='text' id='patname' name='patname' required>
          </label>

          <label>appointment date

  EOT;

  echo "<input type = 'date' name = 'date' value='" . date('Y-m-d') . "'>";
  echo <<<"EOT"
    </label>
    <label> Doctor
      <select name="doctor">
        <option value="">Select</option>

  EOT;

  if ($stmt = $link->prepare("SELECT user_id, firstName, lastName
                              FROM users WHERE confirmed = 1 AND role = 3")) {

    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $firstname, $lastname);

    while ($stmt->fetch()) {
      $name = ucfirst($firstname) .  ' ' . ucfirst($lastname);
      echo "<option value='$id'>$name</option>";
    }

    $stmt->close();
  }

  echo <<<"EOT"
    </select>
    </label>
    <input type = 'submit' id='submit' value='Submit' disabled>
    </form>
    </body>
    EOT;
}


?>
