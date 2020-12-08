<?php
require_once "../../bulkwork/config.php"

if($_SERVER["REQUEST_METHOD"] == "POST" && auth([1,2], $link)) {
  $confirm = [];
  $deny = [];

  foreach ($_POST['confirm'] as $id) {
    $deny[] = (int) $id;
  }

  foreach ($_POST['deny'] as $id) {
    $deny[] = (int) $id;
  }

  if (count($confirm) > 0) {
    $placeholder = array_fill(0, count($confirm), '?');

    if ($stmt = $link->prepare('UPDATE users SET confirm = 1 WHERE user_id IN ' . '(' . implode(',', $placeholder) . ')')) {
      $stmt->bind_param(str_repeat('i', count($confirm)), ...$confirm);
      $stmt->execute();
      $stmt->close();
    }
  }

  if (count($deny) > 0) {
    $placeholder = array_fill(0, count($deny), '?');

    if ($stmt = $link->prepare('DELETE FROM users WHERE user_id IN ' . '(' . implode(',', $placeholder) . ')')) {
      $stmt->bind_param(str_repeat('i', count($deny)), ...$deny);
      $stmt->execute();
      $stmt->close();
    }
  }

}
?>
