<?php

require_once "../../general/bulkwork/config.php";
require_once "../../general/bulkwork/auth.php";

session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST' && auth([1, 2], $link)) {

  $pid = isset($_POST['id']) ? (int) $_POST['id'] : NULL;
  $did = isset($_POST['doctor']) ? (int) $_POST['doctor'] : NULL;
  $date = isset($_POST['date']) ? (int) $_POST['date'] : NULL;

  if ($pid === NULL || $did === NULL || $date === NULL) {
    exit ('please fill out all missing forms');
  }

  if ($stmt = $link->prepare("INSERT INTO appointments (patient_id, employee_id, app_dates)
                              VALUES (?,?,?)")) {

    $stmt->bind_param('iis', $pid, $did, $date);
    $stmt->execute();

  }


}




?>
