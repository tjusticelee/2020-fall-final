<?php

require_once "../../general/bulkwork/config.php";
require_once "../../general/bulkwork/auth.php";

session_start();

if (auth([1, 2], $link)) {
  echo <<<"EOT"
    <head>
      <title>Create roster</titles>
    </head>

    <body>
      <header>
        <h1> Create Roster </h1>

        <form class='form-style' action='roster-work.php' method = 'post'>

          <label>Date:

  EOT;

  echo "<input type='date' name='date' value'" . date('Y-m-d') . "'></label>";

  if ($stmt = $link->prepare("SELECT user_id, firstName, lastName, role_id
                              FROM users WHERE confirmed = 1 AND role_id IN (2,3,4)")) {

    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_results($id, $fname, $lname, $role);

    $superv = [];
    $doctors = [];
    $caregivers = [];

    while ($stmt->fetch()) {
      switch ($role) {

        case 2:
          $superv[] = ["name" => ucfirst($fname). ' ' . ucfirst($lname), "id" => $id];
          break;

        case 3:
          $doctors[] = ["name" => ucfirst($fname). ' ' . ucfirst($lname), "id" => $id];
          break;

        case 4:
          $caregivers[] = ["name" => ucfirst($fname) . ' ' . ucfirst($lname), "id" => $id];
          break;

      }
    }
    $stmt->close();
  }

  function select ($label, $name, $arr) {
    echo <<<"EOT"
      <label>$label:
        <select name="$name">
        <option value="">Pick One</option>
    EOT;

    foreach ($arr as $elem) {
      echo "option value=$elem[id]>elem[name]</option>";
    }
    echo <<<"EOT"
        </select>
        </label>
      EOT;
  }

  select('Supervisor', 'super', $superv);
  select('Doctor', 'doctor', $doctors);
  select('Caregiver', 'caregiver1', $caregivers);

  echo <<<"EOT"
        <input type='submit' value='Submit'>
      </form>
      </section>
      </body>

      EOT;

}



?>
