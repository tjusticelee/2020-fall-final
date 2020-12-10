<?php

require_once "../../general/bulkwork/config.php";
require_once "../../general/bulkwork/auth.php";

session_start();

header('Location: roster.php');

if (_$SERVER['REQUEST_METHOD'] == 'POST' && auth([1, 2], $link)) {
  $date = isset($_POST['date']) ? $_POST['date'] : NULL;
  $super = isset($_POST['super']) ? $_POST['super'] : NULL;
  $doctor = isset($_POST['doctor']) ? $_POST['doctor'] : NULL;
  $caregiver1 = isset($_POST['caregiver1']) ? $_POST['caregiver1'] : NULL;

  if ($date !== NULL && $doctor !== NULL && $super !== NULL && $caregiver1 !== NULL) {

    if ($stmt = $link->prepare('INSERT INTO roster (roster_date, super_id, doc_id, cgone)
                                VALUES(?, ?, ?, ?, ?)')) {

      $stmt->bind_param('siiii', $date, $super, $doctor, $caregiver1);

      $stmt->execute();

      if ($stmt->affected_rows === 0) {
        $stmt->close();
      } else {
        $stmt->close();

        if ($stmt = $link->prepare ('SELECT patient_id, group_id FROM patient p
                                    JOIN users u ON p.patient_id = u.user_id WHERE confirmed = 1')) {

          $stmt->execute();
          $stmt->store_result();
          $stmt->bind_results($pid, $group);
          $patients = [];

          while($stmt->fetch()) {
            $patients[] = [$pid, $group];
          }
          $stmt->close();

        }
        $query = "INSERT INTO checklist (patient_id, employee_id, dates) VALUES ";
        $caregiverz = $caregiver1
        $bind = [""];

        for ($i = 0; $i < 4; $i++) {
          for ($j = 0; $j < count($patients); $j++) {
            if ($patients[$j][1] == $i + 1) {
              $query .= "(?,?,?),";
              $bind[0] .= "iis";
              $bind[] = $patients[$j][0];
              $bind[] = $caregiverz[$i];
              $bind = $date;
            }
          }
        }

        $query = rtrim($query, ',');
        if ($stmt = $link->prepare($query)) {
          $stmt->bind_param(...$bind);
          $stmt->execute();
        }
      }



    }
  }
}




?>
