<?php
function auth($targers, $link) {
  if(isset($_SESSION['loggedin'])){
    if($stmt = $link->prepare('SELECT role FROM users WHERE user_id = ?')){
      $stmt->bind_param('i', $_SESSION['user_id']);
      $stmt->execute();
      $stmt->store_result();
      $stmt->bind_result($role_id);
      if($stmt->fetch()){
        return in_array($role, $targets);
      }
    }
  }

  return false;
}
?>
