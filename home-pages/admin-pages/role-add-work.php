<?php

require_once '../../general/bulkwork/config.php';
require_once '../../general/bulkwork/auth.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && auth([1], $link)) {
  $name = $_POST['name'];
  $level = $_POST['level'];


  if ($stmt = $link->prepare('INSERT INTO role (name, access_lvl)
                            VALUES (?,?)')) {

      $stmt->bind_param('si', $name, $level);
      $stmt->execute();
      $stmt->close();
  }

}

header('Location: role.php');

?>
